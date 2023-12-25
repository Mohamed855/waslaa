<?php

use App\Models\City;
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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['user', 'vendor']);
            $table->bigInteger('user_id');
            $table->foreignIdFor(City::class, 'city');
            $table->string('address');
            $table->smallInteger('building')->nullable();
            $table->smallInteger('floor')->nullable();
            $table->smallInteger('flat')->nullable();
            $table->string('special_mark')->nullable();
            $table->boolean('main')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
