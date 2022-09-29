<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<head>
    <title>Laravel 8 Generate PDF From View</title>
</head>
<body>
        <div style="text-align: center;">
            <img src="{{ public_path('assets/image/header-nota.png') }}" style="width: 700px; height: 150px">
        </div>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">
                        </th>
                </tr>
            </thead>
            @foreach ($data2 as $dt2)
            <thead>
                <tr>
                    <th scope="col">Nama Pembeli : {{$dt2->name_user}}</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th scope="col">Tanggal Pembelian : {{$dt2->created_at->format('d, M Y');}}</th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th scope="col">Pukul : {{$dt2->created_at->format('H:i');}}</th>
                </tr>
            </thead>
            @endforeach
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Harga Total</th>
                </tr>
            </thead>
            <?php
            $grandtotal = 0; 
            $uang_kembali = 0;
            ?>
            <tbody>
                @foreach ($data as $cat)
                <tr>
                    <td scope="row">1</td>
                    <td>{{$cat->name}} {{$cat->volume}}</td>
                    <td>{{$cat->qty_transaction}}</td>
                    <td>@currency($cat->price_sell) </td>            
                    <?php 
                        $subtotal = $cat->qty_transaction * $cat->price_sell;
                        $grandtotal += $subtotal ;
                    ?>
                    <td>@currency($subtotal)</td>
                </tr>
                @endforeach

                @foreach ($data2 as $dt2)
                <?php
                $uang_kembali = $dt2->uang_bayar - $grandtotal;
                ?>
                <tr>
                    <th colspan="4">TOTAL HARGA</th>
                    <th> @currency($grandtotal) </th>
                </tr>
                <tr>
                    <th colspan="4">UANG BAYAR</th>
                    <th>@currency($dt2->uang_bayar)</th>
                </tr>
                <tr>
                    <th colspan="4">UANG KEMBALIAN</th>
                    <th>@currency($uang_kembali)</th>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>
<style>

</style>
</html>