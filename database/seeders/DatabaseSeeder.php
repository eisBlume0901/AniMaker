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
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);

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
            'title' => "Frieren Beyond Journey's End",
            'episodes' => 28,
            'studio' => 'Madhouse',
            'description' => "During their decade-long quest to defeat the Demon King, the members of the hero\'s
                party—Himmel himself, the priest Heiter, the dwarf warrior Eisen, and the elven mage
                Frieren—forge bonds through adventures and battles, creating unforgettable precious
                memories for most of them.  However, the time that Frieren spends with her comrades
                is equivalent to merely a fraction of her life, which has lasted over a thousand years.
                When the party disbands after their victory, Frieren casually returns to her \"usual\" routine
                of collecting spells across the continent. Due to her different sense of time, she seemingly
                holds no strong feelings toward the experiences she went through.

                As the years pass, Frieren gradually realizes how her days in the hero's party truly impacted
                her. Witnessing the deaths of two of her former companions, Frieren begins to regret having taken
                their presence for granted; she vows to better understand humans and create real personal connections.
                Although the story of that once memorable journey has long ended, a new tale is about to begin.",
            'start_aired_date' => '2023-09-23',
            'end_aired_date' => '2023-03-22'
        ]);

        Anime::create([
            'title' => 'The Apothecary Diaries',
            'episodes' => 24,
            'studio' => 'OLM',
            'description' => "Maomao, an apothecary's daughter, has been plucked from her peaceful life and sold
            to the lowest echelons of the imperial court. Now merely a maid, Maomao settles into her new mundane
            life and hides her extensive knowledge of medicine in order to avoid any unwanted attention.

            Not long after Maomao's arrival, the emperor's infant children inexplicably begin to experience grave
            symptoms—almost as if a curse has been cast. The curious Maomao easily solves the mystery and, to remain
            out of the limelight, attempts to leave an anonymous tip. Unfortunately, the dashing and perceptive eunuch
            Jinshi sees through it and manages to single her out.

            In recognition of her talent, Maomao is promoted to lady-in-waiting for the emperor's favorite concubine,
            Gyokuyou. As Maomao continues to remedy the numerous ailments afflicting the imperial court, her pharmaceutical
            expertise quickly proves indispensable.",
            'start_aired_date' => '2023-10-22',
            'end_aired_date' => '2024-03-24'
        ]);

        Anime::create([
            'title' => 'Undead Unluck',
            'episodes' => '24',
            'studio' => 'David Production',
            'description' => "With the conclusion of her favorite romance manga, Fuuko Izumo is ready to end her life
            of misery and loneliness having long accepted her fate of never being able to experience passionate love
            like fictional characters. Cursed with \"unluck,\" anyone Fuuko touches is in grave danger of experiencing
            unimaginable calamity.

            While the possibility of imminent danger would have most sane people run in the opposite direction,
            Undead has other ideas. He is an immortal being with superhuman regenerative powers desperately seeking death,
            which has always eluded him. When their paths finally cross, Undead sees an opportunity to finally end his suffering
            by using Fuuko's unluck.

            But before Undead can unlock the full potential of Fuuko\'s power to trigger the final devastating blow,
            the duo must first fend off a murderous secret organization hell-bent on exterminating those with special abilities.",
            'start_aired_date' => '2023-10-7',
            'end_aired_date' => '2024-03-23'
        ]);

        Anime::create([
            'title' => '7th Time Loop: The Villainess Enjoys a Carefree Life Married to Her Worst Enemy!',
            'episodes' => 12,
            'studio' => 'Studio Kai',
            'description' => "Rishe Irmgard Weitzner finds herself in a familiar situation: her fiancé is publicly breaking
            off their engagement, and her ducal family is about to disown her in shame. However, Rishe is not distraught;
            she has already had six chances to rebuild her life and chase a different passion each time. But she would always
            get swept up in a war and die, so now she wishes for her seventh reincarnation to be easygoing and uneventful.

            What Rishe does not take into account is the presence of Arnold Hein, the crown prince of the Galkhein Kingdom. He is
            destined to usurp the throne and become a tyrant who starts a large-scale invasion of neighboring countries. To make their
            encounter worse, Arnold is the one who killed Rishe in her previous life. That is why it is all the more shocking when he proposes
            to Rishe on the spot. In pursuit of her desired life, Rishe must consider accepting Arnold's proposal and discover the reasons
            behind his brutal actions to stop the war from ever happening.",
            'start_aired_date' => '2024-01-07',
            'end_aired_date' => '2024-03-24'
        ]);

        Anime::create([
            'title' => 'A Sign of Affection',
            'episodes' => 12,
            'studio' => 'Ajia-do',
            'description' => "For hearing-impaired university student Yuki Itose, silence has been a natural part of life since birth.
            Her world is small and isolated; she commutes to campus, interacts with her best friend Rin Fujishiro, and communicates through
            writing and text messages—a lifestyle that offers little to no change. One day, during her commute, Yuki meets fellow student
            Itsuomi Nagi, a multilingual travel enthusiast and friend of Rin. When Itsuomi learns of Yuki's condition, he takes it in stride,
            moving Yuki's heart. From this one simple gesture, Yuki and Itsuomi's lives start changing day by day as they let each other into their
            own worlds.",
            'start_aired_date' => '2024-01-06',
            'end_aired_date' => '2024-03-23'
        ]);

        Anime::create([
            'title' => 'Sasaki and Peeps',
            'episodes' => 12,
            'studio' => 'SILVER LINK',
            'description' => "Even though Sasaki's droll corporate life is constantly filled with work, it leaves him tired and
            unfulfilled at the end of every day. In search of some companionship to fill the emptiness in his life, he visits a pet
            shop on a whim, not realizing he's about to change his life forever. After settling on an adorable bird and bringing it
            home...his new roommate reveals that it's actually an incredible sage from another world who promptly bestows Sasaki with
            supernatural powers as well as the ability to cross between worlds. All Sasaki wants to do is use these newfound powers to live
            in peace and comfort, but there are more than a few colorful characters who might get in the way of that...",
            'start_aired_date' => '2024-01-05',
            'end_aired_date' => '2024-03-22'
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

        $risheAnime = Anime::where('id', 4)->first();
        $genresIds4 = Genre::whereIn('id', [6, 9])->pluck('id');

        $risheAnime->genres()->attach($genresIds4);

        $yukiAnime = Anime::where('id', 5)->first();
        $genresIds5 = Genre::whereIn('id', [9])->pluck('id');

        $yukiAnime->genres()->attach($genresIds5);

        $sasakiAnime = Anime::where('id', 6)->first();
        $genresIds6 = Genre::whereIn('id', [2, 4, 6])->pluck('id');

        $sasakiAnime->genres()->attach($genresIds6);

        Anime::create([
            'title' => 'Hyouka',
            'episodes' => 22,
            'studio' => 'Kyoto Animation',
            'description' => "High school freshman Houtarou Oreki has but one goal: to lead a gray life while conserving
            as much energy as he can. Unfortunately, his peaceful days come to an end when his older sister, Tomoe, forces
            him to save the memberless Classics Club from disbandment. Luckily, Oreki's predicament seems to be over when
            he heads to the clubroom and discovers that his fellow first-year, Eru Chitanda, has already become a member.
            However, despite his obligation being fulfilled, Oreki finds himself entangled by Chitanda's curious and bubbly
            personality, soon joining the club of his own volition. Hyouka follows the four members of the Classics Club—including
            Oreki's friends Satoshi Fukube and Mayaka Ibara—as they, driven by Chitanda's insatiable curiosity, solve the trivial
            yet intriguing mysteries that permeate their daily lives.",
            'start_aired_date' => '2012-04-23',
            'end_aired_date' => '2012-09-17'
        ]);

        $hyoukaAnime = Anime::where('id', 7)->first();
        $genresIds7 = Genre::whereIn('id', [8, 11])->pluck('id');

        $hyoukaAnime->genres()->attach($genresIds7);

        Anime::create([
            'title' => 'Tengen Toppa Gurren Lagann',
            'episodes' => 27,
            'studio' => 'Gainax',
            'description' => "Simon and Kamina were born and raised in a deep, underground village, hidden from the fabled
            surface. Kamina is a free-spirited loose cannon bent on making a name for himself, while Simon is a timid young
            boy with no real aspirations. One day while excavating the earth, Simon stumbles upon a mysterious object that
            turns out to be the ignition key to an ancient artifact of war, which the duo dubs Lagann. Using their new weapon,
            Simon and Kamina fend off a surprise attack from the surface with the help of Yoko Littner, a hot-blooded redhead
            wielding a massive gun who wanders the world above. In the aftermath of the battle, the sky is now in plain view,
            prompting Simon and Kamina to set off on a journey alongside Yoko to explore the wastelands of the surface. Soon,
            they join the fight against the \"Beastmen,\" humanoid creatures that terrorize the remnants of humanity in powerful
            robots called \"Gunmen.\" Although they face some challenges and setbacks, the trio bravely fights these new enemies
            alongside other survivors to reclaim the surface, while slowly unraveling a galaxy-sized mystery.",
            'start_aired_date' => '2007-04-01',
            'end_aired_date' => '2007-09-30',
        ]);

        $gurrenAnime = Anime::where('id', 8)->first();
        $genresIds8 = Genre::whereIn('id', [1, 2, 10])->pluck('id');

        $gurrenAnime->genres()->attach($genresIds8);

        Anime::create([
            'title' => 'Steins;Gate',
            'episodes' => 24,
            'studio' => 'White Fox',
            'description' => "Eccentric scientist Rintarou Okabe has a never-ending thirst for scientific exploration.
            Together with his ditzy but well-meaning friend Mayuri Shiina and his roommate Itaru Hashida, Okabe founds the
            Future Gadget Laboratory in the hopes of creating technological innovations that baffle the human psyche. Despite
            claims of grandeur, the only notable \"gadget\" the trio have created is a microwave that has the mystifying
            power to turn bananas into green goo.

            However, when Okabe attends a conference on time travel, he experiences a series of strange events that lead him
            to believe that there is more to the \"Phone Microwave\" gadget than meets the eye. Apparently able to send text messages
            into the past using the microwave, Okabe dabbles further with the \"time machine,\" attracting the ire and attention of
            the mysterious organization SERN.

            Due to the novel discovery, Okabe and his friends find themselves in an ever-present danger. As he works to
            mitigate the damage his invention has caused to the timeline, Okabe fights a battle to not only save his loved
            ones but also to preserve his degrading sanity.",
            'start_aired_date' => '2011-04-06',
            'end_aired_date' => '2011-09-14'
        ]);

        $steinsAnime = Anime::where('id', 9)->first();
        $genresIds9 = Genre::whereIn('id', [5, 10, 14])->pluck('id');

        $steinsAnime->genres()->attach($genresIds9);

        Anime::create([
            'title' => 'Natsume Yuuchinjou',
            'episodes' => 13,
            'studio' => 'Brain\'s Base',
            'description' => "Due to an unusual ability to see strange creatures called youkai, Takashi Natsume has never fit in.
            Passed around from one foster home to another, he was left isolated and lonely. Over time, he has accepted that no one would
            ever believe him and has closed himself off to his current caretakers and classmates.
            When Natsume accidentally breaks an intangible barrier, he frees Madara—a mighty spirit in the form of a lucky cat.
            Madara notices that Natsume bears a remarkable resemblance to his late grandmother Reiko Natsume, an outcast girl who became
            known across the youkai world for creating the Book of Friends. It is now in Natsume's possession, along with its power to call
            upon the written names of the youkai Reiko had defeated.

            With no interest in its powers, Natsume decides to keep the book for the sake of his grandmother's memories and to protect it
            from scheming youkai. Therefore, he makes a deal with Madara: he will hand him the book once his time is up, and in turn, Madara
            will act as Natsume's unofficial bodyguard, nicknamed Nyanko-sensei. With his newfound goal of freeing those Reiko had sealed,
            Natsume's relationship with both youkai and humans slowly begins to improve.",
            'start_aired_date' => '2008-07-07',
            'end_aired_date' => '2008-09-29'
        ]);

        $natsumeAnime = Anime::where('id', 10)->first();
        $genresIds10 = Genre::whereIn('id', [11, 13])->pluck('id');

        $natsumeAnime->genres()->attach($genresIds10);

        Anime::create([
            'title' => 'Wonder Egg Priority',
            'episodes' => 12,
            'studio' => 'CloverWorks',
            'description' => "Following the suicide of her best and only friend, Koito Nagase, Ai Ooto is left grappling with her new
            reality. With nothing left to live for, she follows the instructions of a mysterious entity and gets roped into purchasing
            an egg, or specifically, a Wonder Egg.
            Upon breaking the egg in a world that materializes during her sleep, Ai is tasked with saving people from the adversities that come their
            way. In doing so, she believes that she has moved one step closer to saving her best friend. With this dangerous yet tempting opportunity
            in the palms of her hands, Ai enters a place where she must recognize the relationship between other people's demons and her own.
            As past trauma, unforgettable regrets, and innate fears hatch in the bizarre world of Wonder Egg Priority, a young girl discovers the different
            inner struggles tormenting humankind and rescues them from their worst fears.",
            'start_aired_date' => '2021-01-13',
            'end_aired_date' => '2021-03-31'
        ]);

        $wonderAnime = Anime::where('id', 11)->first();
        $genresIds11 = Genre::whereIn('id', [5, 6, 14])->pluck('id');

        $wonderAnime->genres()->attach($genresIds11);

        Anime::create([
            'title' => 'Dusk Maiden of Amnesia',
            'episodes' => 12,
            'studio' => 'Silver Link',
            'description' => "Seikyou Private Academy, built on the intrigue of traditional occult myths, bears a dark
            past—for 60 years, it has been haunted by a ghost known as Yuuko, a young woman who mysteriously died in the
            basement of the old school building. With no memory of her life or death, Yuuko discreetly finds and heads
            the Paranormal Investigations Club in search of answers.

            A chance meeting leads Yuuko to cling to diligent freshman Teiichi Niiya, who can see the quirky ghost.
            They quickly grow close, and he decides to help her. Along with Kirie Kanoe, Yuuko's relative, and the oblivious
            second year Momoe Okonogi, they delve deep into the infamous Seven Mysteries of the storied school.",
            'start_aired_date' => '2012-04-09',
            'end_aired_date' => '2012-06-25'
        ]);

        $duskAnime = Anime::where('id', 12)->first();
        $genresIds12 = Genre::whereIn('id', [7, 9, 8])->pluck('id');

        $duskAnime->genres()->attach($genresIds12);

        Anime::create([
            'title' => 'Cyberpunk: Edgerunners',
            'episodes' => 10,
            'studio' => 'Trigger',
            'description' => "Dreams are doomed to die in Night City, a futuristic Californian metropolis. As a teenager
            living in the city's slums, David Martinez is trying to fulfill his mother's lifelong wish for him to reach
            the top of Arasaka, the world's leading security corporation. To this end, he attends the prestigious Arasaka
            Academy while his mother works tirelessly to keep their family afloat.

            When an incident with a street gang leaves David's life in tatters, he stumbles upon Sandevistan cyberware—a
            prosthetic that grants its wearer superhuman speed. Fueled by rage, David implants the device in his back, using
            it to exact revenge on one of his tormentors. This gets him expelled from the academy, shattering his hopes of
            ever making his mother proud.

            After witnessing David's newfound abilities, the beautiful data thief Lucyna \"Lucy\" Kushinada offers to team
            up with him, handing him a ticket to salvation. However, associating with Lucy introduces David to the world of
            Edgerunners—cyborg criminals who will break any law for money. Edgerunners often lose their lives, if the cyberware
            does not break their minds first; but in his fight for survival inside a corrupt system, David is ready to risk it all.",
            'start_aired_date' => '2022-09-13',
            'end_aired_date' => '2022-09-13'
        ]);

        $cyberpunkAnime = Anime::where('id', 13)->first();
        $genresIds13 = Genre::whereIn('id', [1, 10])->pluck('id');

        $cyberpunkAnime->genres()->attach($genresIds13);

        Anime::create([
            'title' => 'Made in Abyss',
            'episodes' => 13,
            'studio' => 'Kinema Citrus',
            'description' => "The Abyss—a gaping chasm stretching down into the depths of the earth, filled with mysterious
            creatures and relics from a time long past. How did it come to be? What lies at the bottom? Countless brave individuals,
            known as Divers, have sought to solve these mysteries of the Abyss, fearlessly descending into its darkest realms. The best
            and bravest of the Divers, the White Whistles, are hailed as legends by those who remain on the surface.

            Riko, daughter of the missing White Whistle Lyza the Annihilator, aspires to become like her mother and explore the furthest reaches
            of the Abyss. However, just a novice Red Whistle herself, she is only permitted to roam its most upper layer. Even so, Riko has a chance
            encounter with a mysterious robot with the appearance of an ordinary young boy. She comes to name him Reg, and he has no recollection of
            the events preceding his discovery. Certain that the technology to create Reg must come from deep within the Abyss, the two decide to venture
            forth into the chasm to recover his memories and see the bottom of the great pit with their own eyes. However, they know not of the harsh
            reality that is the true existence of the Abyss.",
            'start_aired_date' => '2017-07-07',
            'end_aired_date' => '2017-09-29'
        ]);

        $madeAnime = Anime::where('id', 14)->first();
        $genresIds14 = Genre::whereIn('id', [2, 5, 6, 8, 10])->pluck('id');

        $madeAnime->genres()->attach($genresIds14);


        Anime::create([
            'title' => 'The Disastrous Life of Saiki K.',
            'episodes' => 120,
            'studio' => 'J.C. Staff',
            'description' => "To the average person, psychic abilities might seem a blessing; for Kusuo Saiki, however, this could
            not be further from the truth. Gifted with a wide assortment of supernatural abilities ranging from telepathy to x-ray vision,
            he finds this so-called blessing to be nothing but a curse. As all the inconveniences his powers cause constantly pile up, all
            Kusuo aims for is an ordinary, hassle-free life—a life where ignorance is bliss. Unfortunately, the life of a psychic is far
            from quiet. Though Kusuo tries to stay out of the spotlight by keeping his powers a secret from his classmates, he ends up
            inadvertently attracting the attention of many odd characters, such as the empty-headed Riki Nendou and the delusional Shun Kaidou.
            Forced to deal with the craziness of the people around him, Kusuo comes to learn that the ordinary life he has been striving for is a
            lot more difficult to achieve than expected.",
            'start_aired_date' => '2016-07-04',
            'end_aired_date' => '2016-12-26'
        ]);

        $saikiAnime = Anime::where('id', 15)->first();
        $genresIds15 = Genre::whereIn('id', [4, 13])->pluck('id');

        $saikiAnime->genres()->attach($genresIds15);


        Anime::create([
            'title' => 'Mob Psycho 100',
            'episodes' => 12,
            'studio' => 'Bones',
            'description' => "Eighth-grader Shigeo \"Mob\" Kageyama has tapped into his inner wellspring of psychic
            prowess at a young age. But the power quickly proves to be a liability when he realizes the potential danger
            in his skills. Choosing to suppress his power, Mob's only present use for his ability is to impress his longtime
            crush, Tsubomi, who soon grows bored of the same tricks. In order to effectuate control on his skills,
            Mob enlists himself under the wing of Arataka Reigen, a con artist claiming to be a psychic, who exploits
            Mob's powers for pocket change. Now, exorcising evil spirits on command has become a part of Mob's daily,
            monotonous life. However, the psychic energy he exerts is barely the tip of the iceberg; if his vast potential
            and unrestrained emotions run berserk, a cataclysmic event that would render him completely unrecognizable
            will be triggered. The progression toward Mob's explosion is rising and attempting to stop it is futile.
            ",
            'start_aired_date' => '2016-07-11',
            'end_aired_date' => '2016-09-27'
        ]);

        $mobAnime = Anime::where('id', 16)->first();
        $genresIds16 = Genre::whereIn('id', [1, 4, 13])->pluck('id');

        $mobAnime->genres()->attach($genresIds16);

        Anime::create([
            'title' => 'Mob Psycho II',
            'episodes' => 13,
            'studio' => 'Bones',
            'description' => "Shigeo \"Mob\" Kageyama is now maturing and understanding his role as a supernatural psychic
            that has the power to drastically affect the livelihood of others. He and his mentor Reigen Arataka continue
            to deal with supernatural requests from clients, whether it be exorcizing evil spirits or tackling urban legends
            that haunt the citizens.

            While the workflow remains the same, Mob isn't just blindly following Reigen around anymore. With all his
            experiences as a ridiculously strong psychic, Mob's supernatural adventures now have more weight to them.
            Things take on a serious and darker tone as the dangers Mob and Reigen face are much more tangible and
            unsettling than ever before.",
            'start_aired_date' => '2019-01-07',
            'end_aired_date' => '2019-04-01',
        ]);

        $mob2Anime = Anime::where('id', 17)->first();
        $genresIds17 = Genre::whereIn('id', [1, 4, 13])->pluck('id');

        $mob2Anime->genres()->attach($genresIds17);

        Anime::create([
            'title' => 'Violet Evergarden',
            'episodes' => 13,
            'studio' => 'Kyoto Animation',
            'description' => "The Great War finally came to an end after four long years of conflict; fractured in two,
            the continent of Telesis slowly began to flourish once again. Caught up in the bloodshed was Violet Evergarden,
            a young girl raised for the sole purpose of decimating enemy lines. Hospitalized and maimed in a bloody skirmish
            during the War's final leg, she was left with only words from the person she held dearest, but with no understanding
            of their meaning.

            Recovering from her wounds, Violet starts a new life working at CH Postal Services after a falling out with her
            new intended guardian family. There, she witnesses by pure chance the work of an \"Auto Memory Doll,\" amanuenses
            that transcribe people's thoughts and feelings into words on paper. Moved by the notion, Violet begins work as an
            Auto Memory Doll, a trade that will take her on an adventure, one that will reshape the lives of her clients and
            hopefully lead to self-discovery.",
            'start_aired_date' => '2018-01-11',
            'end_aired_date' => '2018-04-05'
        ]);

        $violetAnime = Anime::where('id', 18)->first();
        $genresIds18 = Genre::whereIn('id', [5, 6])->pluck('id');

        $violetAnime->genres()->attach($genresIds18);

        Anime::create([
            'title' => 'Great Pretender',
            'episodes' => 23,
            'studio' => 'Wit Studio',
            'description' => "A series of unfortunate events has led Makoto Edamura to adopt the life of crime—pickpocketing
            and scamming others for a living. However, after swindling a seemingly clueless tourist, Makoto discovers that
            he was the one tricked and, to make matters worse, that the police are now after him.

            While making his escape, he runs into the tourist once again, who turns out to be a fellow con man named Laurent Thierry,
            and ends up following him to Los Angeles. In an attempt to defend his self-proclaimed title of \"Japan\'s Greatest Swindler,
            \" Makoto challenges his rival to determine the better scammer. Accepting the competition, Laurent drops them off outside
            a huge mansion and claims that their target will be the biggest mafia boss on the West Coast.

            As Makoto becomes increasingly involved with the cunning Laurent, his colorful associates, and the world of international high-stakes fraud,
            he soon realizes that he got more than what he bargained for as his self-declared skills are continually put to the test.",
            'start_aired_date' => '2020-07-09',
            'end_aired_date' => '2020-12-17',
        ]);

        $pretenderAnime = Anime::where('id', 19)->first();
        $genresIds19 = Genre::whereIn('id', [1, 2, 8])->pluck('id');

        $pretenderAnime->genres()->attach($genresIds19);

        Anime::create([
            'title' => 'Death Parade',
            'episodes' => 12,
            'studio' => 'Madhouse',
            'description' => "After death, either Heaven or Hell awaits most humans. But for a select few, death brings them to
            Quindecim—a bar where only pairs of people who die at the same time can enter. Attending the bar is an enigmatic figure
            known as Decim, who also acts as the arbiter. He passes judgment on those who wind up at Quindecim by challenging them
            to a life-threatening game. These games determine if the patron's soul will reincarnate into a new life, or be sent into
            the void, never to be seen again. From darts and bowling to fighting games, the true nature of each patron slowly comes to
            light as they wager their souls. Though his methods remain unchanged, the sudden appearance of a black-haired amnesiac causes
            Decim to reevaluate his own rulings.",
            'start_aired_date' => '2015-01-10',
            'end_aired_date' => '2015-03-28'
        ]);

        $deathAnime = Anime::where('id', 20)->first();
        $genresIds20 = Genre::whereIn('id', [5, 13, 14])->pluck('id');

        $deathAnime->genres()->attach($genresIds20);


        Anime::create([
            'title' => 'Psycho Pass',
            'episodes' => 22,
            'studio' => 'Production I.G',
            'description' => "Justice, and the enforcement of it, has changed. In the 22nd century, Japan enforces the Sibyl System, an objective means of determining the threat level of each citizen by examining their mental state for signs of criminal intent, known as their Psycho-Pass. Inspectors uphold the law by subjugating, often with lethal force, anyone harboring the slightest ill-will; alongside them are Enforcers, jaded Inspectors that have become latent criminals, granted relative freedom in exchange for carrying out the Inspectors' dirty work.

Into this world steps Akane Tsunemori, a young woman with an honest desire to uphold justice. However, as she works alongside veteran Enforcer Shinya Kougami, she soon learns that the Sibyl System's judgments are not as perfect as her fellow Inspectors assume. With everything she has known turned on its head, Akane wrestles with the question of what justice truly is, and whether it can be upheld through the use of a system that may already be corrupt.",
            'start_aired_date' => '2012-10-12',
            'end_aired_date' => '2013-03-22'
        ]);

        $psychoAnime = Anime::where('id', 21)->first();
        $genresIds21 = Genre::whereIn('id', [1, 8, 10, 14])->pluck('id');

        $psychoAnime->genres()->attach($genresIds21);
    }
}
