@extends('admin.app')
@section('content')
<h1 class="text-3xl font-bold text-black">Satuan</h1>
    <hr>

    <div class="w-full mt-4">
        @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
        @endif
            <div class="w-full lg:w-full mt-6 ">
                <p class="text-xl pb-6 flex items-center">
                    <i class="fas fa-edit mr-3"></i> Edit Satuan
                </p>
            </div>
            <div class="leading-loose">
                <form action="{{ url('unit/edit/' . $data->id)  }}" method="POST" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl">            
                    @csrf
                    <div class="mt-2 my-6">
                        <label class="block text-lg text-gray-600" for="title">Nama Satuan</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="name_unit" name="name_unit" type="text" placeholder="Nama Kategori" aria-label="Nama Kategori"  value ="{{ $data->name }}">
                    </div>    
                    

                    <input type="submit" name="submit" class="text-white bg-green-500 hover:bg-green-400 py-1 px-3 rounded" value="Edit Data">
                    <a href="{{ url('unit') }}" class="text-white bg-gray-700 hover:bg-gray-400 py-3 px-4 rounded"><i class="fas fa-chevron-circle-left"></i>Kembali</a>
                </form>
            </div>
    </div>


@endsection