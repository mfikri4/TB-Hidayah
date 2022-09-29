@extends('admin.app')
@section('content')
    <h1 class="text-3xl font-bold text-black">Riwayat Transaksi</h1>
    <hr>

    <div class="w-full mt-10 my-10">
        @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
        @endif

        <div class="bg-white overflow-auto my-4">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">No</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">ID Transaksi</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Nama Kasir</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Tanggal</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Pukul</th>
                        <th class="text-center py-3 px-2 uppercase font-semibold text-sm">Action</th>
                    </tr>
                </thead>
                @foreach ($data as $trx)
                <tr>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{ ++$i }}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">TRX{{$trx->id_transaction}}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$trx->name_user}}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$trx->created_at->format('d, M Y');}} </td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$trx->created_at->format('H:i');}}</td>
                    <td class="text-center py-3 px-3"><a class="hover:text-white-500">
                        <a href="{{ url('transaction/nota/'.$trx->id_transaction) }}">
                            <span
                                class="relative inline-block px-4 py-2 font-semibold text-white leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-green-500 opacity-80 hover:bg-green-700 rounded-full"></span>
                                <span class="relative"><i class="fa fa-print"></i> Cetak</span>
                            </span>    
                        </a>                        
                        <a href="{{ url('transaction/detail/'.$trx->id_transaction) }}">
                            <span
                                class="relative inline-block px-4 py-2 font-semibold text-white leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-blue-500 opacity-80 hover:bg-blue-700 rounded-full"></span>
                                <span class="relative"><i class="far fa-edit"></i> Detail</span>
                            </span>    
                        </a>
                        <a href="{{ url('transaction/delete/'.$trx->id_transaction) }}">
                            <span
                                class="relative inline-block px-4 py-2 font-semibold text-white leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-red-500 opacity-80 hover:bg-red-700 rounded-full"></span>
                                <span class="relative"><i class="fas fa-trash"></i> Delete</span>
                            </span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    
@endsection