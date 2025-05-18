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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('or_id');

            $table->unsignedBigInteger('or_pd_id');
            $table->unsignedBigInteger('or_us_id');

            $table->integer('or_amount'); // ✅ TAMBAHKAN ini agar sesuai dengan seeder

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('or_pd_id')->references('pd_id')->on('products')->onDelete('cascade');
            $table->foreign('or_us_id')->references('us_id')->on('users')->onDelete('cascade');
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
