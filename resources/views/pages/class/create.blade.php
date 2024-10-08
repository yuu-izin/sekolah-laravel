<x-app-layout>
    <x-slot name="header">
    <div class="flex justify-between">
    <div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Halaman Tambah Kelas
    </h2>
    <div class="text-sm text-gray-500">Halaman untuk menambahkan Data Kelas</div>
    </div>
    <div>
    <a href="{{ route('classes.index') }}"
    class="bg-blue-950 text-white rounded-md py-2 px-4 text-sm">Kembali</a>
    </div>
    </div>
    </x-slot>
    <div class="py-12">
    @if ($errors->any())
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Terjadi Kesalahan!</strong>
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    </div>
    @endif
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900">
    <form action="{{ route('classes.store') }}" method="POST" class="max-w-sm mx-auto">
    @csrf
    <div class="mb-5">
    <label for="name"
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Nama</label>
    <input type="text" name="name"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
    placeholder="Masukkan Nama" required autocomplete="off"/>
    </div>
    <div class="mt-5">
    <label for="email"
    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Kelas</label>
    <input type="text" name="class_number"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
    placeholder="Masukkan kelas" required autocomplete="off"/>
    </div>
    <button type="submit"
    class="mt-4 text-white bg-blue-950 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center ">Submit</button>
    </form>
    </div>
    </div>
    </div>
    </div>
    </x-app-layout>
