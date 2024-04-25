<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'start' => 'date',
        'end' => 'date',
    ];

    // relationships

    public function vendor (): BelongsTo
    {
        return $this->belongsTo(Vendor::class, 'vendor');
    }

    public function orders (): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'invoice_orders', 'invoice', 'order');
    }

    public function getTotalPriceAttribute()
    {
        return $this->orders->sum('totalCost');
    }
}
