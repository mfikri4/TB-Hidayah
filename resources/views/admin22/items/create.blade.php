@extends('admin.app')
@section('content')
    <h1 class="text-3xl font-bold text-black">Barang</h1>
    <hr>

    <div class="w-full mt-4">
        @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
        @endif
            <div class="w-full lg:w-full mt-6 ">
                <p class="text-xl pb-6 flex items-center">
                    <i class="fas fa-plus mr-3"></i> Tambah Barang
                </p>
            </div>
            <div class="leading-loose">
                <form action="{{ url('items/create') }}" method="POST" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl">            
                    @csrf
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="title">Nama Barang</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" placeholder="Nama Barang" aria-label="Nama Barang">
                    </div>    
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="kategori">Kategori</label>
                        <select class="w-1/3 px-3 py-3 text-gray-700 bg-gray-200 rounded" name="unit_id" id="unit_id">
                            @foreach ($cat as $ct)
                                <option value="{{ $ct->id }}">{{$ct->name_category}}</option>
                            @endforeach
                        </select>
                    </div>    
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="harga_beli">Harga Beli</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="price_purchase" name="price_purchase" type="number" placeholder="Harga Beli" aria-label="Harga Beli">
                    </div>    
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="harga_jual">Harga Jual</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="price_sell" name="price_sell" type="number" placeholder="Harga Jual" aria-label="Harga Jual">
                    </div>    
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="qty_stock">Kuantitas Stok</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="qty_stock" name="qty_stock" type="number" placeholder="Kuantitas Stok" aria-label="Kuantitas Stok">
                    </div>        
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="qty_sold">Kuantitas Terjual</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="qty_sold" name="qty_sold" type="number" placeholder="Kuantitas Terjual" aria-label="Kuantitas Terjual">
                    </div>    
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="unit_id">Satuan Barang</label>
                        <select class="w-1/3 px-3 py-3 text-gray-700 bg-gray-200 rounded" name="unit_id" id="unit_id">
                            @foreach ($unit as $unt)
                                <option value="{{ $unt->id }}">{{$unt->name_unit}}</option>
                            @endforeach
                        </select>
                    </div>   
                    <div class="mt-2 ">
                        <label class="block text-lg text-gray-600" for="unit_id">Satuan Barang</label>
                        <select class="w-1/3 px-3 py-3 text-gray-700 bg-gray-200 rounded" name="status" id="status">
                            <option value="1">Stok Tersedia</option>
                            <option value="0">Stok Habis</option>
                        </select>
                    </div>   

                    <input type="submit" name="submit" class="text-white bg-green-500 hover:bg-green-400 py-1 px-3 rounded" value="Tambah Data">
                    <a href="{{ url('items') }}" class="text-white bg-gray-700 hover:bg-gray-400 py-3 px-4 rounded"><i class="fas fa-chevron-circle-left"></i>Kembali</a>
                </form>
            </div>
    </div>
    
@endsection
@section('js')
<script>
    var content = document.getElementById("content");
    CKEDITOR.replace(content,{
        language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>
@endsection