<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'user_id', 'comment_id', 'reply_user_id'];
protected  $with=['user','replyUser','comment'];
//与作者的关联
    public function user()
    {
        return $this->belongsTo(User::class);
    }
//回复的用户
    public function replyUser(){
        return $this->belongsTo(User::class,'reply_user_id');
    }
    //回复了哪条评论
    public function comment(){
        return $this->belongsTo(Comment::class,'comment_id');
    }
    //获取评论的回复
public function replys(){
        return $this->hasMany(Comment::class,'comment_id');
}
//评论针对哪个帖子或新闻资讯
public function model(){
        return $this->morphTo('commentable');
}
}
