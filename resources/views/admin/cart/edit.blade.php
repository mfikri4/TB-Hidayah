@extends('admin.app')

@section('header')
    <div class="w-1/2">
        <a class="text-blueGray-400 text-sm capitalize hidden lg:inline-block font-semibold" href="{{ url('cart') }}">              
            Transaksi</a>
        <a class="text-blueGray-400 text-sm capitalize hidden lg:inline-block font-semibold" href="">              
             /</a>   
        <a class="text-blueGray-600 text-sm capitalize hidden lg:inline-block font-semibold" href="">              
            Edit Transaksi</a>
        
    </div>
@endsection
@section('content')

<meta name="_token" content="{{csrf_token()}}" />
<div class="bg-gray-100">
    @if (Session::has('status'))
    <div class="relative w-1/2 mx-auto bg-gray-100 pt-10">   
          <div class="text-white px-6 py-4 border-0 rounded mb-4 bg-teal-500">
            <span class="inline-block align-middle mr-8">
                <b class="capitalize">Alert!</b> {{ Session::get('status') }}
            </span>
          </div>
    </div>
    @endif
    <div class="relative w-full bg-gray-100 md:pt-4 pb-32 pt-8 scroll-smooth hover:scroll-auto ">
          <div class="px-4 md:px-10 mx-auto w-full">
              <div class="flex flex-wrap mt-4">
                <div class="w-full px-4">
                  <div
                    class="relative flex flex-col min-w-0 break-words bg-white w-full shadow-lg rounded"
                  >
                    <div class="rounded-t px-4 py-3 bg-gray-400 border-0">
                      <div class="flex flex-wrap items-center">
                        <div
                          class="relative w-full px-4 max-w-full flex-grow flex-1"
                        >
                        
                          <h3 class="font-semibold text-white text-2xl">
                            Edit Transaksi
                          </h3>
                        </div>
                        
                      </div>
                    </div>
                    <div class="leading-loose">
                        <form class="bg-white"action="{{ url('cart/edit/' . $data->id) }}" method="POST" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl" >
                            @csrf
                            <div class="mb-2 pt-2 px-4 mt-2 my-6">
                                <span class="block text-sm font-semibold  py-2 capitalize rounded-full text-blueGray-700">
                                    Nama Barang
                                </span>
                                <div class="pt-2">
                                    <select class="text-slate-600  bg-white rounded text-sm border-0 shadow" name="items_id" id="myselect">
                                    <option value="">Pilih Barang</option>
                                        @foreach ($itm as $items)
                                        <option value="{{ $items->id }}" {{($items->id == $data->items_id) ? 'selected' : ''}}>{{$items->name_item}}  {{$items->volume}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div> 
                            <div class="mb-2 pt-2 px-4">
                                <span class="text-sm font-semibold inline-block py-2 capitalize rounded-full text-blueGray-700">
                                    Jumlah Barang
                                </span>
                                <div class="pt-2">
                                   <input value="{{$data->qty_transaction}}" class="px-2 py-2 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/3" id="qty_transaction" name="qty_transaction" type="number" placeholder="Jumlah Barang" aria-label="Jumlah Barang">
                                </div>
                            </div> 
                            
                            
                            <div class="mb-2 px-4 pt-2">
                                <button type="submit" name="submit" class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"
                                    >
                                Tambah
                                </button>
                                <a href="{{ url('cart') }}" class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-sm px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"
                                    >
                                Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $('#myselect').select2({
    placeholder: "Pilih Barang",
    allowClear: true
  });
</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
r<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
@endsection