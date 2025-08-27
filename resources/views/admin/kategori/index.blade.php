@extends('layout.app')
@section('title', 'Data Barang')
@section('content')
    <div x-data='{
    openModal: false,
    kategori: {!! $kategori->toJson() !!}
}'>
        <div>
            <div class="bg-white border border-gray-200  rounded-xl overflow-hidden">
                <div class="p-8 flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-bold mb-2">Kategori</h1>
                        <p class="text-gray-600">Kelola data kategori barang di sini.</p>
                    </div>
                    <button @click="openModal = true"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg focus:outline-none hover:bg-blue-700">
                        Tambah Kategori
                    </button>
                </div>

                <!-- Tabel -->
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr>
                            <th class="border px-2 py-1">No</th>
                            <th class="border px-2 py-1">Nama Kategori</th>
                            <th class="border px-2 py-1">Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(item, index) in kategori" :key="item.id_kategori">
                            <tr>
                                <td class="border px-2 py-1" x-text="index + 1"></td>
                                <td class="border px-2 py-1" x-text="item.nama_kategori"></td>
                                <td class="border px-2 py-1"
                                    x-text="new Date(item.created_at).toLocaleString('id-ID', { timeZone: 'Asia/Jakarta' })">
                                </td>

                                <td class="border px-2 py-1 space-x-2">
                                    <button class="px-2 py-1 bg-blue-600 text-white rounded hover:bg-blue-700"
                                        @click="editKategori(item)">
                                        Edit
                                    </button>
                                    <button class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700"
                                        @click="deleteKategori(item)">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Modal -->
        <div x-show="openModal" x-transition:enter="transform transition ease-out duration-300"
            x-transition:enter-start="translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transform transition ease-in duration-300"
            x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-full opacity-0"
            class="fixed inset-0 flex items-end justify-end p-4 z-50" x-cloak>

            <div class="bg-white w-96 rounded-t-xl shadow-lg border border-gray-200 p-8" @click.away="openModal = false">
                <form method="POST" action="{{ route('kategori.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_kategori" class="block text-sm font-medium text-gray-600 mb-3">Nama
                            Kategori</label>
                        <input type="text" id="nama_kategori" name="nama_kategori" required
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                    <div class="flex justify-end space-x-2 mt-6">
                        <button type="button" @click="openModal = false"
                            class="px-3 py-1 rounded-md border border-gray-300 text-gray-600 hover:bg-gray-100">
                            Batal
                        </button>
                        <button type="submit" class="px-3 py-1 rounded-md  bg-blue-600 text-white hover:bg-blue-700">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>



@endsection
