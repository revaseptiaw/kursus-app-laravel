<div class="p-6">
    <h2 class="text-xl font-bold mb-4">Upload Materi untuk: {{ $kursus->nama_kursus }}</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="upload" enctype="multipart/form-data" class="space-y-4 mb-6">
    <input wire:model="judul" type="text" placeholder="Judul" class="w-full border p-2">
    @error('judul') <div class="text-red-500">{{ $message }}</div> @enderror

    <textarea wire:model="deskripsi" placeholder="Deskripsi" class="w-full border p-2"></textarea>
    @error('deskripsi') <div class="text-red-500">{{ $message }}</div> @enderror

    <input type="file" wire:model="file" name="file" id="file" class="w-full border p-2">
    @error('file') <div class="text-red-500">{{ $message }}</div> @enderror

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Upload</button>
</form>


    <h3 class="text-lg font-semibold mb-2">Daftar Materi</h3>
    <ul>
        @foreach($materis as $materi)
            <li class="mb-2">
                {{ $materi->judul }} - 
                <a href="{{ asset('storage/' . $materi->file_path) }}" class="text-blue-500" target="_blank">Lihat</a>
            </li>
        @endforeach
    </ul>
</div>

