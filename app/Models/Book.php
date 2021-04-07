<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  use HasFactory;
  
  protected $fillable = ['title', 'author', 'price', 'stock', 'desc', 'picture'];

  public function detail_order() {
    return $this->hasMany('App\Models\Detail_order', 'book_id', 'id');
  }
}