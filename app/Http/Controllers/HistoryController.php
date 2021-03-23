<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Detail_order;
use Auth;

class HistoryController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }
  
    public function index() {
      $orders = Order::where('user_id', Auth::user() ->id)
      ->where('status', '!=', 0) ->get();
     
     $total_item = [];
     foreach ($orders as $order) {
      $count = Detail_order::where('order_id', $order ->id) -> sum('quantity');
      
      array_push($total_item, $count);
     }
     
      return view('history/index', compact('orders', 'total_item'));
    }
    
    public function details($id){
      $orders = Detail_order::where('order_id', $id) ->get();
    
      $status = Order::where('id', $id) ->first() ->status;
      return view('history/detail', compact('orders', 'status'));
    }
}
