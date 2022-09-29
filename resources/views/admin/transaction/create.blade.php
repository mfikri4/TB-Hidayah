@extends('admin.app')
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <h3>Tambah Transaksi</h3>
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-12 ">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form  action="{{ url('transaction/create') }}" method="post">
                    {{ csrf_field() }}
                    <div class="field_wrapper">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2 mb-2">
                                    <label class="visually-hidden">Name</label>
                                    <input type="text" class="form-control" placeholder="Nama Pembeli">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="visually-hidden">Nama Barang</label>
                                    <select class="form-control select-state" name="items_id" id="items_id" required>
                                        <option value="" hidden="">--- Pilih Barang ---</option>
                                        @foreach ($itm as $items)
                                            <option value="{{ $items->id }}">{{$items->name}}</option>
                                        @endforeach
                                    </select>
                                </div>        
                                
                                <div class="col-2">
                                    <label class="visually-hidden">Jumlah</label>
                                    <input type="number" name="qty_transaction"  id="qty_transaction" class="form-control" placeholder="qty">
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-primary" type="submit">SIMPAN</a>

                    </form>
            </div>
        </div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="{{url('/assets/db.js')}}"></script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF=TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@endsection
