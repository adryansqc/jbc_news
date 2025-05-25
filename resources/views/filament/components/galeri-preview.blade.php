<div class="flex items-center gap-2">
    @if($foto)
        <img 
            src="{{ Storage::disk('public')->url($foto) }}" 
            class="w-16 h-16 object-cover rounded" 
            loading="lazy"
        />
        <span class="text-sm">{{ basename($foto) }}</span>
    @endif
</div>