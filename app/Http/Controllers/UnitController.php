<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
        //menampilkan semua data
        public function __construct(){
            $this->middleware('auth');
        }
        
        public function index(Request $request)
        {
            
            $pagination = 30;
            $data = Unit::sortable()->paginate(30);
            return view('admin.unit.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
        }
    
        public function create()
        {
            return view('admin.unit.create');
        }
    
        public function insert(Request $request)
        {
            $request->validate(Unit::$rules);
            $requests = $request->all();
        
            $unt = Unit::create($requests);
            if($unt){
                return redirect('unit')->with('status', 'Berhasil menambah data!');
            }
    
            return redirect('unit')->with('status', 'Gagal Menambah data!');
            
        }
    
        public function edit($id)
        {
            $data = Unit::find($id);
            return view('admin.unit.edit', compact('data'));
        }
    
        public function update(Request $request,$id)
        {
            $d = Unit::find($id);
            if ($d == null){
                return redirect('unit')->with('status', 'Data tidak Ditemukan !');
            }
    
            $req = $request->all();
    
            
            $data = Unit::find($id)->update($req);
            if($data){
                return redirect('unit')->with('status', 'Unit Berhasil diedit !');
            }
    
            return redirect('unit')->with('status', 'Gagal edit data Unit!');
            
        }
    
        public function delete($id)
        {
        $data = Unit::find($id);
        if ($data == null) {
            return redirect('unit')->with('status', 'Data tidak ditemukan !');
        }
        
        $delete = $data->delete();
        if ($delete) {
            return redirect('unit')->with('status', 'Berhasil hapus Unit !');
        }
        return redirect('unit')->with('status', 'Gagal hapus Unit !');
        }
}
