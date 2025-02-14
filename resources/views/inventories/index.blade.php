<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stok Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('inventories.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">Tambah Barang</a>

                    @if(session('success'))
                        <div class="mt-4 p-3 bg-green-100 text-green-800 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="w-full mt-4 border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2">Nama</th>
                                <th class="border p-2">Jumlah</th>
                                <th class="border p-2">Satuan</th>
                                <th class="border p-2">Deadstock</th>
                                <th class="border p-2">Expired</th>
                                <th class="border p-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventories as $inventory)
                            <tr>
                                <td class="border p-2">{{ $inventory->name }}</td>
                                <td class="border p-2">{{ $inventory->quantity }}</td>
                                <td class="border p-2">{{ $inventory->unit }}</td>
                                <td class="border p-2">{{ $inventory->deadstock ? 'Ya' : 'Tidak' }}</td>
                                <td class="border p-2">{{ $inventory->expired_at ?? '-' }}</td>
                                <td class="border p-2">
                                    <a href="{{ route('inventories.edit', $inventory->id) }}" class="px-3 py-1 text-black font-bold rounded-md">Edit</a>
                                    <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1 text-red-800 font-bold rounded-md" onclick="return confirm('Yakin hapus?')">Hapus</button>
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
