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
            $table->text('address');
            $table->string('deliveryPhone');
            $table->enum('payMethod', ['cash', 'card']);
            $table->enum('deliveryMethod', ['delivery', 'pickup']);
            $table->double('totalCost')->default(0);
            $table->text('deliveryNote')->nullable();
            $table->enum('status', ['ordered', 'delivered', 'canceled'])->default('ordered');
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
