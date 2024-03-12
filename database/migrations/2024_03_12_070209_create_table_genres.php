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
        Schema::create('table_genres', function (Blueprint $table) {
            $table->id();
            $table->string('genre')->unique();
            $table->timestamps();
        });

        // SQL Equivalent
        // CREATE TABLE table_genres (
        //     id INT AUTO_INCREMENT PRIMARY KEY,
        //     genre VARCHAR(255) UNIQUE,
        //     created_at TIMESTAMP,
        //     updated_at TIMESTAMP
        // );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_genres');
    }
};
