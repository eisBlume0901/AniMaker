<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static create(array $formFields)
 * @method static where(string $string, string $string1, string $string2)
 * @method static latest()
 * @method static find(int $int)
 * @method static first()
 * @method reviews()
 * @method getReviews(mixed $id)
 * @method from(string $string)
 * @method leftJoin(string $string, string $string1, string $string2, string $string3)
 */
class Anime extends Model
{
    use HasFactory;

    protected $table = 'table_animes';
    protected $fillable = [
        'title',
        'episodes',
        'description',
        'studio',
        'image',
        'start_aired_date',
        'end_aired_date'
    ];
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'table_anime_genres', 'anime_id', 'genre_id')->withTimestamps();
        /* belongsToMany means that the relationship is many-to-many.
         * The first argument is the name of the related model.
         * The second argument is the name of the pivot table (the table that is used to store the relationships).
         * The third argument is the foreign key of the model
         * on which you are defining the relationship, while
         * the fourth argument is the foreign key of the model.
         */
    }
    public function scopeFilter($query, $genre): object
    {
        return $query->when($genre, function ($query) use ($genre) {
            // This is a conditional statement provided by Laravel's query builder
            // when checks if the $genre variable is not null
            // if its truthy, it executes the join SQL statement using Laravel query builder

            // SQL query which joins the tables
            return $query->join('table_anime_genres', 'table_animes.id', '=', 'table_anime_genres.anime_id')
                ->join('table_genres', 'table_anime_genres.genre_id', '=', 'table_genres.id')
                ->where('table_genres.genre', $genre);

            // if its falsy, it returns the query as is which is select all from table_animes
        }, function ($query) {
            return $query;
        })->select('table_animes.*');

        /*
         * SQL Equivalent:
         * SELECT table_animes.* FROM table_animes
         * JOIN table_anime_genres ON table_animes.id = table_anime_genres.anime_id
         * JOIN table_genres ON table_anime_genres.genre_id = table_genres.id
         * WHERE table_genres.genre = 'Adventure';
         */
    }

    public function getAnimeReviews($id): object
    {
        return $this->from('table_user_reviews')
            ->when($id, function ($query) use ($id) {
                return $query->where('table_user_reviews.anime_id', $id)
                    ->join('users', 'users.id', '=', 'table_user_reviews.user_id')
                    ->select([
                        'users.name AS user_name',
                        'users.email AS user_email',
                        'users.image AS user_image',
                        'table_user_reviews.rating AS user_rating',
                        'table_user_reviews.reviewStatus AS user_review_status',
                        'table_user_reviews.review AS user_review',
                        'table_user_reviews.progress AS user_progress',
                        'table_user_reviews.watchStatus AS user_watch_status'
                    ]);
            })
            ->get();
    }


    public function topRatedAnimes()
    {
        return $this->leftJoin('table_user_reviews', 'table_animes.id', '=', 'table_user_reviews.anime_id')
            ->leftJoin('table_anime_genres', 'table_animes.id', '=', 'table_anime_genres.anime_id')
            ->leftJoin('table_genres', 'table_anime_genres.genre_id', '=', 'table_genres.id')
            ->select('table_animes.id AS anime_id', 'table_animes.title AS anime_title',
                'table_animes.image AS anime_image',
                'table_animes.episodes AS anime_episodes',
                'table_animes.studio AS anime_studio',
                'table_animes.start_aired_date AS anime_start_aired_date',
                'table_animes.end_aired_date AS anime_end_aired_date')
            ->selectRaw('ROUND(AVG(table_user_reviews.rating), 2) AS average_rating')
            ->selectRaw('COUNT(table_user_reviews.user_id) AS users_count')
            ->selectSub(function ($query) {
                $query->selectRaw('GROUP_CONCAT(table_genres.genre SEPARATOR ", ")')
                    ->from('table_anime_genres')
                    ->join('table_genres', 'table_anime_genres.genre_id', '=', 'table_genres.id')
                    ->whereColumn('table_anime_genres.anime_id', 'table_animes.id');
            }, 'anime_genre')
            ->groupBy('table_animes.id', 'table_animes.title', 'table_animes.image', 'table_animes.episodes',
                'table_animes.studio', 'table_animes.start_aired_date', 'table_animes.end_aired_date')
            ->orderByDesc('average_rating')
            ->orderByDesc('users_count');

        /* SQL Equivalent:
         * SELECT table_animes.id AS anime_id, table_animes.title AS anime_title,
         * table_animes.image AS anime_image, table_animes.episodes AS anime_episodes,
         * table_animes.studio AS anime_studio, table_animes.start_aired_date AS anime_start_aired_date,
         * table_animes.end_aired_date AS anime_end_aired_date,
         * AVG(table_user_reviews.rating) AS average_rating,
         * COUNT(table_user_reviews.id) AS users_count,
         * (SELECT GROUP_CONCAT(table_genres.genre SEPARATOR ", ")
         * FROM table_anime_genres
         * JOIN table_genres ON table_anime_genres.genre_id = table_genres.id
         * WHERE table_anime_genres.anime_id = table_animes.id) AS anime_genre
         * FROM table_animes
         * LEFT JOIN table_user_reviews ON table_animes.id = table_user_reviews.anime_id
         * LEFT JOIN table_anime_genres ON table_animes.id = table_anime_genres.anime_id
         * LEFT JOIN table_genres ON table_anime_genres.genre_id = table_genres.id
         * GROUP BY table_animes.id, table_animes.title, table_animes.image, table_animes.episodes,
         * table_animes.studio, table_animes.start_aired_date, table_animes.end_aired_date
         * ORDER BY average_rating DESC, users_count DESC;
         */
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'table_user_reviews', 'anime_id', 'user_id')->withTimestamps();
    }
}
