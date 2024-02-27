<?php

use App\Models\Vendor;
use App\Models\User;
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
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Vendor::class, 'vendor')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(User::class, 'user')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->text('title');
            $table->text('body');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complains');
    }
};
