@extends('admin.app')

@section('header')
    <div class="w-1/2">
        <a class="text-blueGray-400 text-sm capitalize hidden lg:inline-block font-semibold" href="{{ url('items') }}">              
            Barang</a>
        <a class="text-blueGray-400 text-sm capitalize hidden lg:inline-block font-semibold" href="{{ url('items') }}">              
            /</a>   
        <a class="text-blueGray-600 text-sm capitalize hidden lg:inline-block font-semibold" href="">              
            Tambah Barang</a>
        
    </div>
@endsection
@section('content')

    <div class="relative w-full bg-gray-100 md:pt-4 pb-32 pt-8 scroll-smooth hover:scroll-auto ">
          <div class="px-4 md:px-10 mx-auto w-full">
                     @if (Session::has('status'))
                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-teal-500">
                    <span class="text-xl inline-block mr-5 align-middle">
                        <i class="fas fa-bell" />
                    </span>
                    
                    <span class="inline-block align-middle mr-8">
                        <b class="capitalize">Error!</b> {{ Session::get('status') }}
                    </span>
                    
                    <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                        <span>×</span>
                    </button>
                    </div>
                    @endif
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
                            Tambah Barang
                          </h3>
                        </div>
                        
                      </div>
                    </div>
                    <div class="overflow-x-auto">
                        <form class="bg-white"action="{{ url('items/create') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="mb-2 pt-2 px-4">
                                <span class="text-sm font-semibold inline-block py-2 capitalize rounded-full text-blueGray-700">
                                    Nama
                                </span>
                                <div class="pt-2">
                                    <input type="text" name="name_item" placeholder="Nama Barang" class="px-2 py-3 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/2"/>
                                </div>
                            </div> 
                            <div class="mb-2 pt-2 px-4">
                                <span class="text-sm font-semibold inline-block py-2 capitalize rounded-full text-blueGray-700">
                                    Volume
                                </span>
                                <div class="pt-2">
                                    <input type="text" name="volume" placeholder="Volume Barang" class="px-2 py-3 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/2"/>
                                </div>
                            </div> 
                            <div class="mb-2 px-4">
                                <span class="text-sm font-semibold inline-block py-2 capitalize rounded-full text-blueGray-700">
                                    Kategori
                                </span>
                                <div class="pt-2">
                                    <select  name="category_id" id="category_id" class="px-2 py-3 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/2">
                                        @foreach ($cat   as $ct)
                                            <option value="{{ $ct->id }}">{{$ct->name_category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="mb-2 px-4">
                                <span class="text-sm font-semibold inline-block py-2 capitalize rounded-full text-blueGray-700">
                                    Satuan
                                </span>
                                <div class="pt-2">
                                    <select  name="unit_id" id="unit_id" class="px-2 py-3 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/2">
                                        @foreach ($unit as $ct)
                                            <option value="{{ $ct->id }}">{{$ct->name_unit}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="mb-2 pt-2 px-4">
                                <span class="text-sm font-semibold inline-block py-2 capitalize rounded-full text-blueGray-700">
                                    Harga Beli
                                </span>
                                <div class="pt-2">
                                    <input type="number" name="price_purchase" placeholder="Harga Beli" class="px-2 py-3 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/2"/>
                                </div>
                            </div> 
                            <div class="mb-2 pt-2 px-4">
                                <span class="text-sm font-semibold inline-block py-2 capitalize rounded-full text-blueGray-700">
                                    Harga Jual
                                </span>
                                <div class="pt-2">
                                    <input type="number" name="price_sell" placeholder="Harga Jual" class="px-2 py-3 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/2"/>
                                </div>
                            </div> 
                            <div class="mb-2 pt-2 px-4">
                                <span class="text-sm font-semibold inline-block py-2 capitalize rounded-full text-blueGray-700">
                                    Qty Stok
                                </span>
                                <div class="pt-2">
                                    <input type="number" name="qty_stock" placeholder="Kuantitas Stok" class="px-2 py-3 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/2"/>
                                </div>
                            </div> 
                            <div class="mb-2 pt-2 px-4">
                                <span class="text-sm font-semibold inline-block py-2 capitalize rounded-full text-blueGray-700">
                                    Qty Terjual
                                </span>
                                <div class="pt-2">
                                    <input type="number" name="qty_sold" placeholder="Kuantitas Terjual" class="px-2 py-3 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/2"/>
                                </div>
                            </div> 
                            <div class="mb-2 px-4">
                                <span class="text-sm font-semibold inline-block py-2 capitalize rounded-full text-blueGray-700">
                                    Status Barang
                                </span>
                                <div class="pt-2">
                                    <select  name="status" id="status" class="px-2 py-3 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/2">
                                        <option value="1">Stok Tersedia</option>
                                        <option value="0">Stok Habis</option>
                                    </select>
                                </div>
                            </div> 
                            
                            <div class="mb-2 px-4 pt-2">
                                <button type="submit" name="submit" class="bg-green-500 text-white active:bg-green-600 font-bold uppercase text-sm px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"
                                    >
                                Tambah
                                </button>
                                <a href="{{ url('items') }}" class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-sm px-4 py-2 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button"
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