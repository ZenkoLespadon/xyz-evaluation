<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get all tracks for the category.
     */
    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    /**
     * Scope query to only include categories with tracks.
     */
    public function scopeWithTracks(Builder $query): Builder
    {
        return $query->has('tracks');
    }

    /**
     * Determine if the category has any tracks.
     */
    public function hasTracks(): bool
    {
        return $this->tracks()->exists();
    }
}
