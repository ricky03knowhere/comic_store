<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Detail_order;
use Auth;
use Hash;

class UsersController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {

      $users = User::all();
  
      return view('user.index', compact('users'));
    
  }

  // /**
  // * Show the form for creating a new resource.
  // *
  // * @return \Illuminate\Http\Response
  // */
  // public function create() {
  //   //
  // }

  // /**
  // * Store a newly created resource in storage.
  // *
  // * @param  \Illuminate\Http\Request  $request
  // * @return \Illuminate\Http\Response
  // */
  // public function store(Request $request) {
  //   //
  // }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id) {
    $user = User::where('id', $id) ->first();
    
    return view('user.details', compact('user'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit() {
    $user = Auth::user();

    return view('profile/edit', compact('user'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request) {
    $user = User::where('id', Auth::user() -> id) ->first();


    $picture = $request ->picture;
    $picture_name = date('Ymd').rand(100, 99999).'.'.$picture ->getClientOriginalExtension();


    if ($picture) {
      $picture ->move(public_path().'/assets/img/books/', $old_pict);
    }
    

    if (!empty($request -> password)) {

      $user -> password = Hash::make($request ->password);
    }
    
    $user -> name = $request -> name;
    $user -> email = $request -> email;
    $user -> address = $request -> address;
    $user -> phone = $request -> phone;
    $user -> picture = $picture_name;
    
    $user ->update();


    return redirect('user/profile')-> with('notif', 'Your profile has been updated...');;
  }


  public function history($id) {

    $user = User::where('id', $id) ->first();
    
    $orders = Order::where('user_id', $id)
    ->where('status', '!=', 0) ->get();
   
   $total_item = [];
   foreach ($orders as $order) {
    $count = Detail_order::where('order_id', $order ->id) -> sum('quantity');
    
    array_push($total_item, $count);
   }
   
    return view('user/history', compact('orders', 'total_item', 'user'));
  }

  
  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    User::destroy($id);

    return redirect('users/list') ->with('notif', 'User data deleted successfully');
  }
}