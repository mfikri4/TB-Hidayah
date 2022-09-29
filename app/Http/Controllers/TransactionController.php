<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Transaction;
use App\Models\Cart;
use App\Models\DetailTransaction;
use PDF;
use Psy\Readline\Transient;

class TransactionController extends Controller
{
    //menampilkan semua data
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        
        $pagination = 10;
        $data = Transaction::orderBy('created_at','desc')->paginate(10);
        
        return view('admin.transaction.index', compact('data'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function create()
    {
        $tx = Transaction::get();
        $itm = Items::get();
        return view('admin.transaction.create', compact('tx','itm'));
    }

    public function insert(Request $request)
    {

        $request->validate(Transaction::$rules);
        $datas = $request->all();
        
        $dt = Transaction::create($datas);

        $id_transaction  =  $dt['id_transaction'];
        $uangpembeli  =  $dt['uang_bayar'];
        $totalbayar  =  $dt['total_bayar'];
        $data = Cart::get();

        foreach($data as $ct => $val){
            $items_id           = $val["items_id"];
            $qty_transaction    = $val["qty_transaction"];
            $data = Items::find($items_id);

            $check=(int)$data['qty_stock'] > (int)$qty_transaction;
            if($check){
                $check2=(int)$uangpembeli >= (int)$totalbayar;
                if($check2){
                $data = Items::find($items_id);
                $name_item      = $data['name_item'];
                $volume         = $data['volume'];
                $price_sell     = $data['price_sell'];
                $price_purchase = $data['price_purchase'];
                DetailTransaction::add_detail_transaction($id_transaction, $name_item, $volume, $price_sell, $price_purchase,  $qty_transaction);
                $req  = [
                    'qty_stock'     => (double)$data['qty_stock'] - (double)$qty_transaction,
                    'qty_sold'      => (double)$data['qty_sold']  + (double)$qty_transaction,
                ];
                Items::find($items_id)->update($req);
                }else{
                    return redirect("cart")->with('status', 'Jumlah uang pembayaran tidak cukup!');
                }
            }else{
                return redirect("cart")->with('status', 'Stok Barang Habis!');
            }
        }
        Cart::truncate();
        return redirect("transaction")->with('status', 'Transaksi Berhasil !');
    }

    public function update_cart_qty(Request $request){
        // $sql = "UPDATE t_chart SET price = '$post[price]',
        //         qty = qty + '$post[qty]',
        //         total = '$post[price]' * qty
        //          WHERE item_id = '$post[item_id]'";

        $sql = Items::find()->update('UPDATE items SET 
                        qty_stock = qty_stock - '.$request->qty_transaction.',
                        qty_sold = qty_sold - '.$request->qty_transaction.'
                           WHERE items_id = '.$request->items_id.'
                           ');


         return $sql;
   
    }

    public function detail(Request $request, $id_transaction)
    {
        $pagination         = 2;
        $data               = DetailTransaction::where('id_transaction',$id_transaction)
                            ->get();
        $cetak = Transaction::where('id_transaction',$id_transaction)->get();
        
        return view('admin.transaction.detail', compact('data','cetak'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function nota(Request $request, $id_transaction)
    {

        $pagination = 2;
        $data               = DetailTransaction::where('id_transaction',$id_transaction)
                            ->get();

        $data2              = Transaction::where('id_transaction',$id_transaction)->get();
                
        $pdf = PDF::loadView('admin.transaction.nota', compact('data','data2'));
    
        return $pdf->download('nota.pdf');
    }
    
    public function delete($id_transaction)
    {
    $data = Transaction::find($id_transaction);
    if ($data == null) {
        return redirect('transaction')->with('status', 'Data tidak ditemukan !');
    }
    
    $delete = $data->delete();
    if ($delete) {
        return redirect('transaction')->with('status', 'Berhasil hapus Transaction !');
    }
    return redirect('transaction')->with('status', 'Gagal hapus Transaction !');
    }
}
