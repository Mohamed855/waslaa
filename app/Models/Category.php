<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relationships

    public function _vendors (): BelongsToMany
    {
        return $this->belongsToMany(Vendor::class, 'vendor_categories', 'category', 'vendor');
    }
}
