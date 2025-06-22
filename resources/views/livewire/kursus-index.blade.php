<div class="bg-gray-100 min-h-screen py-6">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="bg-white rounded-lg shadow p-6">
            <!-- Header & Tombol -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-700">Manajemen Kursus Bahasa Asing</h2>
                <button wire:click="newKursus"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
                    Tambah Kursus
                </button>
            </div>

            <!-- Notifikasi -->
            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
            @endif

            <!-- Tabel -->
            <div class="overflow-x-auto rounded">
                <table class="min-w-full bg-white text-sm text-gray-700 border">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-5 py-3 border">Nama Kursus</th>
                            <th class="px-5 py-3 border">Instruktur</th>
                            <th class="px-5 py-3 border">Durasi</th>
                            <th class="px-5 py-3 border">Biaya</th>
                            <th class="px-5 py-3 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($kursusList as $kursus)
                            <tr class="hover:bg-gray-50">
                                <td class="px-5 py-4 border">{{ $kursus->nama_kursus }}</td>
                                <td class="px-5 py-4 border">{{ $kursus->instruktur->nama }}</td>
                                <td class="px-5 py-4 border">{{ $kursus->durasi }}</td>
                                <td class="px-5 py-4 border">Rp {{ number_format($kursus->biaya, 0, ',', '.') }}</td>
                                <td class="px-5 py-4 border">
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('kursus.materi', $kursus->id) }}"
                                           class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-xs">
                                            Kelola Materi
                                        </a>
                                        <button wire:click="edit({{ $kursus->id }})"
                                                class="bg-yellow-400 hover:bg-yellow-500 text-black px-3 py-1 rounded text-xs">
                                            Edit
                                        </button>
                                        <button wire:click="delete({{ $kursus->id }})"
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-gray-500 italic">
                                    Data Kursus Kosong.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $kursusList->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Tambah/Edit -->
    @if($showModal)
        <div class="fixed z-50 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-black opacity-40"></div>

                <div class="bg-white rounded-lg shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50">
                    <form wire:submit.prevent="save">
                        <div class="px-6 py-4">
                            <h2 class="text-lg font-semibold text-gray-700 mb-4">
                                {{ $editing ? 'Edit Kursus' : 'Tambah Kursus' }}
                            </h2>
                            @include('livewire.forms.kursus-form')
                        </div>
                        <div class="bg-gray-100 px-6 py-3 flex justify-end gap-2">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                                Simpan
                            </button>
                            <button type="button" wire:click="$set('showModal', false)" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
