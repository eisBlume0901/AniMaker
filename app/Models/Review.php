<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $formFields)
 * @method static find($id)
 * @method static findOrFail($id)
 * @method SpecificAnimeFilter(mixed $anime_id, $id)
 * @method static where(string $string, mixed $animeId)
 * @method static latest()
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

    public function scopeSpecificAnimeFilter($query, $anime_id, $id)
    {
        return $query->when($anime_id, function ($query) use ($anime_id, $id) {
            return $query->join('table_animes', 'table_animes.id', '=', 'table_user_reviews.anime_id')
                ->where('table_user_reviews.anime_id', $anime_id)
                ->where('table_user_reviews.user_id', $id);
        }, function ($query) {
            return $query;
        })->select('table_user_reviews.*', 'table_animes.*');
    }


    public function getAnimeReviews($query, $id): object
    {
        return $query->when($id, function ($query) use ($id) {
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

    public function scopeFilterReviewStatus($query, $animeId, $reviewStatus): object
    {
        return $query->when($reviewStatus, function ($query) use ($animeId, $reviewStatus) {
                return $query
                    ->where('table_user_reviews.anime_id', $animeId)
                    ->where('table_user_reviews.reviewStatus', $reviewStatus)
                    ->join('users', 'users.id', '=', 'table_user_reviews.user_id')
                    ->select([
                        'users.name AS user_name',
                        'users.email AS user_email',
                        'users.image AS user_image',
                        'table_user_reviews.rating as rating',
                        'table_user_reviews.reviewStatus as reviewStatus',
                        'table_user_reviews.review as review',
                        'table_user_reviews.progress as progress',
                        'table_user_reviews.watchStatus as watchStatus'
                    ]);
            })
            ->get();

        /* SQL Equivalent
            * SELECT users.name AS user_name,
            * users.email AS user_email,
            * users.image AS user_image,
            * table_user_reviews.rating AS user_rating,
            * table_user_reviews.reviewStatus AS user_review_status,
            * table_user_reviews.review AS user_review,
            * table_user_reviews.progress AS user_progress,
            * table_user_reviews.watchStatus AS user_watch_status
            * FROM table_user_reviews
            * JOIN users ON users.id = table_user_reviews.user_id
            * WHERE table_user_reviews.anime_id = 1
            * AND table_user_reviews.reviewStatus = 'Recommended';
            */
    }
}

