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
        Schema::create('products', function (Blueprint $table) {
            $table->id('pd_id');
            $table->string('pd_code')->unique();
            $table->unsignedBigInteger('pd_ct_id');
            $table->string('pd_name');
            $table->decimal('pd_price', 12, 2);
            $table->timestamps();
            $table->foreign('pd_ct_id')->references('ct_id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
