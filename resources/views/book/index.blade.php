@extends('../layouts.app')
@section('content')

<!--@include('layouts.headers.cards_book')-->

<!--<div class="container">-->
<!--  <div class="row" id="book-shelf">-->
<!--       @foreach($books as $book)-->
 
<!--    <div class="col-6 col-md-4 col-lg-3">-->

<!--      <div class="card mb-5">-->
<!--        <img src="{{ asset('assets').'/img/books/'.$book ->picture }}" class="card-img" alt="...">-->
<!--        <div class="card-img-overlay">-->
<!--          <p class="card-text">-->
<!--            <h4 class="text-gren text-right price">Rp. {{ number_format($book ->price) }},-</h4>-->
<!--          </p>-->
<!--          <h4 class="text-white title">{{ $book ->title }}</h4>-->
<!--          <h4 class="author">{{ $book ->author }}</h4>-->
<!--          <a href="#" class="btn btn-primary float-right">-->
<!--            <i class="fas fa-shopping-cart mr-1"></i> Order-->
<!--          </a>-->
<!--        </div>-->
<!--      </div>-->


<!--    </div>-->
<!-- @endforeach-->
<!--  </div>-->
<!--</div>-->


      <div class="home-demo">

        <div class="row mt-4">
          <div class="large-12 columns">
            <div class="owl-carousel owl-theme">
              @for($i=0;$i <= 3;$i++)
                <div class="item">
                  <img src="{{ asset('assets') }}/img/books/2021043029279.jpg" width="8em">
                </div>
                @endfor

              </div>
            </div>
          </div>


        </div>

@endsection