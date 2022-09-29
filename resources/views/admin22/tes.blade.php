        <div class="grid grid-cols-4 gap-2 justify-evenly mt-10"> 
            <div class="grid grid-rows-3 text-center w-26 h-48">
                <div class="bg-blue-400 text-center w-26 h-12">
                    <h4 class="text-lg text-bold py-3 px-4">Keranjang</h4>
                </div> 
                <div class="bg-white-400 text-center w-26 h-12">2</div> 
                <div class="bg-blue-400 text-center w-26 h-12">2</div> 
            </div> 
            <div class="bg-blue-400 text-center w-26 h-12">2</div> 
            <div class="bg-blue-400 text-center w-26 h-12">3</div> 
            <div class="bg-blue-400 text-center w-26 h-12">4</div> 
        </div> 

        <div class="flex flex-wrap mt-6">
            <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-plus mr-3"></i> Monthly Reports
                </p>
                <div class="p-6 bg-white">
                    <canvas id="chartOne" width="400" height="200"></canvas>
                </div>
            </div>
            <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-check mr-3"></i> Resolved Reports
                </p>
                <div class="p-6 bg-white">
                    <canvas id="chartTwo" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        <div class="w-full mt-12">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-list mr-3"></i> Latest Reports
            </p>
            <div class="bg-white overflow-auto">
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                            <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">Lian</td>
                            <td class="w-1/3 text-left py-3 px-4">Smith</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="w-1/3 text-left py-3 px-4">Emma</td>
                            <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                            <td class="w-1/3 text-left py-3 px-4">Williams</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                            <td class="w-1/3 text-left py-3 px-4">Brown</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">Lian</td>
                            <td class="w-1/3 text-left py-3 px-4">Smith</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="w-1/3 text-left py-3 px-4">Emma</td>
                            <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr>
                            <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                            <td class="w-1/3 text-left py-3 px-4">Williams</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                            <td class="w-1/3 text-left py-3 px-4">Brown</td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                            <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>



        <div class="bg-white my-2">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">No</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Nama Barang</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Jumlah Satuan</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Harga Barang</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Total Harga</th>
                    </tr>
                </thead>        
                <?php 
                    $grandtotal = 0;
                ?>        
                <div class="bg-blue-400 text-center  ">
                    <h1 class="text-xl font-bold text-black">Keranjang</h1>
                    <h4 class="text-m font-regular text-black">Keranjang anda masih : {{$count}}</h1>
                </div>
                @foreach ($data as $trx)
                <tbody class="bg-white text-black">
                    <tr>
                        <td class="text-left py-3 px-3">{{ ++$i }}</td>
                        <td class="text-left py-3 px-3">{{$trx->name}} {{$trx->volume}}</td>
                        <td class="text-left py-3 px-3">{{$trx->qty_transaction}}</td>
                        <td class="text-left py-3 px-3">@currency($trx->price_sell)</td>
                        <td class="text-left py-3 px-3">@currency($subtotal)</td>
                    </tr>
                </tbody>      
                @endforeach

                    
                    
                </tr>
            </table>
        </div>