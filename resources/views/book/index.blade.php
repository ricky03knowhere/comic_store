@extends('../layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    @foreach($books as $book)
    <div class="col-md-4">
      <div class="card">
        <img src=" {{ url('uploads/') }} {{ $book -> picture }} " class="card-img-top" alt="..."> 
        <div class="card-body">
          <h5 class="card-title">{{ $book ->title }}</h5> 
          <p class="card-text">
            <span class="text-muted">Author : {{ $book -> author }} </span><br>
            <span>Desc   : {{ $book -> desc }} </span><br>
            <span>Stock   : {{ $book -> stock }} </span>
         <h6>Rp {{ number_format($book -> price)  }} </h6>
          </p>
          <a href=" {{ url('order', [$book ->id]) }} " class="btn btn-primary"><i class="fas fa-shopping-cart mr-1"></i> Order</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection