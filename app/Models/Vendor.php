<?php

namespace App\Models;

use App\Helpers\AppHelper;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
            $user->username = strtolower(AppHelper::generateUsername(Vendor::class, $user->owner_name));
        });
    }

    // relationships

    public function admin (): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'added_by');
    }

    public function addresses (): HasMany
    {
        return $this->hasMany(Address::class, 'user_id')->where('type', 'vendor');
    }

    public function city (): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function managers (): HasMany
    {
        return $this->hasMany(Manager::class, 'added_by');
    }

    public function users (): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'vendor_users');
    }

    public function categories (): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'vendor_categories');
    }

    public function subcategories (): HasMany
    {
        return $this->hasMany(Subcategory::class);
    }

    public function favorites (): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites', 'favorite_id', 'user_id')->where(['type' => 'vendor']);
    }

    public function notifications (): HasMany
    {
        return $this->hasMany(Notification::class, 'user_id')->where('type', 'vendor');
    }

    public function orders ($vendorId)
    {
        return Order::query()->where('vendor->id', $vendorId);
    }

    public function currVendorOrders ()
    {
        return Order::query()->where('vendor->id', auth('vendor')->id());
    }

    public function invoices (): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function components (): HasMany
    {
        return $this->hasMany(Component::class);
    }

    public function types (): HasMany
    {
        return $this->hasMany(Type::class);
    }

    public function complains (): HasMany
    {
        return $this->hasMany(Complain::class);
    }

    public function products()
    {
        $subcategoriesIds = $this->subcategories()->pluck('id')->toArray();
        return Product::query()->whereIn('subcategory_id', $subcategoriesIds);
    }

    public function getAllProductIds()
    {// you need this to check if user add to cart another vendor product
        $subcategories = $this->subcategories();
        $productIds = [];
        foreach ($subcategories as $subcategory) {
            $productIds = array_merge($productIds, $subcategory->products->pluck('id')->toArray());
        }
        return $productIds;
    }

    public function getTotalTransactionsAttribute()
    {
        $totalOrders = 0;
        foreach ($this->invoices as $invoice) {
            $totalOrders += $invoice->orders()->withTrashed()->count();
        }
        return $totalOrders;
    }
}
