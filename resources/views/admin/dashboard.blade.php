@extends('admin.app')

@section('header')
    <div class="w-1/2">
        <a class="text-blueGray-700 text-sm uppercase hidden lg:inline-block font-semibold" href="./index.html">              
        Dashboard</a>
    </div>
@endsection
@section('content')

        <div class=" relative w-full h-screen bg-gray-100 md:pt-12 pb-40 pt-8 scroll-smooth hover:scroll-auto ">
          <div class="pb-10 px-10 mx-auto w-full">
              <!-- Card stats -->
              <div class="flex flex-wrap">
                
                <!--ITEM 4 -->
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                  <div
                    class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
                  >
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div
                          class="relative w-full pr-4 max-w-full flex-grow flex-1"
                        >
                          <h5
                            class="text-blueGray-400 uppercase font-bold text-xs"
                          >
                            Total Produk
                          </h5>
                          <span class="font-semibold text-l text-blueGray-700">
                            {{$c_item}}
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500"
                          >
                            <i class="fa fa-tags"></i>
                          </div>
                        </div>
                      </div>
                      <!-- <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-emerald-500 mr-2">
                          <i class="fas fa-arrow-up"></i> 3.48%
                        </span>
                        <span class="whitespace-nowrap">
                          Since last month
                        </span>
                      </p> -->
                    </div>
                  </div>
                </div>
                
                <!--ITEM 2 -->
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                  <div
                    class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
                  >
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div
                          class="relative w-full pr-4 max-w-full flex-grow flex-1"
                        >
                          <h5
                            class="text-blueGray-400 uppercase font-bold text-xs"
                          >
                            Total Terjual
                          </h5>
                          <span class="font-semibold text-l text-blueGray-700">
                            {{$c_item_sold}}
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500"
                          >
                            <i class="fas fa-shopping-cart"></i>
                          </div>
                        </div>
                      </div>
                      <!-- <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-red-500 mr-2">
                          <i class="fas fa-arrow-down"></i> 3.48%
                        </span>
                        <span class="whitespace-nowrap"> Since last week </span>
                      </p> -->
                    </div>
                  </div>
                </div>
                <!--ITEM 3 -->
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                  <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Total Laba
                          </h5>
                          <span class="font-semibold text-l text-blueGray-700">
                            @currency($c_laba)
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                            <i class="fas fa-chart-line"></i>
                          </div>
                        </div>
                      </div>
                      <!-- <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-orange-500 mr-2">
                          <i class="fas fa-arrow-down"></i> 1.10%
                        </span>
                        <span class="whitespace-nowrap"> Since yesterday </span>
                      </p> -->
                    </div>
                  </div>
                </div>
                <!--ITEM 4 -->
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                  <div
                    class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
                  >
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div
                          class="relative w-full pr-4 max-w-full flex-grow flex-1"
                        >
                          <h5
                            class="text-blueGray-400 uppercase font-bold text-xs"
                          >
                            Pendapatan
                          </h5>
                          <span class="font-semibold text-l text-blueGray-700">
                            @currency($c_modal)
                          </span>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div
                            class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500"
                          >
                            <i class="fas fa-percent"></i>
                          </div>
                        </div>
                      </div>
                      <!-- <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-emerald-500 mr-2">
                          <i class="fas fa-arrow-up"></i> 12%
                        </span>
                        <span class="whitespace-nowrap">
                          Since last month
                        </span>
                      </p> -->
                    </div>
                  </div>
                </div>
  
                <!--DOWNLOAD 1 -->
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4 pt-4">
                  <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Download Stok Barang
                          </h5>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-green-500">
                            <a href="exp_excel_barang"> <i class="fas fa-download"></i></a>
                          </div>
                        </div>
                      </div>
                      <!-- <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-red-500 mr-2">
                          <i class="fas fa-arrow-down"></i> 3.48%
                        </span>
                        <span class="whitespace-nowrap"> Since last week </span>
                      </p> -->
                    </div>
                  </div>
                </div>
                <!--DOWNLOAD 2 -->
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4 pt-4">
                  <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Download 10 Transaksi Terakhir
                          </h5>
                         
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-green-500">
                            <a href="exp_excel_ten"> <i class="fas fa-download"></i></a>
                          </div>
                        </div>
                      </div>
                      <!-- <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-red-500 mr-2">
                          <i class="fas fa-arrow-down"></i> 3.48%
                        </span>
                        <span class="whitespace-nowrap"> Since last week </span>
                      </p> -->
                    </div>
                  </div>
                </div>

                <!--DOWNLOAD 3 -->
                <div class="w-full lg:w-6/12 xl:w-3/12 px-4 pt-4">
                  <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
                    <div class="flex-auto p-4">
                      <div class="flex flex-wrap">
                        <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                          <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                            Download Semua Transaksi
                          </h5>
                        </div>
                        <div class="relative w-auto pl-4 flex-initial">
                          <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-green-500">
                            <a href="exp_excel"> <i class="fas fa-download"></i></a>
                          </div>
                        </div>
                      </div>
                      <!-- <p class="text-sm text-blueGray-400 mt-4">
                        <span class="text-red-500 mr-2">
                          <i class="fas fa-arrow-down"></i> 3.48%
                        </span>
                        <span class="whitespace-nowrap"> Since last week </span>
                      </p> -->
                    </div>
                  </div>
                </div>


              </div>
            </div>

            <!--Stok Barang Menipis-->
            <div class="relative w-full bg-gray-100 pb-10 scroll-smooth hover:scroll-auto ">
              <div class="px-10 mx-auto w-full">
                <div class="flex flex-wrap mt-4">
                  <div class="w-full px-4">
                    <div class="relative flex flex-col min-w-0 break-words bg-white w-full shadow-lg rounded">
                      <div class="rounded-t px-4 py-3 bg-gray-400 border-0">
                        <div class="flex flex-wrap items-center">
                          <div class="relative w-full px-4 py-3 max-w-full flex-grow flex-1" >
                            <h3 class="font-semibold text-white text-3xl">
                              Stok Barang menipis
                            </h3>
                            
                          </div>
                          
                          <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <a href="{{ url('items') }}">
                                <span
                                    class="relative inline-block px-3 py-1 mr-1 font-semibold text-white leading-tight">
                                    <span aria-hidden
                                        class="absolute inset-0 bg-green-500 hover:bg-green-700 rounded-full"></span>
                                    <span class="relative"> Selengkapnya</span>
                                </span>
                            </a>   
                            
                          </div>
                        </div>
                      </div>
                      <div class="overflow-x-auto">
                        <!-- Projects table -->
                        <table class="items-center w-full bg-transparent border-collapse border border-slate-400"
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
                              <th class="px-2 bg-blueGray-100 text-blueGray-700 align-middle border border-solid border-blueGray-100 py-3 text-xs  border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                Status
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
                              <td class="border-t-0 px-2 align-middle text-red-500 border-l-0 border-r-0 border border-slate-300 text-xs whitespace-nowrap p-4">
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

            <!--CHART-->
            <div class="relative break-words w-full pb-10 shadow-lg rounded bg-gray-100">
              <div class="rounded-t mx-auto w-full mb-0 px-10 py-3">                    
                <div class="flex flex-wrap items-center mt-4">
                  <div class="w-full px-4">
                    <div class="relative flex flex-col px-4 py-6 min-w-0 break-words bg-white w-full shadow-lg rounded">
                      <h6 class="uppercase text-blueGray-400 mb-1 text-xs font-semibold">
                        Grafik
                      </h6>
                      <h2 class="text-blueGray-700 text-xl font-semibold">
                        Transaksi Harian
                      </h2>
                      <div class="p-4 flex-auto">
                        <!-- Chart -->
                        <div class="relative" style="">
                          <h1>{{ $chart1->options['chart_title'] }}</h1>
                            {!! $chart1->renderHtml() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
            <!--CHART2-->
            <div class="relative break-words w-full pb-10 shadow-lg rounded bg-gray-100">
              <div class="rounded-t mx-auto w-full mb-0 px-10 py-3">                    
                <div class="flex flex-wrap items-center mt-4">
                  <div class="w-full px-4">
                    <div class="relative flex flex-col px-4 py-6 min-w-0 break-words bg-white w-full shadow-lg rounded">
                      <h6 class="uppercase text-blueGray-400 mb-1 text-xs font-semibold">
                        Grafik
                      </h6>
                      <h2 class="text-blueGray-700 text-xl font-semibold">
                        Transaksi Mingguan
                      </h2>
                      <div class="p-4 flex-auto">
                        <!-- Chart -->
                        <div class="relative" style="">
                            {!! $chart2->renderHtml() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--CHART3-->
            <div class="relative break-words w-full pb-20 shadow-lg rounded bg-gray-100">
              <div class="rounded-t mx-auto w-full mb-0 px-10 py-3">                    
                <div class="flex flex-wrap items-center mt-4">
                  <div class="w-full px-4">
                    <div class="relative flex flex-col px-4 py-6 min-w-0 break-words bg-white w-full shadow-lg rounded">
                      <h6 class="uppercase text-blueGray-400 mb-1 text-xs font-semibold">
                        Grafik
                      </h6>
                      <h2 class="text-blueGray-700 text-xl font-semibold">
                        Transaksi Bulanan
                      </h2>
                      <div class="p-4 flex-auto">
                        <!-- Chart -->
                        <div class="relative" style="">
                            {!! $chart3->renderHtml() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

@endsection

@section('javascript')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
{!! $chart2->renderJs() !!}
{!! $chart3->renderJs() !!}
@endsection
