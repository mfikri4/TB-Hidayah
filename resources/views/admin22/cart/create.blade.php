@extends('admin.app')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
@section('content')

<meta name="_token" content="{{csrf_token()}}" />
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
                <form action="{{ url('cart/create') }}" method="POST" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl">            
                    @csrf
                    <div class="mt-2 my-6">
                        <label class="block text-lg text-gray-600" for="name">Nama Barang</label>
                        <select class="w-1/3 px-3 py-3 text-gray-700 bg-gray-200 rounded" name="items_id" id='myselect' required>
                            <option value="">--- Pilih Barang ---</option>
                            @foreach ($itm as $items)
                            <option value="{{$items->id}}">{{$items->name}} {{$items->volume}} - Rp. {{$items->price_sell}}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="mt-2 my-6">
                        <label class="block text-lg text-gray-600" for="qty_transaction">Jumlah Barang</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="qty_transaction" name="qty_transaction" type="number" placeholder="Jumlah Barang" aria-label="Harga Jual">
                    </div>    
                    <input type="submit" name="submit" class="text-white bg-green-500 hover:bg-green-400 py-1 px-3 rounded" value="Tambah Data">
                    <a href="{{ url('cart') }}" class="text-white bg-gray-700 hover:bg-gray-400 py-3 px-4 rounded"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                </form>
            </div>
    </div>

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
  $('#myselect').select2({
    placeholder: "Pilih Barang",
    allowClear: true
  });
</script>
<script type="text/javascript">
    
    //$('#itemsId').change(function(){
    //    var id = $(this).val();
    //    var url = '{{ route("getDetails", ":id") }}';
    //    url = url.replace(':id', id);

    //    $.ajax({
     //       url: url,
    //        type: 'get',
     //       dataType: 'json',
    //        success: function(response){
    //            if(response != null){
     //               $('#price').val(response.price_sell);
    //            }
     //       }
     //   });
    //}); -->

    //$(document).ready(function() {
    //    $('#itemsId').on('change', function() {
    //        const id = $(this).val();

    //        // Fetch dari API
    //        fetch("http://localhost:8000/api/items/" + id)
    //            .then(response => response.json())
    //            .then(data => {
    //              $("#price").val(data.price_sell);
    //          });
    //    });
    //});
   
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
@endsection
