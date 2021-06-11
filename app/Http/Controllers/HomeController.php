<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB; 

use App\Models\Order;
use App\Models\Detail_order;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index() {

        $user = auth() ->user();
        
        $dashboard =  (($user ->status) == 1) ? 'admin/home' : 'home';


        return redirect($dashboard);
    }


    public function customer() {
        $user = auth() ->user();
        $user_order = Order::where('user_id',  $user -> id) ->first();
        
        $order = $user_order ->where('status', '==', 0) ->first();
        
        $get_order = Detail_order::where('order_id', $order ->id) ->first();
        $get_count = Detail_order::where('order_id', $order ->id) ->get();
        
        $cart = $get_count ->sum('quantity');
        $total_pay = $get_order -> order ->total_price;


        $get_user_order_id = Order::where('user_id',  $user -> id) ->where('status', '!=', 0);
        
        $history_paid =  $get_user_order_id ->get() ->sum('total_price');
        $history_count =  $get_user_order_id ->where('status', '!=', 0) ->count();
        $user_orders =  $get_user_order_id ->where('status', '!=', 0) ->get();
      
        $books = [];
        foreach ($user_orders as $get_item) {
          $book = Detail_order::where('order_id', $get_item -> id) ->sum('quantity');
          array_push($books, $book);
        }
        
        $books_count = array_sum($books);
     
      //   dump($cart);
      // dump($total_pay);
      
      // dump($history_count);
      
      // dump($history_paid);
      // dd($books_count);

        return view('dashboard', compact('cart', 'total_pay', 'history_count', 'history_paid', 'books_count'));
      }
    
      public function admin() {
    
        return view('admin/adminHome');
    
      }
}