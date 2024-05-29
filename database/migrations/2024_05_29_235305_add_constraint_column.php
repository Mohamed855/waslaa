<?php

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
        Schema::table('components', function (Blueprint $table) {
            $table->foreign('vendor_id')->references('id')->on('vendors')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('types', function (Blueprint $table) {
            $table->foreign('vendor_id')->references('id')->on('vendors')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('subcategories', function (Blueprint $table) {
            $table->foreign('vendor_id')->references('id')->on('vendors')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            //
        });
    }
};
