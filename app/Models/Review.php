<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $formFields)
 * @method static find($id)
 * @method static findOrFail($id)
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

    public function scopeFilter($query, $id)
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


}
//
//public function scopeFilter($query, $genre): object
//{
//    return $query->when($genre, function ($query) use ($genre) {
//        // This is a conditional statement provided by Laravel's query builder
//        // when checks if the $genre variable is not null
//        // if its truthy, it executes the join SQL statement using Laravel query builder
//
//        // SQL query which joins the tables
//        return $query->join('table_anime_genres', 'table_animes.id', '=', 'table_anime_genres.anime_id')
//            ->join('table_genres', 'table_anime_genres.genre_id', '=', 'table_genres.id')
//            ->where('table_genres.genre', $genre);
//
//        // if its falsy, it returns the query as is which is select all from table_animes
//    }, function ($query) {
//        return $query;
//    })->select('table_animes.*');
//
//    /*
//     * SQL Equivalent:
//     * SELECT table_animes.* FROM table_animes
//     * JOIN table_anime_genres ON table_animes.id = table_anime_genres.anime_id
//     * JOIN table_genres ON table_anime_genres.genre_id = table_genres.id
//     * WHERE table_genres.genre = 'Adventure';
//     */
//}
