<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informasi Kontak') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-md">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($contact)
                    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700">Nomor Telepon</label>
                            <input type="text" name="phone" value="{{ $contact->phone }}" class="w-full border rounded-lg p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Email</label>
                            <input type="email" name="email" value="{{ $contact->email }}" class="w-full border rounded-lg p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Alamat</label>
                            <textarea name="address" class="w-full border rounded-lg p-2" required>{{ $contact->address }}</textarea>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update</button>
                    </form>
                    @else
                    <p class="text-gray-500">Belum ada data kontak.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


