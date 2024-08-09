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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')
                ->references('id')
                ->on('users');
            $table->foreignId('trip_made_by')
                ->references('id')
                ->on('users');
            $table->foreignId('route_id')
                ->references('id')
                ->on('routes');
            $table->timestamp('start_date');
            $table->decimal('start_total_load', 10, 2);
            $table->integer('start_km')->nullable();
            $table->integer('end_km')->nullable();
            $table->decimal('end_total_load', 10, 2)->nullable();
            $table->timestamp('end_date')->nullable();
            $table->decimal('value_paid_by_employee', 10, 2)->nullable();
            $table->decimal('final_balance', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
