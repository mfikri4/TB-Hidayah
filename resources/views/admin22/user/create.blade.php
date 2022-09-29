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
                    <i class="fas fa-plus mr-3"></i> Tambah Satuan
                </p>
            </div>
            <div class="leading-loose">
                <form action="{{ url('user/tambah') }}" method="POST" enctype="multipart/form-data" class="p-10 bg-white rounded shadow-xl">            
                    @csrf
                    <div class="mt-2 my-6">
                        <label class="block text-lg text-gray-600" for="title">Nama Pengguna</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="name_user" name="name_user" type="text" placeholder="Nama Pengguna" aria-label="Nama Pengguna">
                    </div>    
                    <div class="mt-2 my-6">
                        <label class="block text-lg text-gray-600" for="title">Email</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" placeholder="Email" aria-label="Email">
                    </div>    
                    <div class="mt-2 my-6">
                        <label class="block text-lg text-gray-600" for="title">Password</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" placeholder="Password" aria-label="Password">
                    </div>    
                    <div class="mt-2 my-6">
                        <label class="block text-lg text-gray-600" for="title">Konfirmasi Password</label>
                        <input class="w-1/3 px-3 py-2 text-gray-700 bg-gray-200 rounded" id="password_confirmation" name="password_confirmation" type="password" placeholder="Konfirmasi Password" aria-label="Konfirmasi Password">
                    </div>    
                    <div class="mt-2 my-6">
                        <label class="block text-lg text-gray-600" for="level">Role</label>
                        <select class="w-1/3 px-3 py-3 text-gray-700 bg-gray-200 rounded" name="level" id="level">
                            <option value="1">Admin</option>
                            <option value="2">Kasir</option>
                        </select>
                    </div>   
                    
                    <input type="submit" name="submit" class="text-white bg-green-500 hover:bg-green-400 py-1 px-3 rounded" value="Tambah Data">
                    <a href="{{ url('user') }}" class="text-white bg-gray-700 hover:bg-gray-400 py-3 px-4 rounded"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                </form>
            </div>
    </div>

@endsection