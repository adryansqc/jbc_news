<div class="rounded-lg overflow-hidden border border-gray-300">
    <div class="relative aspect-video">
        <img
            src="{{ Storage::disk('public')->url($image) }}"
            alt="Preview Foto"
            class="absolute inset-0 w-full h-full object-cover"
        />
    </div>
</div>