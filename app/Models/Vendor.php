<?php

namespace App\Models;

use App\Helpers\AppHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vendor extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

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
        'categories' => 'array',
        'subcategories' => 'array',
        'address' => 'array',
        'password' => 'hashed',
    ];

    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->username = strtolower(AppHelper::generateUsername(Vendor::class, $user->name));
        });
    }

    // relationships

    public function _admin (): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'added_by');
    }

    public function _city (): BelongsTo
    {
        return $this->belongsTo(City::class, 'city');
    }

    public function _managers (): HasMany
    {
        return $this->hasMany(Manager::class, 'added_by');
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
