<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Berita;
use App\Observers\BeritaObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Berita::observe(BeritaObserver::class);
    }
}
