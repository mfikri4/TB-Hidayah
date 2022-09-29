<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //menampilkan semua data
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        
        $pagination = 30;
        $data = Category::sortable()
                        ->paginate(30);
        return view('admin.category.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function insert(Request $request)
    {
        $request->validate(Category::$rules);
        $requests = $request->all();
    
        $cat = Category::create($requests);
        if($cat){
            return redirect('category')->with('status', 'Berhasil menambah data!');
        }

        return redirect('category')->with('status', 'Gagal Menambah data!');
        
    }

    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin.category.edit', compact('data'));
    }

    public function update(Request $request,$id)
    {
        $d = Category::find($id);
        if ($d == null){
            return redirect('category')->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();

        
        $data = Category::find($id)->update($req);
        if($data){
            return redirect('category')->with('status', 'Category Berhasil diedit !');
        }

        return redirect('category')->with('status', 'Gagal edit data Category!');
        
    }

    public function delete($id)
    {
    $data = Category::find($id);
    if ($data == null) {
        return redirect('category')->with('status', 'Data tidak ditemukan !');
    }
    
    $delete = $data->delete();
    if ($delete) {
        return redirect('category')->with('status', 'Berhasil hapus category !');
    }
    return redirect('category')->with('status', 'Gagal hapus category !');
    }
}
