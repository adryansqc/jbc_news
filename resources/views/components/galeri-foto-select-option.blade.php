@props(['option'])

<div class="flex items-center gap-2 p-2">
    <img 
        src="{{ Storage::disk('public')->url($option) }}" 
        alt="{{ basename($option) }}"
        class="w-16 h-16 object-cover rounded"
    />
    <span class="text-sm">{{ basename($option) }}</span>
</div>