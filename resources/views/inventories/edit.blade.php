<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700">Nama Barang</label>
                            <input type="text" name="name" value="{{ $inventory->name }}" class="w-full border rounded-lg p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Jumlah</label>
                            <input type="number" name="quantity" value="{{ $inventory->quantity }}" class="w-full border rounded-lg p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Satuan</label>
                            <input type="text" name="unit" value="{{ $inventory->unit }}" class="w-full border rounded-lg p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Deadstock</label>
                            <select name="deadstock" class="w-full border rounded-lg p-2">
                                <option value="0" {{ !$inventory->deadstock ? 'selected' : '' }}>Tidak</option>
                                <option value="1" {{ $inventory->deadstock ? 'selected' : '' }}>Ya</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Expired Date</label>
                            <input type="date" name="expired_at" value="{{ $inventory->expired_at }}" class="w-full border rounded-lg p-2">
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update</button>
                        <a href="{{ route('inventories.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
