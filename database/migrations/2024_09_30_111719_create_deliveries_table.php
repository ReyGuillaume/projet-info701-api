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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('quantity');
            $table->enum('status', ['pending', 'completed', 'cancelled']);
            $table->string('client_contact');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_site_presence');
            $table->unsignedBigInteger('id_site_destination');
            $table->timestamps();

            $table->foreign('id_product')->references('id')->on('products')->cascadeOnDelete();
            $table->foreign('id_site_presence')->references('id')->on('sites')->cascadeOnDelete();
            $table->foreign('id_site_destination')->references('id')->on('sites')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
