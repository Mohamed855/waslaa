<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Helpers\AppHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    protected $dates = ['deleted_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->username = strtolower(AppHelper::generateUsername(User::class, $user->name));
        });
    }

    // relationships

    public function _city (): BelongsTo
    {
        return $this->belongsTo(City::class, 'city');
    }

    public function _addresses (): HasMany
    {
        return $this->hasMany(Address::class, 'user_id');
    }

    public function _cart (): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'carts', 'user', 'product')->withPivot('id', 'quantity', 'type');
    }

    public function _favoriteProducts (): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'favorites', 'user', 'favorite_id');
    }

    public function _favoriteVendors (): BelongsToMany
    {
        return $this->belongsToMany(Vendor::class, 'favorites', 'user', 'favorite_id');
    }

    public function _vendors (): BelongsToMany
    {
        return $this->belongsToMany(Vendor::class, 'vendor_users', 'user', 'vendor');
    }

    public function getVerifiedAttribute(): bool
    {
        return count($this->_vendors) > 0;
    }

    // JWT methods

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
