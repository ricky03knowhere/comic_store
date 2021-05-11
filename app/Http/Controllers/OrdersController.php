<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Order;
use App\Models\Detail_order;
use UxWeb\SweetAlert\SweetAlert;
use Auth;
use Carbon\Carbon;

class OrdersController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index($id) {
    $book = Book::where('id', $id) ->first();


    return  view('order/index', compact('book'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request, $id) {
    $book = Book::where('id', $id) ->first();
    $user_id = Auth::user() ->id;

    if (($request ->quantity > $book ->stock)) {
      
      return redirect('order/'.$id) ->with('alert-notif', 'Your order is out of stock');
    }
    else if ($request -> quantity == 0) {

      return redirect('order/'.$id) ->with('alert-notif', 'The order cannot be null');
    }


    //Check order eather exist or not
    $order_check = Order::where('user_id', Auth::user() ->id)
    -> where('status', 0) ->first();

    if (empty($order_check)) {

      //Store Order data
      $order = new Order;

      $order -> user_id = $user_id;
      $order -> payment_id = mt_rand(100,999);
      $order -> date = Carbon::now();
      $order -> status = 0;
      $order -> total_price = 0;
      $order -> save();
    }


    $new_order = Order::where('user_id', Auth::user() ->id)
    -> where('status', 0) ->first();

    //Check Detail order eather exist or not

    $detail_order_check = Detail_order::where('book_id', $book -> id)
    -> where('order_id', $new_order -> id) -> first();

    if (empty($detail_order_check)) {

      //Store Detail_order data
      $detail_order = new Detail_order;

      $detail_order -> book_id = $book ->id;
      $detail_order -> order_id = $new_order ->id;
      $detail_order -> quantity = $request ->quantity;
      $detail_order -> total_price = $book ->price * $request -> quantity;
      $detail_order -> save();
    } else {
      $detail_order = Detail_order::where('book_id', $book -> id)
      -> where('order_id', $new_order -> id) -> first();

      $detail_order -> quantity += $request -> quantity;

      //Current Price
      $new_detail_order_price = $book -> price * $request -> quantity;
      $detail_order -> total_price += $new_detail_order_price;

      $detail_order ->update();
    }

    //Update Total price of orders

    $order = Order::where('user_id', Auth::user() ->id)
    -> where('status', 0) ->first();

    $order -> total_price += $book -> price * $request -> quantity;
    $order ->update();

    alert()-> success('Success', 'Order is successfully added to cart');
    return redirect('checkout');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function checkout() {

    $order = Order::where('user_id', Auth::user() ->id)
    ->where('status', 0) ->first();
   $detail_order = [];
    if (!empty($order)) {

      $detail_order = Detail_order::where('order_id', $order ->id) ->get();

    }
      return view('order/checkout', compact('order','detail_order'));

  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id) {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function checkout_confirm() {

    $order = Order::where('user_id', Auth::user() ->id)
    ->where('status', 0) ->first();

    $order -> status = 1;
    $order ->update();

    $detail_orders = Detail_order::where('order_id', $order ->id) ->get();

    foreach ($detail_orders as $d_order) {

      $book = Book::where('id', $d_order -> book_id) ->first();
      $book ->stock -= $d_order ->quantity;

      $book ->update();
    }

alert() ->success('Success', 'Orders have been confirmed, please complete the payment... ');
  return redirect('history');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function remove($id) {

    $detail_order = Detail_order::where('id', $id) ->first();

    $order = Order::where('id', $detail_order ->order_id) ->first();

    $order -> total_price -= $detail_order ->total_price;
    
    $order ->update();
    $detail_order ->delete();
    
    return redirect('checkout') ->with('notif','Order has been removed');

  }
}