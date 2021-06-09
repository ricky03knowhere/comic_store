@extends('../layouts.app')
@section('content')

@include('layouts.headers.header')


@if(session('alert-notif'))
<div id="alert-notif" data-notif="{{ session('alert-notif') }}"></div>
@endif

<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-11">
      <div class="card table-card bg-secondary shadow mb-6">

        <div class="card-header bg-white border-0">
          <h2 class="pt-1">
            <i class="ni ni-collection mx-2"></i> {{ $book -> title }} /
            <i class="fa fa-shopping-cart mx-2"></i> Order
          </h2>
        </div>

        <div class="card-body py-5 px-3" id="order">
          <div class="row justify-content-center px-md-3">
            <div class="col-lg-4 mb-2 text-center">
              <!--<img src="assets/img/pict.jpg" alt="404" class="img-thumbnail rounded">-->
              <img src="{{ asset('assets/img/books').'/'.$book ->picture }}" alt="404" class="img-thumbnail rounded">
            </div>

            <div class="col-lg-8 mt-6 mt-md-0 px-4">
              <h2 class="mb-4 font-weight-900">{{ $book -> title }}</h2>
              <table>
                <tr class="text-muted">
                  <td class="text-center"><i class="ni ni-single-02 mr-2"></i></td>
                  <td class="align-top">Author</td>
                  <td><span class="px-3">:</span>{{ $book -> author }}</td>
                </tr>
                <tr class="text-orange h4" style="height: 2.5em;">
                  <td class="text-center"><i class="ni ni-books mr-2"></i></td>
                  <td>Stock</td>
                  <td><span class="px-3">:</span>{{ $book -> stock }} pcs</td>
                </tr>
                <tr class="text-green h4">
                  <td class="text-center"><i class="fas fa-dollar-sign  mr-2"></i></td>
                  <td>Price</td>
                  <td><span class="px-3">:</span>Rp. {{ number_format($book -> price) }},-</td>
                </tr>

                <tr class="text-primary h4">
                  <td class="text-center"><i class="fa fa-shopping-cart mr-2"></i></td>
                  <td>Order</td>
                  <td>
                    <span class="px-3 order-s">:</span>
                    <form action=" {{ url('order',$book -> id) }} " method="post">
                      @csrf
                      <div class="form-group ">
                        <div class="input-group input-group-alternative">
                          <input type="number" class="form-control" id="quantity" name="quantity" value="1" required>
                        </div>
                      </div>
                  </td>
                </tr>

                <tr>
                  <td colspan="3" class="text-justify pt-3">
                    <h4 class="pb-2"><i class="ni ni-single-copy-04 mr-2"></i>Synopsis :</h4>
                    <span>{{ $book -> desc }}</span>
                  </td>
                </tr>

              </table>
            </div>

          </div>

        </div>

        <div class="text-center mb-5 mt-2">
          <button type="submit" class="btn btn-primary"><i class="fa fa-cart-plus mr-1"></i> Add to cart</button>
          </form>
          <button onclick="window.history.back()" class="btn btn-white ml-auto">Back</button>
        </div>
      </div>



    </div>
  </div>

  @include('layouts.footers.auth')
</div>


@endsection