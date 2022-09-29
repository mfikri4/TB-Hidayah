@extends('admin.app')

@section('header')
    <div class="w-1/2">
        <a class="text-blueGray-600 text-sm capitalize hidden lg:inline-block font-semibold" href="{{ url('cart') }}">              
            Transaksi</a>
        <!--<a class="text-blueGray-400 text-sm capitalize hidden lg:inline-block font-semibold" href="{{ url('items') }}">              
            /</a>   
        <a class="text-blueGray-600 text-sm capitalize hidden lg:inline-block font-semibold" href="{{ url('items') }}">              
            Tambah Barang</a>
        -->
    </div>
@endsection
@section('content')
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
      <div class="relative w-full bg-gray-100 md:pt-4 pb-32 pt-20 scroll-smooth hover:scroll-auto ">
    
          <div class="px-4 md:px-10 mx-auto w-full">
                              
                    <div class="flex flex-wrap mt-4">
                      <div class="w-full px-4">
                        <div class="relative flex flex-col min-w-0 break-words bg-white w-full shadow-lg rounded">
                          <div class="rounded-t px-4 py-3 bg-gray-400 border-0">
                            <div class="flex flex-wrap items-center">
                              <div class="relative w-full px-4 max-w-full flex-grow flex-1" >
                                <h3 class="font-semibold text-white text-3xl">
                                  Transaksi
                                </h3>
                              </div>
                              
                              <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                              <a href="{{ url('cart/create') }}">
                                    <span
                                        class="relative inline-block px-3 py-1 mr-1 font-semibold text-white leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-green-500 hover:bg-green-700 rounded-full"></span>
                                        <span class="relative"><i class="fas fa-plus"></i>  Tambah Data</span>
                                    </span>
                                </a>   
                                
                              </div>
                           </div>
                          </div>
                    <div class="overflow-x-auto">
                      <!-- Projects table -->
                      <table
                        class="items-center w-full bg-transparent border-collapse border border-slate-400"
                      >
                        <thead>
                          <tr>                            
                            <th class="px-2  bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              No.
                            </th>
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              Nama Barang      
                            </th>    
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              Stok Barang      
                            </th>    
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              Jumlah Beli    
                            </th> 
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              Harga Barang      
                            </th>   
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              Harga Total      
                            </th>  
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              Aksi
                            </th>
                          </tr>
                        </thead>
                        <?php 
                            $grandtotal = 0;
                            $grandtotalbeli = 0;
                            $pendapatan = 0;
                        ?>
                        @foreach ($data as $trx)
                        <?php 
                            $subtotal       = $trx->qty_transaction * $trx->price_sell;
                            $subtotalbeli       = $trx->qty_transaction * $trx->price_purchase;
                            $grandtotal += $subtotal ;
                            $grandtotalbeli += $subtotalbeli;
                            $qty_stock      = $trx->qty_stock - $trx->qty_transaction;
                            $qty_sold       = $trx->qty_sold + $trx->qty_transaction;
                            $pendapatan     = $grandtotal - $grandtotalbeli; 
                        ?>
                        <tbody class="bg-white">
                          <tr class="">
                            <td class="odd:bg-white even:bg-grey  border-t-0 px-4 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-2 ">
                              {{ ++$i }}
                            </td>                            
                            <td class="odd:bg-white even:bg-grey  border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
                              {{$trx->name_item}} {{$trx->volume}}
                            </td>         
                            <td class="odd:bg-white even:bg-grey  border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
                              {{$trx->qty_stock}}
                            </td>                                     
                            <td class="odd:bg-white even:bg-grey  border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
                              {{$trx->qty_transaction}}
                            </td>                           
                            <td class="odd:bg-white even:bg-grey  border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
                              @currency($trx->price_sell)
                            </td>                           
                            <td class="odd:bg-white even:bg-grey  border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
                              @currency($subtotal) 
                            </td>  
                            
                            <td class="border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap py-4">
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
                            @endforeach
                         
                          
                          <tr>
                              <th class=" border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4" colspan="4"><a class="hover:text-gray-400">TOTAL HARGA</th>
                              <th class=" border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4 text-justify" colspan="2"><a class="hover:text-gray-400">@currency($grandtotal)</th> 
                          </tr>
                          <form action="{{ url('cart/insert') }}" method="GET" enctype="multipart/form-data">
                              <tr>
                                  <th class=" border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4" colspan="4"><a class="hover:text-gray-400">Jumlah Uang Pembeli</th>
                                  <th class=" border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4 text-justify" colspan="2">
                                  <input type="number" name="uang_bayar"  id="uang_bayar" class="px-2 py-2 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/3" placeholder="Jumlah Uang Bayar"></th>
                                </tr>
                                <tr>
                                  <input type="hidden" name="total_untung" value="{{$pendapatan}}"  id="total_untung" class="px-2 py-2 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/3"></th>
                                  <input type="hidden" name="total_modal" value="{{$grandtotalbeli}}"  id="total_modal" class="px-2 py-2 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/3"></th>
                                  <input type="hidden" name="total_bayar" value="{{$grandtotal}}"  id="total_bayar" class="px-2 py-2 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/3"></th>
                                </tr>
                              <tr>
                                  <th class=" border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4" colspan="4"><a class="hover:text-gray-400">Nama Kasir</th>
                                  <th class=" border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4 text-justify" colspan="2">
                                      <input type="text" readonly name="name_user" id="name_user" class="px-2 py-2 placeholder-slate-300 text-slate-600 relative bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-1/3 text-center" value="{{Auth::user()->name_user}} "></th>
                              </tbody>
                                    </table>
                      </div>
                              <button class="bg-gray-400 hover:bg-gray-300 text-white font-bold py-2 px-4 rounded" type="submit">Bayar Transaksi</button>
                              </button>
                          </form>
        
             
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>

@endsection