<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  use HasFactory;

  public function detail_order() {
    return $this->hasMany('App\Models\Detail_order', 'book_id', 'id');
  }
}