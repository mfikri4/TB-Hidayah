@extends('admin.app')

@section('css')
<style>
    .menu-link {
        color: black;
    }

    .menu-link:hover {
        text-decoration: none;
    }
</style>
@endsection

@section('content')

    @if(auth()->user()->level == 1)
        <h1 class="text-3xl text-black">Dashboard</h1>
        
        <p class="text-lg ">Halo, Selamat Datang Admin di halaman Dashboard TB HIDAYAH !</p>
        <hr>
        <hr>
    <!-- strat wrapper -->
    <div class="h-screen flex flex-row flex-wrap">
                <!-- strat content -->
        <div class="bg-gray-100 flex-1 p-6 md:mt-8"> 
            <!-- General Report -->
            <div class="grid grid-cols-4 gap-4 xl:grid-cols-4">


                <!-- card -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            
                            <!-- top -->
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-indigo-700 fad fa-shopping-cart"></div>

                            </div>
                            <!-- end top -->

                            <!-- bottom -->
                            <div class="mt-8">
                                <h1 class="h5 num-4">{{$c_item}}</h1>
                                <p class="text-grey-100 text-l">Total Produk</p>
                                
                            </div>                
                            <!-- end bottom -->
                
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- end card -->


                <!-- card -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            
                            <!-- top -->
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-red-700 fad fa-store"></div>
                            </div>
                            <!-- end top -->

                            <!-- bottom -->
                            <div class="mt-8">
                                <h1 class="h5 num-4">{{$c_item_sold}}</h1>
                                <p>Produk Terjual</p>
                            </div>                
                            <!-- end bottom -->
                
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- end card -->


                <!-- card -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            
                            <!-- top -->
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-yellow-600 fad fa-sitemap"></div>

                            </div>
                            <!-- end top -->

                            <!-- bottom -->
                            <div class="mt-8">
                                <h1 class="h5 num-4">{{$c_item_sold}}</h1>
                                <p>Laba Penjualan</p>
                            </div>                
                            <!-- end bottom -->
                
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- end card -->


                <!-- card -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            
                            <!-- top -->
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-green-700 fad fa-users"></div>
                                <span class="rounded-full text-white badge bg-teal-400 text-xs">
                                    150%
                                    <i class="fal fa-chevron-up ml-1"></i>
                                </span>
                            </div>
                            <!-- end top -->

                            <!-- bottom -->
                            <div class="mt-8">
                                <h1 class="h5 num-4"></h1>
                                <p>new Visitor</p>
                            </div>                
                            <!-- end bottom -->
                
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- end card -->
            </div>  
        </div>           
    </div> 


    @elseif(auth()->user()->level == 2)
        <h1 class="text-3xl text-black">Dashboard</h1>
        <p class="text-lg">Halo, Selamat Datang di halaman Kasir TB HIDAYAH!!! !</p>
        @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status')}}
        </div>
        @endif
        <div class="bg-white overflow-auto my-4">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">No</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Nama Barang</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Jumlah Satuan</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Harga Barang</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Total Harga</th>
                        <th class="text-center py-3 px-2 uppercase font-semibold text-sm">Action</th>
                    </tr>
                </thead>        
                <?php 
                    $grandtotal = 0;
                    
                ?>

                    <th class="text-left py-3 px-3" colspan="4"><a class="hover:text-gray-400">TOTAL HARGA</th>
                    <th class="text-left py-3 px-3" colspan="2"><a class="hover:text-gray-400">@currency($grandtotal) </th>
                    
                </tr>
            <form action="{{ url('cart/insert') }}" method="GET" enctype="multipart/form-data">
                <tr>
                    <th class="text-left py-3 px-3" colspan="4"><a class="hover:text-gray-400">Jumlah Uang Pembeli</th>
                    <th class="text-left py-3 px-3" colspan="2">
                    <input type="number" name="uang_bayar"  id="uang_bayar" class="w-1/2 px-3 py-2 text-gray-700 bg-gray-200 rounded" placeholder="Jumlah Uang Pembeli"></th>
                </tr>
                <tr>
                    <th class="text-left py-3 px-3" colspan="4"><a class="hover:text-gray-400">Nama Kasir</th>
                    <th class="text-left py-3 px-3" colspan="2">
 
                        <input type="text" readonly name="name_user" id="name_user" class="w-1/2 px-3 py-2 text-gray-700 bg-gray-200 rounded" value="{{Auth::user()->name_user}} "></th>
                </table>
        </div>

    @endif
</div>

@endsection