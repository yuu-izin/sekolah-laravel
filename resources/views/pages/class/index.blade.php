<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Halaman Kelas
        </h2>
        <div class="text-sm text-gray-500">Halaman untuk memanajemen Data Kelas</div>
    </x-slot>

    <div class="py-12">
        @if (session('success'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-3">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Berhasil!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-md p-4 mb-4">
                <div class="flex justify-between mb-3">
                    <div class="mb-2 font-bold">Data Kelas</div>
                    <a href="{{ route('classes.create') }}" class="bg-blue-950 text-white rounded-md text-sm py-2 px-3">Tambah Data Kelas</a>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th class="px-6 py-3">
                                    Nama Kelas
                                </th>
                                <th class="px-6 py-3">
                                    No. Kelas
                                </th>
                                <th class="px-6 py-3">
                                    Siswa
                                </th>
                                <th class="px-6 py-3">
                                    Tanggal Dibuat
                                </th>
                                <th class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($classes as $class)
                            <tr class="bg-white border-b">
                                    <td class="px-6 py-4 font-medium text-gray-900">
                                        {{ $class->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $class->class_number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @foreach ($class->students as $student)
                                            <div>{{ $loop->iteration }}. {{ $student->name }}</div>
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $class->created_at }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('classes.edit', $class->id) }}" class="text-blue-950 hover:underline">Edit</a>
                                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
