<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $fillable =
        ['title', 'content'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    //获取评论
    public function  comments(){
        return $this->morphMany(Comment::class,'commentable');
    }
}
