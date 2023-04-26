<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperProperty
 */
class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'price',
        'city',
        'address',
        'sold'
    ];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(PropertyImage::class);
    }
}
