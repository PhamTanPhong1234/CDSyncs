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
    Schema::create('promotions', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Tên chương trình khuyến mãi
        $table->text('description')->nullable(); // Mô tả
        $table->decimal('discount', 5, 2); // Phần trăm giảm giá
        $table->date('start_date'); // Ngày bắt đầu
        $table->date('end_date'); // Ngày kết thúc
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
