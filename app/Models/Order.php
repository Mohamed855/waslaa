<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'vendor' => 'array',
        'products' => 'array',
    ];

    // relationships

    public function users (): BelongsTo
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function invoices (): BelongsToMany
    {
        return $this->belongsToMany(Invoice::class, 'invoice_orders', 'order', 'invoice');
    }
}
