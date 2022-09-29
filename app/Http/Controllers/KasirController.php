<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class KasirController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {        
        $pagination     = 10;
        $count          = Cart::count();
        $data           = Cart::join('items', 'items.id', '=', 'cart.items_id','LEFT')
                                ->select('cart.*', 'items.name_item',  'items.volume', 'items.price_sell', 'items.qty_stock', 'items.qty_sold')
                                ->get();
        return view('admin.kasir', compact('count','data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }
}
