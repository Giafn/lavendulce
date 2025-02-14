<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700">Nama Produk</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="w-full border rounded-lg p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Harga</label>
                            <input type="number" name="price" value="{{ $product->price }}" class="w-full border rounded-lg p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Deskripsi</label>
                            <textarea name="description" class="w-full border rounded-lg p-2">{{ $product->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Foto Saat Ini</label>
                            @if($product->photo)
                                <img src="{{ asset('storage/' . $product->photo) }}" width="100" class="mb-2">
                            @else
                                <p class="text-gray-500">Tidak ada foto</p>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Kadaluarsa</label>
                            <input type="date" name="expired_at" value="{{ $product->expired_at }}" class="w-full border rounded-lg p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Ganti Foto</label>
                            <input type="file" name="photo" class="w-full border rounded-lg p-2">
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update</button>
                        <a href="{{ route('products.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
