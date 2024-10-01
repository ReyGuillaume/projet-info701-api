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
        Schema::create('step_deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_step');
            $table->unsignedBigInteger('id_delivery');
            $table->timestamps();

            $table->foreign('id_step')->references('id')->on('steps')->cascadeOnDelete();
            $table->foreign('id_delivery')->references('id')->on('deliveries')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('step_deliveries');
    }
};
