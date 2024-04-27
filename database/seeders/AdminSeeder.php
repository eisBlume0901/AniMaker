<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $claireAdmin = User::create([
            'name' => 'Claire Ethereal',
            'email' => 'claire@animaker.com',
            'password' => bcrypt('claireLovesAnime09'),
            'email_verified_at' => now(),
        ]);
        $claireAdmin->assignRole('admin');

        $ishmaelAdmin = User::create([
            'name' => 'Ishmael',
            'email' => 'ishmael@animaker.com',
            'password' => bcrypt('iLoveIshmael_07'),
            'email_verified_at' => now(),
        ]);
        $ishmaelAdmin->assignRole('admin');
    }
}
