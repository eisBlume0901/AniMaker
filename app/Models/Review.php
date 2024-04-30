<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $formFields)
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

}
