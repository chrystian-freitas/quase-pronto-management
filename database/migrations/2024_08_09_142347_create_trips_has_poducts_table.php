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
                ->on('trips')
                ->onDelete('cascade');
            $table->foreignId('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->integer('start_quantity');
            $table->integer('end_quantity')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
