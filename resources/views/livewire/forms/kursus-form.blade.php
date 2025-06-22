<!-- resources/views/livewire/forms/kursus-form.blade.php -->

<div class="space-y-4">
    <!-- Nama Kursus -->
    <div>
        <label for="nama_kursus" class="block text-sm font-medium text-gray-700">Nama Kursus</label>
        <input type="text" wire:model.defer="form.nama_kursus" id="nama_kursus"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm">
        @error('form.nama_kursus') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Durasi -->
    <div>
        <label for="durasi" class="block text-sm font-medium text-gray-700">Durasi</label>
        <input type="text" wire:model.defer="form.durasi" id="durasi"
               placeholder="Contoh: 10 Jam / 3 Bulan"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm">
        @error('form.durasi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Biaya -->
    <div>
        <label for="biaya" class="block text-sm font-medium text-gray-700">Biaya</label>
        <input type="number" wire:model.defer="form.biaya" id="biaya"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm">
        @error('form.biaya') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Instruktur -->
    <div>
        <label for="instruktur_id" class="block text-sm font-medium text-gray-700">Instruktur</label>
        <select wire:model.defer="form.instruktur_id" id="instruktur_id"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm sm:text-sm">
            <option value="">-- Pilih Instruktur --</option>
            @foreach($instrukturs as $instruktur)
                <option value="{{ $instruktur->id }}">{{ $instruktur->nama }}</option>
            @endforeach
        </select>
        @error('form.instruktur_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
</div>
