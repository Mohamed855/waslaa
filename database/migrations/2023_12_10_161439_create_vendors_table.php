<?php

use App\Models\Admin;
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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('username')->unique();
            $table->string('crn')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar');
            $table->foreignIdFor(City::class);
            $table->enum('status', ['open', 'busy', 'closed'])->default('open');
            $table->enum('lang', ['en', 'ar'])->default('en');
            $table->smallInteger('delivery_time');
            $table->double('delivery_cost');
            $table->double('rate')->default(0);
            $table->tinyInteger('priority')->default(3);
            $table->foreignIdFor(Admin::class, 'added_by');
            $table->boolean('active')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
