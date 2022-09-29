@extends('admin.app')
@section('content')

    <h1 class="text-3xl font-bold text-black">Transaksi</h1>
    <hr>

    <div class="w-full mt-4">
        @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
        @endif
            <div class="w-full lg:w-full mt-6 ">
                <p class="text-xl pb-6 flex items-center">
                    <i class="fas fa-plus mr-3"></i> Tambah Transaksi
                </p>
            </div>
            <div class="leading-loose">
                <form action="{{ url('cart/edit/' . $data->id) }}" method="POST" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl">            
                    @csrf
                    <div class="mt-2">
                        <label class="block text-lg text-gray-600" for="name">Nama Barang</label>
                        <select class="w-1/3 px-3 py-3 text-gray-700 bg-gray-200 rounded" name="items_id" id="items_id" required>
                            <option value="" hidden="">--- Pilih Barang ---</option>
                            @foreach ($itm as $items)
                            <option value="{{ $items->id }}" {{($items->id == $data->items_id) ? 'selected' : ''}}>{{$items->name}}  {{$items->volume}}</option>
                            @endforeach
                        </select>
                    </div>    
                    <div class="mt-2 my-6">
                        <label class="block text-lg text-gray-600" for="qty_transaction">Jumlah Barang</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="qty_transaction" name="qty_transaction" type="number" placeholder="Jumlah Barang" aria-label="Jumlah Barang" value ="{{ $data->qty_transaction }}">
                    </div>    
                    <input type="submit" name="submit" class="text-white bg-green-500 hover:bg-green-400 py-1 px-3 rounded" value="Tambah Data">
                    <a href="{{ url('cart') }}" class="text-white bg-gray-700 hover:bg-gray-400 py-3 px-4 rounded"><i class="fas fa-chevron-circle-left"></i>Kembali</a>
                </form>
            </div>
    </div>

@endsection
@section('js')

@endsection
