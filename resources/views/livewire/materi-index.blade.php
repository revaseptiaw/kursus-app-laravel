<div class="p-6 bg-gray-100 min-h-screen">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Manajemen Materi</h2>
        <a href="{{ route('materi.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Tambah Materi
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-200 text-left">
                <tr>
                    <th class="px-6 py-3">Judul</th>
                    <th class="px-6 py-3">Kursus</th>
                    <th class="px-6 py-3">File</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materis as $materi)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $materi->judul }}</td>
                        <td class="px-6 py-4">{{ $materi->kursus->nama_kursus }}</td>
                        <td class="px-6 py-4">
                            @if ($materi->file_path)
                                <a href="{{ asset('storage/materi/' . $materi->file_path) }}" class="text-blue-600 hover:underline" target="_blank">
                                    Lihat File
                                </a>
                            @else
                                <span class="text-gray-500 italic">Tidak ada file</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('materi.edit', $materi->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                                    Edit
                                </a>
                                <form action="{{ route('materi.destroy', $materi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus materi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
