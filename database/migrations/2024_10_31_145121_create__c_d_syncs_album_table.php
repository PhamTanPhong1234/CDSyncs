<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    public function up()
    {
        Schema::create('CDSyncs_album', function (Blueprint $table) {
            $table->id(); // Trường id tự động tăng
            $table->string('title'); // Tên album
            $table->string('image')->nullable()->comment('Đường dẫn ảnh'); // Ảnh bìa album
            $table->unsignedBigInteger('artist_id'); // Khóa ngoại trỏ đến bảng artists
            $table->string('genre')->nullable()->comment('Thể loại album'); // Thể loại
            $table->date('release_date')->nullable()->comment('Ngày phát hành'); // Ngày phát hành
            $table->text('description')->nullable()->comment('Mô tả về album'); // Mô tả album
            $table->timestamps(); // Các trường created_at và updated_at

            // Định nghĩa khóa ngoại
            $table->foreign('artist_id')->references('id')->on('CDSyncs_artists')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('CDSyncs_album');
    }
};
