<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class
UserSeeder extends Seeder
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

        User::create([
            'name' => 'Rivrik Irikabol Frolentious',
            'email' => 'Rivrik@Outlook.com',
            'email_verified_at' => now(),
            'password' => bcrypt('RivrikIrikabolFrolentious'),
        ])->assignRole('user');

        User::create([
            'name' => 'yuihirasawa',
            'email' => 'kawaiiyui@cutie.com',
            'email_verified_at' => now(),
            'password' => bcrypt('yuihirasawa'),
        ])->assignRole('user');

        User::create([
            'name' => 'loves_maomao',
            'email' => 'jinshi@palace.com',
            'email_verified_at' => now(),
            'password' => bcrypt('loves_maomao'),
        ])->assignRole('user');

        User::create([
            'name' => 'tsuki_deshita',
            'email' => 'tsukishima@karasuno.haikyuu.com',
            'email_verified_at' => now(),
            'password' => bcrypt('tsuki_deshita'),
        ])->assignRole('user');

        User::create([
            'name' => 'cute_blue_slime',
            'email' => 'rimuru@tempest.com',
            'email_verified_at' => now(),
            'password' => bcrypt('cute_blue_slime'),
        ])->assignRole('user');

        User::create([
            'name' => 'help_mercille',
            'email' => 'marcille@touden.party.com',
            'email_verified_at' => now(),
            'password' => bcrypt('help_mercille'),
        ])->assignRole('user');

        User::create([
            'name' => 'grandma_frieren',
            'email' => 'frieren@hero.com',
            'email_verified_at' => now(),
            'password' => bcrypt('grandma_frieren'),
        ])->assignRole('user');

        User::create([
            'name' => 'makise_kurisu',
            'email' => 'kurisu@cern.com',
            'email_verified_at' => now(),
            'password' => bcrypt('makise_kurisu'),
        ])->assignRole('user');
    }
}
