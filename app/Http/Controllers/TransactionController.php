<?php

namespace App\Http\Controllers;

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

  public function show() {
    $user = ;
    
    return view('transaction.details', compact('user'));
  }

}