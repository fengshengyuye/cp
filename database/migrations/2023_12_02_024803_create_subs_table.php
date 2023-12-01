<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('subs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('产品类型名称');
            $table->string('preview')->nullable()->comment('产品大类预览图');
            $table->text('desc')->nullable()->comment('产品类型介绍');
            $table->unsignedInteger('order')->default(0)->comment('排序');
            $table->foreignId('cat_id')->constrained('cats','id')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('subs');
    }
};
