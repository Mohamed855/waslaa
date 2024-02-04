<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    // relationships

    public function _vendors (): BelongsToMany
    {
        return $this->belongsToMany(Vendor::class, 'vendor_subcategories', 'subcategory', 'vendor');
    }

    public function _products (): HasMany
    {
        return $this->hasMany(Product::class, 'subcategory');
    }
}
