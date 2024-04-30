<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_user_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('anime_id')->constrained('table_animes');
            $table->decimal('rating')->nullable();
            $table->text('review')->nullable()->unique();
            $table->enum('watchStatus', ['Currently Watching', 'Completed', 'On-Hold', 'Dropped', 'Plan to Watch', 'Rewatched'])->nullable();
            $table->enum('reviewStatus', ['Recommended', 'Not recommended', 'Mixed Feelings'])->nullable();
            $table->integer('progress')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_user_reviews');
    }
};
