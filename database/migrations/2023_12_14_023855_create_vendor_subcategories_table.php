<?php

use App\Models\Subcategory;
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
        Schema::create('vendor_subcategories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Vendor::class, 'vendor');
            $table->foreignIdFor(Subcategory::class, 'subcategory');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_subcategories');
    }
};
