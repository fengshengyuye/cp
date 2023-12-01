<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'order', 'desc', 'preview','cat_id'];
//    protected $with = ['cat'];

    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }
    public function proucts(){
        return $this->hasMany(Product::class);
    }
}
