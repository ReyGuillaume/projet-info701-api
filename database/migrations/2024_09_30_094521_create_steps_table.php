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
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('previous_step')->nullable();
            $table->unsignedBigInteger('next_step')->nullable();
            $table->timestamps();

            $table->foreign('previous_step')->references('id')->on('steps')->nullOnDelete();
            $table->foreign('next_step')->references('id')->on('steps')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('steps');
    }
};
