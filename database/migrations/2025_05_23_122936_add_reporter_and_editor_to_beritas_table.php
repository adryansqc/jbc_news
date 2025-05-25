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
        Schema::table('beritas', function (Blueprint $table) {
            $table->foreignId('reporter_id')->nullable()->constrained('reporters')->onDelete('cascade');
            $table->foreignId('editor_id')->nullable()->constrained('editors')->onDelete('cascade');
            $table->boolean('heading')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beritas', function (Blueprint $table) {
            $table->dropForeign(['reporter_id']);
            $table->dropForeign(['editor_id']);
            $table->dropColumn(['reporter_id', 'editor_id', 'heading']);
        });
    }
};
