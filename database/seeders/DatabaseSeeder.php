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

        Anime::create([
            'title' => 'The Apothecary Diaries',
            'episodes' => 24,
            'studio' => 'OLM',
            'description' => 'Maomao, an apothecary\'s daughter, has been plucked from her peaceful life and sold
            to the lowest echelons of the imperial court. Now merely a maid, Maomao settles into her new mundane
            life and hides her extensive knowledge of medicine in order to avoid any unwanted attention.

            Not long after Maomao\'s arrival, the emperor\'s infant children inexplicably begin to experience grave
            symptoms—almost as if a curse has been cast. The curious Maomao easily solves the mystery and, to remain
            out of the limelight, attempts to leave an anonymous tip. Unfortunately, the dashing and perceptive eunuch
            Jinshi sees through it and manages to single her out.

            In recognition of her talent, Maomao is promoted to lady-in-waiting for the emperor\'s favorite concubine,
            Gyokuyou. As Maomao continues to remedy the numerous ailments afflicting the imperial court, her pharmaceutical
            expertise quickly proves indispensable.',
            'image' => 'https://cdn.myanimelist.net/images/anime/1708/138033l.jpg',
            'start_aired_date' => '2023-10-22',
            'end_aired_date' => '2024-03-24'
        ]);

        Anime::create([
            'title' => 'Undead Unluck',
            'episodes' => '24',
            'studio' => 'David Production',
            'description' => 'ith the conclusion of her favorite romance manga, Fuuko Izumo is ready to end her life
            of misery and loneliness having long accepted her fate of never being able to experience passionate love
            like fictional characters. Cursed with "unluck," anyone Fuuko touches is in grave danger of experiencing
            unimaginable calamity.

            While the possibility of imminent danger would have most sane people run in the opposite direction,
            Undead has other ideas. He is an immortal being with superhuman regenerative powers desperately seeking death,
            which has always eluded him. When their paths finally cross, Undead sees an opportunity to finally end his suffering
            by using Fuuko\'s unluck.

            But before Undead can unlock the full potential of Fuuko\'s power to trigger the final devastating blow,
            the duo must first fend off a murderous secret organization hell-bent on exterminating those with special abilities.',
            'image' => 'https://cdn.myanimelist.net/images/anime/1136/138410l.jpg',
            'start_aired_date' => '2023-10-7',
            'end_aired_date' => '2024-03-23'
        ]);


//      php artisan db:seed
        $frierenAnime = Anime::where('id', 1)->first();
        $genresIds1 = Genre::whereIn('id', [2, 5, 6])->pluck('id');

        $frierenAnime->genres()->attach($genresIds1);

        $maomaoAnime = Anime::where('id', 2)->first();
        $genresIds2 = Genre::whereIn('id', [5, 8])->pluck('id');

        $maomaoAnime->genres()->attach($genresIds2);

        $fuukoAnime = Anime::where('id', 3)->first();
        $genresIds3 = Genre::whereIn('id', [1, 4, 6])->pluck('id');

        $fuukoAnime->genres()->attach($genresIds3);
    }
}
