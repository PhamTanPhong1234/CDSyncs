<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    public function up()
    {
        Schema::create('CDSyncs_album', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('artist');
            $table->string('genre')->nullable();
            $table->date('release_date')->nullable();
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable(); // Trường cover_image sẽ lưu tên tệp hình ảnh
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('CDSyncs_album');
    }
};
