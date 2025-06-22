<div class="mb-4">
    <label class="block text-gray-700">Nama</label>
    <input type="text" wire:model.defer="form.nama" class="w-full border rounded px-3 py-2">
    @error('form.nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>

<div class="mb-4">
    <label class="block text-gray-700">Email</label>
    <input type="email" wire:model.defer="form.email" class="w-full border rounded px-3 py-2">
    @error('form.email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>
