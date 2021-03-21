<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_order extends Model
{
  use HasFactory;

  public function book() {
    return $this->belongsTo('App\Models\Book', 'book_id', 'id');
  }
  
  public function order() {
    return $this->belongsTo('App\Models\Order', 'order_id', 'id');
  }
}