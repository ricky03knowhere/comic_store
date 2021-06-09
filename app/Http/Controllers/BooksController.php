<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }



  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    $books = Book::paginate(20);
    return view('book/index', compact('books'));
  }

  public function bookList() {
    $books = Book::paginate(20);
    return view('book/list', compact('books'));
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
  public function store(Request $request) {

    $picture = $request -> picture;
    $picture_name = date('Ymd').rand(100, 99999).'.'.$picture ->getClientOriginalExtension();

    $book = new Book();
    $book -> title = $request ->title;
    $book -> author = $request ->author;
    $book -> desc = $request ->desc;
    $book -> price = $request ->price;
    $book -> stock = $request ->stock;

    $book -> picture = $picture_name;

    $picture ->move(public_path().'/assets/img/books/', $picture_name);

    $book ->save();

    return redirect('comic/list') ->with('notif', 'Book data added successfully');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id) {
    $book = Book::where('id', $id) ->first();
    
    return view('book/details', compact('book'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id) {

    $book = Book::where('id', $id) ->first();

    return view('book/edit', compact('book'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id) {

    $get_book = Book::where('id', $id) ->first();

    // dd($get_book);
    $old_pict = $get_book ->picture;
    $new_pict = $request ->picture;

    if ($new_pict) {
      $new_pict ->move(public_path().'/assets/img/books/', $old_pict);
    }

    $get_book ->update([
      'title' => $request ->title,
      'author' => $request ->author,
      'stock' => $request ->stock,
      'price' => $request ->price,
      'desc' => $request ->desc,
      'picture' => $old_pict
    ]);

    return redirect('comic/detail/'.$id) ->with('notif', 'Book data updated successfully');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    Book::destroy($id);

    return redirect('comic/list') ->with('notif', 'Book data deleted successfully');
  }
}