<div class="flex items-center gap-2">
    <img src="{{ Storage::disk('public')->url($foto) }}" class="w-10 h-10 object-cover rounded" />
    <span>{{ basename($foto) }}</span>
</div>