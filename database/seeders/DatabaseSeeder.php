<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Anime;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

//        php artisan migrate:refresh --seed

        Genre::create([
            'genre' => 'Action',
        ]);
        Genre::create([
            'genre' => 'Adventure',
        ]);
        Genre::create([
            'genre' => 'Avant Garde',
        ]);
        Genre::create([
            'genre' => 'Comedy',
        ]);
        Genre::create([
            'genre' => 'Drama',
        ]);
        Genre::create([
            'genre' => 'Fantasy',
        ]);
        Genre::create([
            'genre' => 'Horror',
        ]);
        Genre::create([
            'genre' => 'Mystery',
        ]);
        Genre::create([
            'genre' => 'Romance',
        ]);
        Genre::create([
            'genre' => 'Sci-Fi',
        ]);
        Genre::create([
            'genre' => 'Slice of Life',
        ]);
        Genre::create([
            'genre' => 'Sports',
        ]);
        Genre::create([
            'genre' => 'Supernatural',
        ]);
        Genre::create([
            'genre' => 'Suspense',
        ]);

//         php artisan db:seed

        Anime::create([
            'title' => 'Frieren Beyond Journey\'s End',
            'episodes' => 28,
            'studio' => 'Madhouse',
            'description' => 'During their decade-long quest to defeat the Demon King, the members of the hero\'s
                party—Himmel himself, the priest Heiter, the dwarf warrior Eisen, and the elven mage
                Frieren—forge bonds through adventures and battles, creating unforgettable precious
                memories for most of them.  However, the time that Frieren spends with her comrades
                is equivalent to merely a fraction of her life, which has lasted over a thousand years.
                When the party disbands after their victory, Frieren casually returns to her "usual" routine
                of collecting spells across the continent. Due to her different sense of time, she seemingly
                holds no strong feelings toward the experiences she went through.

                As the years pass, Frieren gradually realizes how her days in the hero\'s party truly impacted
                her. Witnessing the deaths of two of her former companions, Frieren begins to regret having taken
                their presence for granted; she vows to better understand humans and create real personal connections.
                Although the story of that once memorable journey has long ended, a new tale is about to begin.',
            'image' => 'https://cdn.myanimelist.net/images/anime/1015/138006l.jpg',
            'start_aired_date' => '2023-09-23',
            'end_aired_date' => '2023-03-22'
        ]);


//      php artisan db:seed
        $frierenAnime = Anime::where('id', 1)->first();
        $genresIds = Genre::whereIn('id', [2, 5, 6])->pluck('id');

        $frierenAnime->genres()->attach($genresIds);
    }
}
