<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //menampilkan semua data
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {        
        $pagination     = 2;
        $data           = Cart::join('items', 'items.id', '=', 'cart.items_id','LEFT')
                                ->select('cart.*', 'items.name_item',  'items.volume', 'items.price_purchase', 'items.price_sell', 'items.qty_stock', 'items.qty_sold')
                                ->get();
        return view('admin.cart.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function create()
    {
        $ct = Cart::get();
        $itm = Items::get();
        return view('admin.cart.create', compact('ct','itm'));
    }

    public function insert(Request $request)
    {
        $request->validate(Cart::$rules);
        $requests = $request->all();
    
        $tx = Cart::create($requests);
        if($tx){
            return redirect('cart')->with('status', 'Berhasil menambah data!');
        }

        return redirect('cart')->with('status', 'Gagal Menambah data!');
        
    }

    public function edit($id)
    {
        $data = Cart::find($id);
        $itm = Items::get();
        return view('admin.cart.edit', compact('data','itm'));
    }

    public function update(Request $request,$id)
    {
        $d = Cart::find($id);
        if ($d == null){
            return redirect('cart')->with('status', 'Data tidak Ditemukan !');
        }

        $req = $request->all();

        
        $data = Cart::find($id)->update($req);
        if($data){
            return redirect('cart')->with('status', 'Cart Berhasil diedit !');
        }

        return redirect('cart')->with('status', 'Gagal edit data Cart!');
        
    }

    public function delete($id)
    {
    $data = Cart::find($id);
    if ($data == null) {
        return redirect('cart')->with('status', 'Data tidak ditemukan !');
    }
    
    $delete = $data->delete();
    if ($delete) {
        return redirect('cart')->with('status', 'Berhasil hapus Cart !');
    }
    return redirect('cart')->with('status', 'Gagal hapus Cart !');
    }
}
