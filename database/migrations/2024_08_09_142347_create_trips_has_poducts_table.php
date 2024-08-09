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
        Schema::create('trips_has_poducts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')
                ->references('id')
                ->on('trips');
            $table->foreignId('product_id')
                ->references('id')
                ->on('products');
            $table->integer('start_quantity');
            $table->integer('end_quantity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips_has_poducts');
    }
};
