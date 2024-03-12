<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'table_genres';
    protected $fillable = ['genre'];
    // This fillable property is used to allow mass assignment of the genre column. In layman's term it allows you to insert data into the genre column.

    public function animes()
    {
        return $this->belongsToMany(Anime::class, 'table_anime_genres', 'genre_id', 'anime_id')->withTimestamps();
        /* belongsToMany means that the relationship is many-to-many.
         * The first argument is the name of the related model.
         * The second argument is the name of the pivot table (the table that is used to store the relationships).
         * The third argument is the foreign key of the model
         * on which you are defining the relationship, while
         * the fourth argument is the foreign key of the model
         * that you are joining to.
         */
    }
}
