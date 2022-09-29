<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Category;
use App\Models\Unit;

class ItemsController extends Controller
{
    //menampilkan semua data
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        
        $this->middleware('auth');
        $pagination = 50;

        $data = Items::join('unit', 'unit.id', '=', 'items.unit_id')
                        ->leftjoin('category','category.id','=', 'items.category_id')
                        ->select('items.*', 'unit.name_unit', 'category.name_category')
                        ->sortable()
                        ->paginate(50);
        return view('admin.items.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function create()
    {
        $cat = Category::get();
        $unit = Unit::get();
        return view('admin.items.create', compact('cat','unit'));
    }

    public function insert(Request $request)
    {
        $request->validate(Items::$rules);
        $requests = $request->all();
    
        $unt = Items::create($requests);
        if($unt){
            return redirect('items')->with('status', 'Berhasil menambah data!');
        }

        return redirect('items')->with('status', 'Gagal Menambah data!');
        
    }

    public function edit($id)
    {
        $data = Items::find($id);
        $category = Category::get();
        $unit = Unit::get();
        return view('admin.items.edit', compact('data', 'category', 'unit'));
    }

    public function update(Request $request,$id)
    {
        $d = Items::find($id);
        if ($d == null){
            return redirect('items')->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();

        
        $data = Items::find($id)->update($req);
        if($data){
            return redirect('items')->with('status', 'Items Berhasil diedit !');
        }

        return redirect('items')->with('status', 'Gagal edit data Items!');
        
    }

    public function delete($id)
    {
        $data = Items::find($id);
        if ($data == null) {
            return redirect('items')->with('status', 'Data tidak ditemukan !');
    }
    
    $delete = $data->delete();
        if ($delete) {
            return redirect('items')->with('status', 'Berhasil hapus Items !');
        }
    return redirect('items')->with('status', 'Gagal hapus Items !');
    }

    public function search(Request $request)
	{
        $pagination = 50;
		$cari = $request->cari;
        
        $data = Items::join('unit', 'unit.id', '=', 'items.unit_id')
                        ->leftjoin('category','category.id','=', 'items.category_id')
                        ->select('items.*', 'unit.name_unit', 'category.name_category')
		                ->where('items.name_item','like',"%".$cari."%")
                        ->orWhere('items.price_purchase', '=', $cari)
                        ->sortable()
                        ->get();

 
    		// mengirim data pegawai ke view index
        return view('admin.items.search', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    
	}

}
