<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'desc', 'preview', 'video', 'order','sub_id'];

    public function sub()
    {
        return $this->belongsTo(Sub::class, 'sub_id', 'id');
    }
}
