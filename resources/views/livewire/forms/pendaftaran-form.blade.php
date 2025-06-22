<div>
    {{-- Menampilkan semua error secara global (opsional) --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Nama Peserta --}}
    <div class="mb-4">
        <label for="peserta_nama" class="block text-sm font-medium text-gray-700">Nama Peserta</label>
        <input type="text" id="peserta_nama" wire:model.defer="form.peserta_nama"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"
               placeholder="Masukkan nama peserta">
        @error('form.peserta_nama')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Email Peserta --}}
    <div class="mb-4">
        <label for="peserta_email" class="block text-sm font-medium text-gray-700">Email Peserta</label>
        <input type="email" id="peserta_email" wire:model.defer="form.peserta_email"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"
               placeholder="Masukkan email peserta">
        @error('form.peserta_email')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Pilihan Kursus --}}
    <div class="mb-4">
        <label for="kursus_id" class="block text-sm font-medium text-gray-700">Pilih Kursus</label>
        <select id="kursus_id" wire:model.defer="form.kursus_id"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            <option value="">-- Pilih Kursus --</option>
            @foreach ($kursusList as $kursus)
                <option value="{{ $kursus->id }}">{{ $kursus->nama_kursus }}</option>
            @endforeach
        </select>
        @error('form.kursus_id')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

   {{-- Status (Hanya muncul saat Edit) --}}
@if($form->pendaftaran)
    <div class="mb-4">
        <label for="status" class="block text-sm font-medium text-gray-700">Status Pendaftaran</label>
        <select id="status" wire:model.defer="form.status"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
            <option value="terdaftar">Terdaftar</option>
            <option value="aktif">Aktif</option>
            <option value="selesai">Selesai</option>
        </select>
        @error('form.status')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>
@endif
</div>
