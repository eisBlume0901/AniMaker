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
        Schema::create('table_animes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('episodes');
            $table->string('studio');
            $table->text('description');
            $table->string('image');
            $table->date('start_aired_date');
            $table->date('end_aired_date');
            $table->timestamps();
        });

        // SQL Equivalent
        // CREATE TABLE table_animes (
        //     id INT AUTO_INCREMENT PRIMARY KEY,
        //     title VARCHAR(255),
        //     episodes INT,
        //     studio VARCHAR(255),
        //     description TEXT,
        //     image VARCHAR(255),
        //     start_aired_date DATE,
        //     end_aired_date DATE,
        //     created_at TIMESTAMP,
        //     updated_at TIMESTAMP
        // );


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_animes');
    }
};
