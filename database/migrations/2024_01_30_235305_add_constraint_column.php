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
        Schema::table('ads', function (Blueprint $table) {
            $table->foreign('product')->references('id')->on('products')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('city')->references('id')->on('cities')->constrained()->onUpdate('cascade')->onDelete('no action');
        });
        Schema::table('vendors', function (Blueprint $table) {
            $table->foreign('city')->references('id')->on('cities')->constrained()->onUpdate('cascade')->onDelete('no action');
            $table->foreign('added_by')->references('id')->on('admins')->constrained()->onUpdate('cascade')->onDelete('no action');
        });
        Schema::table('managers', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('vendors')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('cities', function (Blueprint $table) {
            $table->foreign('country')->references('id')->on('countries')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('subcategory')->references('id')->on('subcategories')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('subcategories', function (Blueprint $table) {
            $table->foreign('category')->references('id')->on('categories')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('addresses', function (Blueprint $table) {
            $table->foreign('city')->references('id')->on('cities')->constrained()->onUpdate('cascade')->onDelete('no action');
        });
        Schema::table('favorites', function (Blueprint $table) {
            $table->foreign('user')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('user')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product')->references('id')->on('products')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('no action');
        });
        Schema::table('vendor_categories', function (Blueprint $table) {
            $table->foreign('vendor')->references('id')->on('vendors')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category')->references('id')->on('categories')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('vendor_subcategories', function (Blueprint $table) {
            $table->foreign('vendor')->references('id')->on('vendors')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subcategory')->references('id')->on('subcategories')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('product_components', function (Blueprint $table) {
            $table->foreign('product')->references('id')->on('products')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('component')->references('id')->on('components')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('product_types', function (Blueprint $table) {
            $table->foreign('product')->references('id')->on('products')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type')->references('id')->on('types')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::table('rates', function (Blueprint $table) {
            $table->foreign('user')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('no action');
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
