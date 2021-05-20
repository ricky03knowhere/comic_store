<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class TransactionController extends Controller
{
  public function index() {

    $orders = DB::table('users')
    ->join('orders', 'users.id', 'orders.user_id')
    ->select('orders.date', 'users.email', 'users.name', 'orders.total_price', 'orders.status')
    -> get();

    return view('transaction.index', compact('orders'));
  }

  public function payment() {
    $user = auth()-> user();
    
    return view('transaction.payment', compact('user'));
  }

}