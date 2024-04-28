<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $frierenUser = User::create([
            'name' => 'frieren1019',
            'email' => 'frieren@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('frieren1019'),
        ]);
        $frierenUser->assignRole('user');
        Permission::create(['name' => 'manage user animes']);
        $frierenUser->givePermissionTo('manage user animes');


        User::factory()->count(10)->create()->each(function ($user) {
            $user->assignRole('user');
            $user->givePermissionTo('manage user animes');
        });
    }
}
