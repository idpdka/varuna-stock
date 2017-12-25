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
    $items      = DB::table('items')
                  ->when(!empty($filter), function($query) use ($filter){
                    return $query->where('name', 'like', "%$filter%");
                  })
                  ->where('category_id', $category)
                  ->whereNull('deleted_at')
                  ->orderBy('name', 'asc')
                  ->paginate(5);

    return view('items', ['user' => $user, 'categories' => $categories, 'items' => $items, 'page_category' => $category, 'filter' => $filter]);
  }

  public function addItem(Request $request)
  {
    $data = $request->all();

    DB::table('items')->insert(
      ['category_id' => $data['category_id'], 'name' => $data['name'], 'sell_price' => $data['sell_price'], 'buy_price' => $data['buy_price'], 'quantity' => $data['quantity'], 'created_at' => Carbon::now()]
    );

    notify()->success('Sukses', 'Inventaris berhasil ditambah');

    return redirect(url($data['category_id']));
  }

  public function editItem(Request $request)
  {
    $data       = $request->all();
    $categoryId = DB::table('items')->where('id', $data['id'])->first()->category_id;
    
    DB::table('items')
        ->where('id', $data['id'])
        ->update(
          ['name' => $data['name'], 'sell_price' => $data['sell_price'], 'buy_price' => $data['buy_price'], 'quantity' => $data['quantity']]
        );

    notify()->success('Sukses', 'Inventaris berhasil diubah');

    return redirect(url($categoryId));
  }

  public function deleteItem(Request $request)
  {
    $data = $request->all();
    $categoryId = DB::table('items')->where('id', $data['id'])->first()->category_id;

    DB::table('items')
        ->where('id', $data['id'])
        ->update(['deleted_at' => Carbon::now()]);

    notify()->success('Sukses', 'Inventaris berhasil dihapus');

    return redirect(url($categoryId));
  }

  public function logout()
  {
    Auth::logout();

    return redirect(url('/'));
  }
}
