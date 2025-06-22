<div class="p-6 bg-white min-h-screen">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-700">Manajemen Materi</h2>
        <a href="{{ route('materi.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Tambah Materi
        </a>
    </div>
    
    @if (session()->has('message'))
    <div 
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 3000)"
        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 transition-opacity duration-500"
        role="alert">
        <span class="block sm:inline">{{ session('message') }}</span>
    </div>
@endif


    <div class="shadow border border-gray-200 rounded-lg overflow-x-auto">
        <table class="min-w-full bg-white text-sm text-gray-700 border">
    <thead class="bg-gray-200 text-gray-600 uppercase text-xs">
        <tr>
            <th class="px-5 py-3 border">Judul</th>
            <th class="px-5 py-3 border">Kursus</th>
            <th class="px-5 py-3 border">Deskripsi</th>
            <th class="px-5 py-3 border">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($materis as $materi)
            <tr class="hover:bg-gray-50">
                <td class="px-5 py-4 border">{{ $materi->judul }}</td>
                <td class="px-5 py-4 border">{{ $materi->kursus->nama_kursus }}</td>
                <td class="px-5 py-4 border">{{ $materi->deskripsi }}</td>
                <td class="px-5 py-4 border">
                    <div class="flex gap-2">
                        {{-- Tombol Edit --}}
                        <a href="{{ route('materi.edit', $materi->id) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">
                            Edit
                        </a>

                        {{-- Tombol Hapus --}}
                        <button wire:click="delete({{ $materi->id }})"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
                            Hapus
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    </div>

    @if (method_exists($materis, 'links'))
        <div class="mt-4">
            {{ $materis->links() }}
        </div>
    @endif
</div>
