<div class="p-6">
    <h2 class="text-xl font-bold mb-4">{{ $materi ? 'Edit Materi' : 'Tambah Materi' }}</h2>
    <form wire:submit.prevent="save" enctype="multipart/form-data">
        <div class="mb-4">
            <label class="block">Judul</label>
            <input type="text" wire:model="judul" class="w-full border rounded p-2" />
            @error('judul') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Deskripsi</label>
            <textarea wire:model="deskripsi" class="w-full border rounded p-2"></textarea>
        </div>

        <div class="mb-4">
            <label class="block">Kursus</label>
            <select wire:model="kursus_id" class="w-full border rounded p-2">
                <option value="">-- Pilih Kursus --</option>
                @foreach($kursusList as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kursus }}</option>
                @endforeach
            </select>
            @error('kursus_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block">File Materi</label>
            <input type="file" wire:model="file" class="w-full" />
            @if($materi && $materi->file_path)
                <p class="text-sm mt-2">File lama: <a href="{{ asset('storage/' . $materi->file_path) }}" target="_blank" class="text-blue-500">Lihat</a></p>
            @endif
            @error('file') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
