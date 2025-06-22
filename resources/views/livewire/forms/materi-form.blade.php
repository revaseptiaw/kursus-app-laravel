<div class="p-6">
    <h2 class="text-xl font-bold mb-4">{{ $materi->id ? 'Edit Materi' : 'Tambah Materi' }}</h2>

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label>Judul:</label>
            <input wire:model="judul" type="text" class="w-full border p-2">
            @error('judul') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Deskripsi:</label>
            <textarea wire:model="deskripsi" class="w-full border p-2"></textarea>
        </div>

        <div>
            <label>Pilih Kursus:</label>
            <select wire:model="kursus_id" class="w-full border p-2">
                <option value="">-- Pilih Kursus --</option>
                @foreach($kursusList as $kursus)
                    <option value="{{ $kursus->id }}">{{ $kursus->nama_kursus }}</option>
                @endforeach
            </select>
            @error('kursus_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>File Materi:</label>
            <input type="file" wire:model="file">
            @error('file') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
