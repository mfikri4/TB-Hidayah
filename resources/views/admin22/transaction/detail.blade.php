@extends('admin.app')
@section('content')
    <h1 class="text-3xl font-bold text-black">Detail Transaksi</h1>
    <hr>

    <div class="w-full mt-8">
        @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
        @endif
        
        @foreach ($cetak as $ctk)
        <a href="{{ url('transaction/nota/'.$ctk->id_transaction) }}" class="my-10 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            <i class="fa fa-print mr-2"></i> Cetak Nota
        </a>
        @endforeach
        <div class="bg-white overflow-auto my-4">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">No</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Nama Barang</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Jumlah Satuan</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Harga Satuan</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Harga Total</th>
                    </tr>
                </thead>        
                <?php 
                    $grandtotal = 0;
                    
                ?>
                @foreach ($data as $trx)
                <tr>
                <?php 
                    $subtotal = $trx->qty_transaction * $trx->price_sell;
                    $grandtotal += $subtotal ;
                ?>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{ ++$i }}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$trx->name}} {{$trx->volume}}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$trx->qty_transaction}}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">@currency($trx->price_sell)</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">@currency($subtotal)</td>
                    
                </tr>
                @endforeach<tr>
                    <th class="text-center py-3 px-3" colspan="4"><a class="hover:text-gray-400">TOTAL HARGA</th>
                    <th class="text-left py-3 px-3" colspan="2"><a class="hover:text-gray-400">@currency($grandtotal) </th>
                    
                </tr>
            
            </table>
        </div>
    </div>
@endsection