<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Media Sosial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('social_medias.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700">Platform</label>
                            <input type="text" name="platform" class="w-full border rounded-lg p-2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">URL</label>
                            <input type="url" name="url" class="w-full border rounded-lg p-2" required>
                        </div>

                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md">Simpan</button>
                        <a href="{{ route('social_medias.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
