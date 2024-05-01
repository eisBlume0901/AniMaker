<?php

namespace Database\Seeders;

use App\Models\Anime;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $anime = Anime::first();

        $user->reviews()->attach($anime->id, [
            'rating' => 9.99,
            'review' => "Out of all Isekais that tackled the genre of Adventure and Fantasy, Frieren Beyond Journey's End stands out because it focuses
            more on character development rather than the usual action-packed scenes. Furthermore, the direction of story telling is not boring and the
            animation is top-notch. I highly recommend this anime to anyone who loves adventure and fantasy because this anime truly captures the mentioned genre
            .",
            'watchStatus' => 'Completed',
            'reviewStatus' => 'Recommended',
            'progress' => 28,
        ]);
    }
}
