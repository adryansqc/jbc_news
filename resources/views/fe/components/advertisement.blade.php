@php
    $ads = \App\Models\Iklan::where('status', true)->orderBy('id', 'desc')->take(1)->get();
@endphp
<div class="section-title mb-0">
    <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
</div>
<div class="bg-white text-center border border-top-0 p-3">
    @forelse($ads as $ad)
        <a href=""><img class="img-fluid" src="{{ asset('storage/' . $ad->gambar) }}" alt="Advertisement" style="width: 500px; height: 300px;"></a>
    @empty
        <p class="text-muted m-0">Belum ada iklan</p>
    @endforelse
</div>