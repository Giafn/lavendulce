<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">Tambah Produk</a>

                    @if(session('success'))
                        <div class="mt-4 p-3 bg-green-100 text-green-800 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="w-full mt-4 border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2">Nama</th>
                                <th class="border p-2">Harga</th>
                                <th class="border p-2">Deskripsi</th>
                                <th class="border p-2">Foto</th>
                                <th class="border p-2">Stok</th>
                                <th class="border p-2">Kadaluarsa</th>
                                <th class="border p-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr class="{{ $product->deadstock ? 'bg-red-100' : '' }}">
                                <td class="border p-2">{{ $product->name }}</td>
                                <td class="border p-2">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="border p-2 max-w-xs truncate">
                                    {{ $product->description }}
                                </td>
                                <td class="border p-2">
                                    @if($product->photo)
                                        <img src="{{ asset('storage/' . $product->photo) }}" width="80">
                                    @endif
                                </td>
                                <td class="border p-2">{{ $product->stock }}</td>
                                <td class="border p-2">{{ $product->expired_at }}</td>
                                <td class="border p-2">
                                    <a href="{{ route('products.edit', $product->id) }}" class="px-3 py-1 text-black font-bold rounded-md">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="px-3 py-1 text-red-800 font-bold rounded-md" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                    </form>
                                    @if (!$product->deadstock)
                                    <form action="{{ route('products.dead-stock', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="px-3 py-1 text-red-800 font-bold rounded-md" onclick="return confirm('Yakin tandai deadstock?')">Set Deadstock</button>
                                    </form>
                                    @endif
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
