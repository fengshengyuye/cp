<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'order'];
//    protected $with = ['subs'];
    public function subs()
    {
      return  $this->hasMany(Sub::class, 'cat_id', 'id');
    }
}
