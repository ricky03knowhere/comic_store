<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail_order;
use Illuminate\Support\Facades\DB; 

class ExportController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct() {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */

  
  public function index($id) {
    $detail_orders = Detail_order::where('order_id', $id) ->get();
    
      $order =  DB::table('orders') ->where('orders.id', $id)
      ->join('users', 'users.id', 'orders.user_id')
      ->first();

      return view('export.index', compact('detail_orders', 'order'));
  }

}