@extends('admin.app')
@section('content')
    <h1 class="text-3xl font-bold text-black">Kategori</h1>
    <hr>

    <div class="w-full mt-10 my-10">
        @if (Session::has('status'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('status') }}
        </div>
        @endif
        
        <a href="{{ url('category/create') }}" class="my-10 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-plus mr-2"></i> Tambah Kategori
        </a>
        <div class="bg-white overflow-auto my-4">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">No</th>
                        <th class="text-left py-3 px-3 uppercase font-semibold text-sm">Nama Kategori</th>
                        <th class="text-center py-3 px-2 uppercase font-semibold text-sm">Action</th>
                    </tr>
                </thead>
                @foreach ($data as $cat)
                <tr>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{ ++$i }}</td>
                    <td class="text-left py-3 px-3"><a class="hover:text-blue-500">{{$cat->name_category}}</td>
                    <td class="text-center py-3 px-3"><a class="hover:text-white-500">
                        <a href="{{ url('category/edit/'.$cat->id) }}">
                            <span
                                class="relative inline-block px-4 py-2 font-semibold text-white leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-blue-500 opacity-80 hover:bg-blue-700 rounded-full"></span>
                                <span class="relative"><i class="far fa-edit"></i> Edit</span>
                            </span>    
                        </a>
                        <a href="{{ url('category/delete/'.$cat->id) }}">
                            <span
                                class="relative inline-block px-4 py-2 font-semibold text-white leading-tight">
                                <span aria-hidden
                                    class="absolute inset-0 bg-red-500 opacity-80 hover:bg-red-700 rounded-full"></span>
                                <span class="relative"><i class="fas fa-trash"></i> Delete</span>
                            </span>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection