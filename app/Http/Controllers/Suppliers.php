<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class Suppliers extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index(Request $request)
  {
    $user      = Auth::user();
    $filter    = $request->input('filter'); 
    $suppliers = DB::table('suppliers')
                 ->when(!empty($filter), function($query) use ($filter){
                   return $query->where('name', 'like', "%$filter%")->orwhere('company_name', 'like', "%$filter%");
                 })
                 ->whereNull('deleted_at')
                 ->orderBy('name', 'asc')
                 ->paginate(5);

    return view('suppliers', ['user' => $user, 'suppliers' => $suppliers, 'filter' => $filter]);
  }

  public function addSupplier(Request $request)
  {
    $data = $request->all();

    DB::table('suppliers')->insert(
      ['name' => $data['name'], 'company_name' => $data['company_name'], 'phone' => $data['phone'], 'created_at' => Carbon::now()]
    );

    notify()->success('Sukses', 'Supplier berhasil ditambah');

    return redirect(url('/suppliers'));
  }

  public function editSupplier(Request $request)
  {
    $data = $request->all();
    
    DB::table('suppliers')
        ->where('id', $data['id'])
        ->update(
          ['name' => $data['name'], 'company_name' => $data['company_name'], 'phone' => $data['phone']]
        );

    notify()->success('Sukses', 'Supplier berhasil diubah');

    return redirect(url('/suppliers'));
  }

  public function deleteSupplier(Request $request)
  {
    $data = $request->all();

    DB::table('suppliers')
        ->where('id', $data['id'])
        ->update(['deleted_at' => Carbon::now()]);

    notify()->success('Sukses', 'Supplier berhasil dihapus');

    return redirect(url('/suppliers'));
  }
}
