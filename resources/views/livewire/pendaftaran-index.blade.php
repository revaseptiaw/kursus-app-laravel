<div class="bg-gray-50 py-8 px-6 rounded-lg shadow-md">
    <div class="container mx-auto">
        <!-- Header & Tombol -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Manajemen Pendaftaran</h2>
            <button wire:click="newPendaftaran"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded shadow">
                Tambah Pendaftaran
            </button>
        </div>

        <!-- Flash Message -->
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

        <!-- Tabel Pendaftaran -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white text-sm text-left text-gray-700 rounded shadow">
                <thead class="bg-gray-200 text-gray-800 uppercase text-xs font-bold">
                    <tr>
                        <th class="px-6 py-3 border-b">Nama Peserta</th>
                        <th class="px-6 py-3 border-b">Email</th>
                        <th class="px-6 py-3 border-b">Kursus</th>
                        <th class="px-6 py-3 border-b">Status</th>
                        <th class="px-6 py-3 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendaftarans as $pendaftaran)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-3 border-b">{{ $pendaftaran->peserta->nama }}</td>
                            <td class="px-6 py-3 border-b">{{ $pendaftaran->peserta->email }}</td>
                            <td class="px-6 py-3 border-b">{{ $pendaftaran->kursus->nama_kursus }}</td>
                            <td class="px-6 py-3 border-b">
                                <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ ucfirst($pendaftaran->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-3 border-b text-center space-x-2">
                                <button wire:click="edit({{ $pendaftaran->id }})"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                    Edit
                                </button>
                                <button wire:click="delete({{ $pendaftaran->id }})"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center px-6 py-4 text-gray-500">Belum ada data pendaftaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $pendaftarans->links() }}
        </div>
    </div>

    <!-- Modal Form -->
    @if($showModal)
        <div class="fixed z-50 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-black bg-opacity-50"></div>
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all w-full max-w-lg z-50">
                    <form wire:submit.prevent="save">
                        <div class="px-6 py-4">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Form Pendaftaran Peserta</h2>
                            @include('livewire.forms.pendaftaran-form')
                        </div>
                        <div class="bg-gray-100 px-6 py-3 flex justify-end">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mr-2">Simpan</button>
                            <button type="button" wire:click="$set('showModal', false)"
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
