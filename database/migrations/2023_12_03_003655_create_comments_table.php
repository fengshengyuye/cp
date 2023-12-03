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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content')->comment('评论内容');
            $table->foreignId('user_id')->constrained('users','id')->onDelete('cascade')->comment('评论是谁写的');
            //多态
            $table->morphs('commentable');
            //同表外键关联 回复了哪条评论
            $table->foreignId('comment_id')->nullable()->constrained('comments','id')->onDelete('cascade')->comment('回复了哪条评论');
            $table->foreignId('reply_user_id')->nullable()->constrained('users','id')->onDelete('cascade')->comment('回复了谁的评论');
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
        Schema::dropIfExists('comments');
    }
};
