@extends('admin.app')
@section('content')
    <h1 class="text-3xl font-bold text-black">Keranjang</h1>
    <hr>

    <div class="w-full mt-10 my-10">
        @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
        @endif
        
        <a href="{{ url('cart/create') }}" class="my-10 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-plus mr-2"></i> Tambah Transaksi
        </a>
        <div class="bg-white overflow-auto my-4">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">No</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Nama Barang</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Jumlah Satuan</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Harga Barang</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Total Harga</th>
                        <th class="text-center py-3 px-2 uppercase font-semibold text-sm">Action</th>
                    </tr>
                </thead>        
                <?php 
                    $grandtotal = 0;
                    
                ?>
                @foreach ($data as $trx)
                <tr>
                <?php 
                    $subtotal       = $trx->qty_transaction * $trx->price_sell;
                    $grandtotal += $subtotal ;
                    $qty_stock      = $trx->qty_stock - $trx->qty_transaction;
                    $qty_sold       = $trx->qty_sold + $trx->qty_transaction;
                ?>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{ ++$i }}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$trx->name}} {{$trx->volume}}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$trx->qty_transaction}}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">@currency($trx->price_sell)</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">@currency($subtotal)</td>
                    <td class="text-center py-3 px-3"><a class="hover:text-white-500">
                        <a href="{{ url('cart/edit/'.$trx->id) }}">
                            <span
                                class="relative inline-block px-4 py-2 font-semibold text-white leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-blue-500 opacity-80 hover:bg-blue-700 rounded-full"></span>
                                <span class="relative"><i class="far fa-edit"></i> Edit</span>
                            </span>    
                        </a>
                        <a href="{{ url('cart/delete/'.$trx->id) }}">
                            <span
                                class="relative inline-block px-4 py-2 font-semibold text-white leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-red-500 opacity-80 hover:bg-red-700 rounded-full"></span>
                                <span class="relative"><i class="fas fa-trash"></i> Delete</span>
                            </span>
                        </a>
                    </td>
                </tr>
                @endforeach<tr>
                    <th class="text-left py-3 px-3" colspan="4"><a class="hover:text-gray-400">TOTAL HARGA</th>
                    <th class="text-left py-3 px-3" colspan="2"><a class="hover:text-gray-400">@currency($grandtotal) </th>
                    
                </tr>
            <form action="{{ url('cart/insert') }}" method="GET" enctype="multipart/form-data">
                <tr>
                    <th class="text-left py-3 px-3" colspan="4"><a class="hover:text-gray-400">Jumlah Uang Pembeli</th>
                    <th class="text-left py-3 px-3" colspan="2">
                    <input type="number" name="uang_bayar"  id="uang_bayar" class="w-1/2 px-3 py-2 text-gray-700 bg-gray-200 rounded" placeholder="Jumlah Uang Pembeli"></th>
                </tr>
                <tr>
                    <th class="text-left py-3 px-3" colspan="4"><a class="hover:text-gray-400">Nama Kasir</th>
                    <th class="text-left py-3 px-3" colspan="2">
 
                        <input type="text" readonly name="name_user" id="name_user" class="w-1/2 px-3 py-2 text-gray-700 bg-gray-200 rounded" value="{{Auth::user()->name_user}} "></th>
                </table>
        </div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Bayar Transaksi</button>
                </button>
            </form>
        
    </div>
    
@endsection