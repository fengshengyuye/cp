<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique()->comment('新闻资讯标题');
            $table->string('preview')->nullable()->comment('新闻资讯的缩略图');
            $table->string('video')->nullable()->comment('新闻资讯的视频');
            $table->text('desc')->comment('新闻资讯的内容');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infos');
    }
};
