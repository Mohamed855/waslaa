<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    // relationships

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function components () : BelongsToMany
    {
        return $this->belongsToMany(Component::class, 'product_components');
    }

    public function types () : BelongsToMany
    {
        return $this->belongsToMany(Type::class, 'product_types')->withPivot(['price']);
    }

    public function activeComponents ()
    {
        return $this->components()->where('active', 1);
    }

    public function activeTypes ()
    {
        return $this->types()->where('active', 1);
    }

    public function vendor()
    {
        $subcategory = $this->subcategory()->firstOrFail();
        return $subcategory->vendor()->first();
    }

    public function favorites (): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'favorite_id', 'user_id')->where('type', 'product');
    }

    public static function vendorProducts ()
    {
        return self::whereHas('subcategory.vendor', function ($query) {
            $query->where('vendors.id', auth('vendor')->id());
        });
    }
}
