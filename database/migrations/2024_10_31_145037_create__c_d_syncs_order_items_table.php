<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('CDSyncs_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('CDSyncs_orders');
            $table->foreignId('product_id')->constrained('CDSyncs_products');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('CDSyncs_order_items');
    }
};