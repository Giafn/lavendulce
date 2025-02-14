<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Masuk/Keluar Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('product_logs.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700">Produk</label>
                            <select name="product_id" class="w-full border rounded-lg p-2" required>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Tipe</label>
                            <select name="type" class="w-full border rounded-lg p-2" required>
                                <option value="in">Barang Masuk</option>
                                <option value="out">Barang Keluar</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Jumlah</label>
                            <input type="number" name="quantity" class="w-full border rounded-lg p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Tanggal</label>
                            <input type="date" name="date" class="w-full border rounded-lg p-2" required>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md">Simpan</button>
                        <a href="{{ route('product_logs.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
