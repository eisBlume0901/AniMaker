<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;


/**
 * @method static create(array $formFields)
 * @method static where(string $string, mixed $email)
 * @method static latest()
 * @method static paginate(int $int)
 * @method static find(int $int)
 * @method static findOrfail(int $int)
 * @method static first()
 * @method static UserAnimes(mixed $id)
 * @method static UserAnimeInfo(mixed $id)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function reviews(): BelongsToMany
    {
        return $this->belongsToMany(Anime::class, 'table_user_reviews', 'user_id', 'anime_id')->withTimestamps();
    }


    public function getUserDetails($id)
    {
        return $this->where('id', $id)
            ->first(['name', 'email', 'image']);
    }

    public function getUserCounts($id)
    {
        return $this->where('id', $id)
            ->withCount(['reviews as anime_count' => function (EloquentBuilder $query) {
                $query->select(DB::raw('count(distinct anime_id)'));
            }, 'reviews as review_count' => function (EloquentBuilder $query) {
                $query->select(DB::raw('count(review)'));
            }])
            ->first(['anime_count', 'review_count']);
    }
}
