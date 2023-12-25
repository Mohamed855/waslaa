<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relationships

    public function _subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class, 'subcategory');
    }

    public function _components () : HasMany
    {
        return $this->hasMany(Component::class, 'product');
    }

    public function _types () : HasMany
    {
        return $this->hasMany(Type::class, 'product');
    }

    public function _favorites (): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'favorite_id', 'user');
    }
}
