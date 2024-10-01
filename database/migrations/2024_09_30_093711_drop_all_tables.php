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
        Schema::dropIfExists('deliveries');
        Schema::dropIfExists('products');
        Schema::dropIfExists('products_sites');
        Schema::dropIfExists('sites');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
