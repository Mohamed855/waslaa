<?php

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user');
            $table->json('vendor');
            $table->json('products');
            $table->json('address');
            $table->string('deliveryPhone');
            $table->enum('pay_method', ['cash', 'card']);
            $table->enum('deliver_method', ['delivery', 'pickup']);
            $table->double('total_cost')->default(0);
            $table->text('delivery_note')->nullable();
            $table->enum('status', ['sent', 'viewed', 'outed', 'canceled', 'delivered']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
