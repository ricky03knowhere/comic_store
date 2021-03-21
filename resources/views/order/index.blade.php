@extends('../layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card" style="width: 18rem;">
        <img src=" {{ url('uploads/') }} {{ $book -> picture }} " class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $book ->title }}</h5>
          <p class="card-text">
            <span class="text-muted">Author : {{ $book -> author }} </span><br>
            <span>Desc   : {{ $book -> desc }} </span><br>
            <span>Stock   : {{ $book -> stock }} </span>

            <h6>Rp {{ number_format($book -> price)  }} </h6>
          </p>
          <form action=" {{ url('order',[$book -> id]) }} " method="post">
            @csrf
            <div class="form-group row">
              <label for="quantity" class="col-sm-2 col-form-label">Total Order</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="quantity" name="quantity" value="1" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus mr-1"></i> Add to cart</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection