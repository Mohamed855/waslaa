<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vendor extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
      'categories' => 'array',
      'subcategories' => 'array',
      'address' => 'array',
    ];

    // relationships

    public function _city (): BelongsTo
    {
        return $this->belongsTo(City::class, 'city');
    }

    public function _categories (): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'vendor_categories', 'vendor', 'category');
    }

    public function _subcategories (): BelongsToMany
    {
        return $this->belongsToMany(Subcategory::class, 'vendor_subcategories', 'vendor', 'subcategory');
    }

    public function _favorites (): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'favorite_id', 'user');
    }

}
