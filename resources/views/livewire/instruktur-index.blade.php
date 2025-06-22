<div class="bg-gray-50 min-h-screen py-8">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <!-- Header & Tombol -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold">Manajemen Instruktur</h2>
                <button wire:click="newInstruktur"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded shadow">
                    Tambah Instruktur
                </button>
            </div>

            <!-- Flash Message -->
            @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
            @endif

            <!-- Tabel Instruktur -->
            <div class="overflow-x-auto rounded-lg border">
                <table class="min-w-full text-sm text-left text-gray-700 bg-white">
                    <thead class="bg-gray-100 text-gray-700 font-semibold">
                        <tr>
                            <th class="px-6 py-3 border-b">Nama</th>
                            <th class="px-6 py-3 border-b">Email</th>
                            <th class="px-6 py-3 border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($instrukturs as $instruktur)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3 border-b">{{ $instruktur->nama }}</td>
                                <td class="px-6 py-3 border-b">{{ $instruktur->email }}</td>
                                <td class="px-6 py-3 border-b text-center">
                                    <button wire:click="edit({{ $instruktur->id }})"
                                            class="bg-yellow-400 hover:bg-yellow-500 text-black px-3 py-1 rounded">
                                        Edit
                                    </button>
                                    <button wire:click="delete({{ $instruktur->id }})"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded ml-2">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center px-6 py-4 text-gray-500 bg-white">
                                    Belum ada data instruktur.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $instrukturs->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Form -->
    @if($showModal)
        <div class="fixed z-50 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75"></div>
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all w-full max-w-lg z-50">
                    <form wire:submit.prevent="save">
                        <div class="px-6 py-4">
                            <h2 class="text-lg font-semibold mb-4">{{ $editing ? 'Edit Instruktur' : 'Tambah Instruktur' }}</h2>
                            @include('livewire.forms.instruktur-form')
                        </div>
                        <div class="bg-gray-100 px-6 py-3 flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mr-2">Simpan</button>
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
