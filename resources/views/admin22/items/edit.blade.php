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
                    <i class="fas fa-edit mr-3"></i> Edit Barang
                </p>
            </div>
            <div class="leading-loose">
                <form action="{{ url('items/edit/' . $data->id)  }}" method="POST" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl">            
                    @csrf
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="title">Nama Barang</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" placeholder="Nama Barang" aria-label="Nama Barang"  value ="{{ $data->name }}">
                    </div>    
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="kategori">Kategori</label>
                        <select class="w-1/3 px-3 py-3 text-gray-700 bg-gray-200 rounded" name="category_id" id="category_id">
                            @foreach($category as $cat)
                                <option value="{{ $cat->id }}" {{($cat->id == $data->category_id) ? 'selected' : ''}}>{{ $cat->name_category }}</option>
                            @endforeach    
                        </select>
                    </div>    
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="harga_beli">Harga Beli</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="price_purchase" name="price_purchase" type="number" placeholder="Harga Beli" aria-label="Harga Beli"  value ="{{ $data->price_purchase }}">
                    </div>    
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="harga_jual">Harga Jual</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="price_sell" name="price_sell" type="number" placeholder="Harga Jual" aria-label="Harga Jual" value ="{{ $data->price_sell }}">
                    </div>    
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="qty_stock">Kuantitas Stok</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="qty_stock" name="qty_stock" type="number" placeholder="Kuantitas Stok" aria-label="Kuantitas Stok"  value ="{{ $data->qty_stock }}">
                    </div>        
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="qty_sold">Kuantitas Terjual</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="qty_sold" name="qty_sold" type="number" placeholder="Kuantitas Terjual" aria-label="Kuantitas Terjual"  value ="{{ $data->qty_sold }}">
                    </div>    
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="unit_id">Satuan Barang</label>
                        <select class="w-1/3 px-3 py-3 text-gray-700 bg-gray-200 rounded" name="unit_id" id="unit_id">
                            @foreach ($unit as $unt)
                                <option value="{{ $unt->id }}" {{($unt->id == $data->unit_id) ? 'selected' : ''}}>{{$unt->name_unit}}</option>
                            @endforeach
                        </select>
                    </div>   
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="status">Status Barang</label>
                        <select class="w-1/3 px-3 py-3 text-gray-700 bg-gray-200 rounded" name="status" id="status">
                            <option value="0" {{( 0 == $data->status) ? 'selected' : ''}}>Stok Habis</option>        
                            <option value="1" {{( 1 == $data->status) ? 'selected' : ''}}>Stok Tersedia</option>
                        </select>
                    </div>   
                    <br>

                    <input type="submit" name="submit" class="text-white bg-green-500 hover:bg-green-400 py-1 px-3 rounded" value="Edit Data">
                    <a href="{{ url('items') }}" class="text-white bg-gray-700 hover:bg-gray-400 py-3 px-4 rounded"><i class="fas fa-chevron-circle-left"></i>Kembali</a>
                </form>
            </div>
    </div>
    

@endsection
@section('js')
<script src="{{ url('assets/ckeditor/ckeditor.js') }}"></script>
<script>
    var content = document.getElementById("content");
    CKEDITOR.replace(content,{
    language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>
@endsection