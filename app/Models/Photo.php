<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable=['file'];

    public function product(){
        return $this->hasOne(Product::class);
    }
    public function getFileAttribute($value){
        return "/images/" . $value;
    }
}
