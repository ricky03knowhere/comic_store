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
      $orders = Order::where('user_id', auth() ->user() ->id)
      ->where('status', '!=', 0) ->get() ->sortByDesc('created_at');
     
     $total_item = [];
     foreach ($orders as $order) {
      $count = Detail_order::where('order_id', $order ->id) -> sum('quantity');
      
      array_push($total_item, $count);
     }
     
      return view('history/index', compact('orders', 'total_item'));
    }
    
    public function details($id){
      $detail_orders = Detail_order::where('order_id', $id) ->get();
    
      $order = Order::where('id', $id) ->first();
      
      
      return view('history/details', compact('detail_orders', 'order'));
    }
}