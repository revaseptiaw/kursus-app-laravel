<!-- resources/views/livewire/laporan-peserta.blade.php -->
<div class="bg-gray-50 min-h-screen py-8">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Laporan Jumlah Peserta per Kursus</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-gray-700 font-semibold">
                        <tr>
                            <th class="px-6 py-3 border-b">Nama Kursus</th>
                            <th class="px-6 py-3 border-b">Instruktur</th>
                            <th class="px-6 py-3 border-b">Jumlah Peserta Terdaftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($laporanKursus as $kursus)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3 border-b bg-white">{{ $kursus->nama_kursus }}</td>
                                <td class="px-6 py-3 border-b bg-white">{{ $kursus->instruktur->nama }}</td>
                                <td class="px-6 py-3 border-b bg-white font-bold">{{ $kursus->pendaftaran_count }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center px-6 py-4 text-gray-500 bg-white">Data tidak ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
