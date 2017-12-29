<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class Items extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Request $request, $category)
  {
    $user       = Auth::user();
    $filter     = $request->input('filter'); 
    $categories = DB::table('item_category')->get();
    $suppliers  = DB::table('suppliers')->get();
    $items      = DB::table('items')
                  ->leftJoin('suppliers', 'suppliers.id', '=', 'items.supplier_id')
                  ->when(!empty($filter), function($query) use ($filter){
                    return $query->where('items.name', 'like', "%$filter%")->orwhere('suppliers.company_name', 'like', "%$filter%");
                  })
                  ->where('category_id', $category)
                  ->whereNull('items.deleted_at')
                  ->orderBy('items.name', 'asc')
                  ->select('items.*', 'suppliers.company_name')
                  ->paginate(5);

    return view('items', ['user' => $user, 'categories' => $categories, 'suppliers' => $suppliers, 'items' => $items, 'page_category' => $category, 'filter' => $filter]);
  }

  public function addItem(Request $request)
  {
    $data = $request->all();

    DB::table('items')->insert(
      ['category_id' => $data['category_id'], 'supplier_id' => $data['supplier_id'], 'name' => $data['name'], 'sell_price' => $data['sell_price'], 'buy_price' => $data['buy_price'], 'quantity' => $data['quantity'], 'note' => $data['note'], 'created_at' => Carbon::now()]
    );

    notify()->success('Sukses', 'Inventaris berhasil ditambah');

    return redirect(url('/items/' . $data['category_id']));
  }

  public function editItem(Request $request)
  {
    $data       = $request->all();
    $categoryId = DB::table('items')->where('id', $data['id'])->first()->category_id;
    
    DB::table('items')
        ->where('id', $data['id'])
        ->update(
          ['supplier_id' => $data['supplier_id'], 'name' => $data['name'], 'sell_price' => $data['sell_price'], 'buy_price' => $data['buy_price'], 'quantity' => $data['quantity'], 'note' => $data['note']]
        );

    notify()->success('Sukses', 'Inventaris berhasil diubah');

    return redirect(url('/items/' . $categoryId));
  }

  public function deleteItem(Request $request)
  {
    $data = $request->all();
    $categoryId = DB::table('items')->where('id', $data['id'])->first()->category_id;

    DB::table('items')
        ->where('id', $data['id'])
        ->update(['deleted_at' => Carbon::now()]);

    notify()->success('Sukses', 'Inventaris berhasil dihapus');

    return redirect(url('/items/' . $categoryId));
  }

  public function logout()
  {
    Auth::logout();

    return redirect(url('/'));
  }
}
