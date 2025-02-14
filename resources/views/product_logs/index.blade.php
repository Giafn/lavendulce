<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Stok') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('product_logs.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">Masuk/Keluar Barang</a>

                    @if(session('success'))
                        <div class="mt-4 p-3 bg-green-100 text-green-800 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="w-full mt-4 border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2">Produk</th>
                                <th class="border p-2">Tipe</th>
                                <th class="border p-2">Jumlah</th>
                                <th class="border p-2">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $log)
                            <tr>
                                <td class="border p-2">{{ $log->product->name }}</td>
                                <td class="border p-2">
                                    <span class="bg-{{ $log->type == 'in' ? 'green' : 'red' }}-500 text-white rounded-md px-2 py-1">
                                    {{ $log->type == 'in' ? 'Barang Masuk' : 'Barang Keluar' }}
                                    </span>
                                </td>
                                <td class="border p-2">{{ $log->quantity }}</td>
                                <td class="border p-2">{{ $log->date }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
