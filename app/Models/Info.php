<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $fillable=['title','desc','preview','video'];
    //获取评论
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }
}
