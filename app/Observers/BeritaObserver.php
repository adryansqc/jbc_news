<?php

namespace App\Observers;

use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use DOMDocument;

class BeritaObserver
{
    /**
     * Handle the Berita "created" event.
     */
    public function created(Berita $berita): void
    {
        //
    }

    /**
     * Handle the Berita "updated" event.
     */
    public function updated(Berita $berita): void
    {
        if ($berita->wasChanged('content')) {
            $oldImages = $this->extractImagesFromContent($berita->getOriginal('content'));
            $newImages = $this->extractImagesFromContent($berita->content);
            
            $imagesToDelete = array_diff($oldImages, $newImages);
            
            foreach ($imagesToDelete as $image) {
                Storage::disk('public')->delete($image);
            }
        }
    }

    /**
     * Handle the Berita "deleted" event.
     */
    public function deleted(Berita $berita): void
    {
        // Delete main image
        if ($berita->image) {
            Storage::disk('public')->delete($berita->image);
        }

        // Delete content images
        $images = $this->extractImagesFromContent($berita->content);
        foreach ($images as $image) {
            Storage::disk('public')->delete($image);
        }
    }

    /**
     * Handle the Berita "restored" event.
     */
    public function restored(Berita $berita): void
    {
        //
    }

    /**
     * Handle the Berita "force deleted" event.
     */
    public function forceDeleted(Berita $berita): void
    {
        $this->deleted($berita);
    }

    /**
     * Extract images from content
     */
    private function extractImagesFromContent(?string $content): array
    {
        $images = [];
        
        if (empty($content)) {
            return $images;
        }

        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $imgTags = $dom->getElementsByTagName('img');
        
        foreach ($imgTags as $img) {
            $src = $img->getAttribute('src');
            if (str_starts_with($src, '/storage/content/')) {
                $images[] = str_replace('/storage/', '', $src);
            }
        }

        return $images;
    }
}
