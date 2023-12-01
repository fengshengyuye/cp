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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('产品类型名称');
            $table->text('desc')->comment('产品的介绍');
            $table->string('preview')->nullable()->comment('产品预览图');
            $table->unsignedInteger('order')->default(0)->comment('排序');
            $table->foreignId('sub_id')->constrained('subs','id')->onDelete('cascade');
            $table->string('video')->nullable()->comment('产品视频');
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
        Schema::dropIfExists('products');
    }
};
