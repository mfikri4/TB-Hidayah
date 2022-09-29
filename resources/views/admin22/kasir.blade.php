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

        <h1 class="text-3xl font-bold text-black">Dashboard</h1>
        <p class="text-lg">Halo, Selamat Datang di halaman Kasir TB HIDAYAH !</p>
        @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status')}}
        </div>
        @endif
        <img src="{{ url('/assets/image/dashboard.jpg') }}" class="py-2 align-items-center object-center hover:text-gray-300 flex items-center justify-center">
                
        <hr>


        

@endsection