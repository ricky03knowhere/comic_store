<?php

namespace App\Http\Controllers;

use App\Models\Detail_order;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class TransactionController extends Controller
{
  public function index() {

    $orders = DB::table('users')
    ->join('orders', 'users.id', 'orders.user_id')
    ->select('orders.id', 'orders.date', 'users.email', 'orders.total_price', 'orders.status')
    -> get();

    return view('transaction.index', compact('orders'));
  }

  public function show($id){
      $detail_orders = Detail_order::where('order_id', $id) ->get();
    
      $order =  DB::table('orders') ->where('orders.id', $id)
      ->join('users', 'users.id', 'orders.user_id')
      ->first();
      
      
      return view('transaction.details', compact('detail_orders', 'order'));
    }

      public function edit($id){
        // $detail_orders = Detail_order::where('order_id', $id) ->get();
      
        $order =  DB::table('orders') ->where('orders.id', $id)
        ->join('users', 'users.id', 'orders.user_id')
        ->first();
        
        return view('transaction.edit', compact('order'));

      }

      public function update(Request $request, $id){

        $order = Order::where('id', $id) ->first();
        
        
        $order -> status = 2;

        $order ->update();

        return redirect('transactions/edit/'.$order ->id) ->with('notif', 'Transaction updated successfully');
      }
}