<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $formFields)
 * @method static find($id)
 * @method static findOrFail($id)
 * @method SpecificAnimeFilter(mixed $anime_id, $id)
 */
class Review extends Model
{
    use HasFactory;

    protected $table = 'table_user_reviews';

    protected $fillable = [
        'user_id',
        'anime_id',
        'rating',
        'review',
        'watchStatus',
        'reviewStatus',
        'progress'
    ];

    public function scopeUserAnimesFilter($query, $id)
    {
        return $query->when($id, function ($query) use ($id) {
            return $query->join('table_animes', 'table_animes.id', '=', 'table_user_reviews.anime_id')
                ->where('table_user_reviews.user_id', $id);
        }, function ($query) {
            return $query;
        })->select('table_user_reviews.*', 'table_animes.*');

        /*
         * SQL Equivalent:
         * SELECT table_user_reviews.*, table_animes.* FROM table_user_reviews
         * JOIN table_animes ON table_animes.id = table_user_reviews.anime_id
         * WHERE table_user_reviews.user_id = 1;
         */
    }

    public function scopeSpecificAnimeFilter($query, $animeId, $userId)
    {
        return $query->when($animeId, function ($query) use ($animeId, $userId) {
            return $query->join('table_animes', 'table_animes.id', '=', 'table_user_reviews.anime_id')
                ->where('table_user_reviews.anime_id', $animeId)
                ->where('table_user_reviews.user_id', $userId);
        }, function ($query) {
            return $query;
        })->select('table_user_reviews.*', 'table_animes.*');

        /*
            * SQL Equivalent:
            * SELECT table_user_reviews.*, table_animes.* FROM table_user_reviews
            * JOIN table_animes ON table_animes.id = table_user_reviews.anime_id
            * WHERE table_user_reviews.anime_id = 1 AND table_user_reviews.user_id = 1;
        */
    }

}

