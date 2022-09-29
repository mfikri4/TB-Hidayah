@extends('admin.app')
@section('content')
    <h1 class="text-3xl font-bold text-black">Stok Barang</h1>
    <hr>

    <div class="w-full mt-8">
        @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
        @endif
        <form action="search" method="GET">
            <input type="text" name="cari" class="w-1/4 px-3 py-2 text-gray-700 bg-gray-200 rounded" placeholder="Pencarian Barang" value="">
            <input type="submit" class="my-5 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded" value="Cari">
        </form>
        <div class="bg-white overflow-auto my-4">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">No</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Nama Barang</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Volume</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Satuan</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Kategori</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Harga Beli</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Harga Jual</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Qty Stock</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Qty Sold</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Status</th>
                        <th class="text-center py-3 px-2 uppercase font-semibold text-sm">Action</th>
                    </tr>
                </thead>
                @foreach ($data as $cat)
                <tr>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{ ++$i }}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$cat->name}}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$cat->volume}}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$cat->name_unit}}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$cat->name_category}}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$cat->price_purchase}} </td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$cat->price_sell}}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$cat->qty_stock}}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$cat->qty_sold}}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">
                        @if ($cat->status == 1)
                            Tersedia
                        @else
                            Tidak Tersedia
                        @endif
                    <td class="text-center py-3 px-3"><a class="hover:text-white-500">
                        <a href="{{ url('items/edit/'.$cat->id) }}">
                            <span
                                class="relative inline-block px-4 py-2 font-semibold text-white leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-blue-500 opacity-80 hover:bg-blue-700 rounded-full"></span>
                                <span class="relative"><i class="far fa-edit"></i> Edit</span>
                            </span>    
                        </a>
                        <a href="{{ url('items/delete/'.$cat->id) }}">
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
            
            {{ $data->links() }}
        </div>
    </div>
@endsection