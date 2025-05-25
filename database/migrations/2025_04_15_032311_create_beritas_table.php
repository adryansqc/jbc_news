<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // $table->foreignId('kategori_id')->constrained('categories')->onDelete('cascade');
            $table->string('judul');
            $table->date('tanggal')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('breaking_news')->nullable();
            $table->integer('view')->default(0);
            $table->string('image')->nullable();
            $table->string('ket_image')->nullable();
            $table->text('content')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
