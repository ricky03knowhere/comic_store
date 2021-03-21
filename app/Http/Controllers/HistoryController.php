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
      $order = Order::where('user_id', Auth::user() ->id)
      ->where('status', '!=', 0) ->get();
      
      $orders = Detail_order::where('order_id', $order ->id) ->get();
      $total_item =  Detail_order::where('order_id', $order ->id) ->count();
      
      return view('history', compact('orders', 'total_item'));
    }
    
    public function details($id){
      $order = Detail_order::where('id', $id) ->first();
      
      return view('history/detail', compact('order'));
    }
}
