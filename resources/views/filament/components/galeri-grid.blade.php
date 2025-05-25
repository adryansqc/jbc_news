<div class="grid grid-cols-4 gap-4">
    @foreach(\App\Models\GaleriFoto::all() as $foto)
        <div class="relative group">
            <div class="absolute top-2 left-2 z-10">
                <input 
                    type="radio" 
                    name="selected_photo" 
                    value="{{ $foto->foto }}"
                    x-on:change="$wire.set('data.selected_photo', '{{ $foto->foto }}')"
                    class="w-5 h-5 text-primary-600 border-gray-300 rounded focus:ring-primary-500"
                >
            </div>
            <div 
                class="cursor-pointer hover:ring-2 hover:ring-primary-500 rounded-lg overflow-hidden"
                x-on:click="$wire.set('data.selected_photo', '{{ $foto->foto }}')"
            >
                <img 
                    src="{{ Storage::disk('public')->url($foto->foto) }}" 
                    alt="Galeri Foto"
                    class="w-full h-48 object-cover"
                />
            </div>
        </div>
    @endforeach
</div>