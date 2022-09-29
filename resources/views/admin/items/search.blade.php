@extends('admin.app')

@section('header')
    <div class="w-1/2">
        <a class="text-blueGray-600 text-sm capitalize hidden lg:inline-block font-semibold" href="{{ url('items') }}">              
            Barang</a>
        <a class="text-blueGray-400 text-sm capitalize hidden lg:inline-block font-semibold" href="{{ url('items') }}">              
            /</a>   
        <a class="text-blueGray-600 text-sm capitalize hidden lg:inline-block font-semibold" href="">              
            Pencarian Barang</a>
        
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
                                <h3 class="font-semibold text-white text-2xl">
                                  Barang
                                </h3>
                              </div>
                              
                              <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                <a
                                  class="bg-green-500 text-white bg-hover:bg-green-400 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1"
                                  type="button"
                                  href="{{ url('items/create') }}"
                                  style="transition: all 0.15s ease"
                                  >
                                  Tambah Data
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
                            <th class="px-4 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              @sortablelink('id','No.')
                            </th>
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              @sortablelink('name_item','Nama Barang')       
                            </th>
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              @sortablelink('volume','Volume')
                            </th> 
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              @sortablelink('category_id','Kategori')
                            </th> 
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              @sortablelink('price_purchase','Harga Beli')
                            </th> 
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              @sortablelink('price_sell','Harga Jual')
                            </th>
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              @sortablelink('qty_stock','Qty Stok')
                            </th>       
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              @sortablelink('qty_sold','Qty Terjual')
                            </th>                                    
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              @sortablelink('status','Status')
                            </th>         
                            <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                              Aksi
                            </th>
                          </tr>
                        </thead>
                        @foreach ($data as $cat)
                        <tbody class="bg-white hover:bg-gray-200">
                          <tr class="hover:text-lightBlue-500 ">
                            <td class="odd:bg-white even:bg-grey  border-t-0 px-4 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4 ">
                              {{ ++$i }}
                            </td>                            
                            <td class="odd:bg-white even:bg-grey  border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
                              {{$cat->name_item}}
                            </td>
                            <td class="border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
                              {{$cat->volume}}
                            </td>
                            <td class="border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
                              {{$cat->name_category}}
                            </td>
                            <td class="border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
                              {{$cat->price_purchase}}
                            </td>
                            <td class="border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
                              {{$cat->price_sell}}
                            </td>
                            <td class="border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
                              {{$cat->qty_stock}}
                            </td>
                            <td class="border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
                              {{$cat->qty_sold}}
                            </td>
                            <td class="border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
                              @if ($cat->status == 1)
                                  Tersedia
                              @else
                                  Tidak Tersedia
                              @endif
                            </td>
                            <td class="border-t-0 px-2 align-middle border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
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
                          </tbody>
                            @endforeach
                      </table>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>

@endsection