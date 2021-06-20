<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB; 

use Carbon\Carbon;
use App\Models\User;
use App\Models\Book;
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
        
        $dashboard =  (($user ->is_admin) == 1) ? 'admin/home' : 'home';

        return redirect($dashboard);
    }


    public function customer() {
        $user = auth() ->user();
        $user_order = Order::where('user_id',  $user -> id);
        
        $order = $user_order ->where('status', 0) ->first();
        
        $cart = 0;
        $total_pay = 0;
    
        if($order){
          
          // $get_order =first();
          $get_count = Detail_order::where('order_id', $order ->id) ->get();
          
          $cart = $get_count ->sum('quantity');
          $total_pay = Detail_order::where('order_id', $order ->id) ->first() -> order ->total_price;
        }
        


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

        return view('dashboard', compact('cart', 'total_pay', 'history_count', 'history_paid', 'books_count'));
      }
    
      public function admin() {
 
        $current = Carbon::today() ->toDateTimeString();
        $last_moth = Carbon::now() ->subMonth() ->toDateTimeString();
  
        
        $today_income = Order::where('date', $current) ->where('status', 1) ->get() ->sum('total_price');
        $today_trades = Order::where('date', $current) ->where('status', 1) ->get() ->count();
        
        $sold_books = Detail_order::all() ->sum('quantity');
        $sold_title = Detail_order::distinct() ->count('book_id');
        
        $books_collection = Book::all() ->count();
        $books_new_added = Book::where('created_at', '>=', $last_moth) ->get() ->count();
        
        $users = User::all() ->count();
        
        $admin = User::where('is_admin', 1) ->count();
        $customer = User::where('is_admin',  null) ->count();

        
        $variables = ['today_income', 'today_trades', 'sold_books', 'sold_title', 
                    'books_collection', 'books_new_added', 'users', 'admin', 'customer'];
        
        return view('admin/adminHome', compact($variables));
      }
}