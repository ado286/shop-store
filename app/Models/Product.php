<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  //  use HasFactory;

    protected $fillable=['name', 'price', 'photo_id', 'description'];

    public function photo(){
        return $this->belongsTo(Photo::class);
    }
}
