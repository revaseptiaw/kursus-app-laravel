<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard Admin</h2>
    </x-slot>

    <div class="py-6 px-6 bg-gray-100 space-y-6">
        {{-- Statistik Ringkas --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-sm text-gray-500">Jumlah Kursus</h3>
                <p class="text-2xl font-bold text-blue-600">{{ $jumlahKursus }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-sm text-gray-500">Instruktur</h3>
                <p class="text-2xl font-bold text-green-600">{{ $jumlahInstruktur }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-sm text-gray-500">Peserta</h3>
                <p class="text-2xl font-bold text-purple-600">{{ $jumlahPeserta }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <h3 class="text-sm text-gray-500">Materi</h3>
                <p class="text-2xl font-bold text-orange-600">{{ $jumlahMateri }}</p>
            </div>
        </div>

        {{-- Grafik Tren Pendaftaran --}}
        <div class="bg-white p-4 rounded shadow">
    <h3 class="text-lg font-semibold mb-4">Tren Pendaftaran Kursus</h3>
    <canvas id="trenChart" height="100"></canvas>
</div>

        {{-- Kursus Terbaru --}}
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">Kursus Terbaru</h3>
            <ul class="space-y-2">
                @foreach ($kursusTerbaru as $kursus)
                    <li class="border-b pb-2">
                        <strong>{{ $kursus->nama_kursus }}</strong> ({{ $kursus->durasi }} minggu)
                        <span class="text-gray-500 text-sm">• {{ $kursus->created_at->diffForHumans() }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- Chart.js --}}
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('trenChart').getContext('2d');

    const trenChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartLabels), // contoh: ['Jan', 'Feb', 'Mar']
            datasets: [{
                label: 'Pendaftaran',
                data: @json($chartData), // contoh: [5, 12, 8]
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
</script>

    @endpush
</x-app-layout>

