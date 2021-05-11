@extends('../layouts.app')
@section('content')

@include('layouts.headers.header')

@if(session('notif'))
<div id="notif" data-notif="{{ session('notif') }}"></div>
@endif

<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-md-12 col-lg-11">


      @php
      $no_items = null
      @endphp

      @if($order != null)
      @php
      $no_items = $order
      @endphp

      @if($order -> total_price != 0)


      <div class="card table-card bg-secondary shadow mb-6">

        <div class="card-header bg-white border-0">
          <h2 class="pt-1">
            <i class="fas fa-shopping-cart mx-2"></i> Order /
            <i class="ni ni-books mx-2"></i> Your Cart
          </h2>
        </div>

        <div class="card-body py-5 px-3">

          <a href="{{ url('book') }}" class="btn btn-success btn-sm float-right my-3"><i class="fas fa-plus mr-1"></i> Add Order</a>

          <div class="table-responsive">

            <table class="table table-bordered table-hover">
              <thead class="bg-primary text-white text-center">
                <th>No.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php
                $i = 1;
                $order_item = true;

                ?>
                @foreach($detail_order as $order)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $order -> book -> title }}</td>
                  <td>Rp. {{ number_format($order -> book -> price) }}</td>
                  <td>{{ $order -> quantity }}</td>
                  <td>Rp. {{ number_format($order -> total_price) }}</td>
                  <td>
                    <form action="{{ url('checkout/remove',[$order -> id]) }}" method="post" id="remove-order">
                      @csrf
                      {{ method_field('DELETE') }}
                      <button class="btn btn-danger btn-sm delete-order warn-notif"
                        data-msg="Are you sure to remove this order..?" data-form="remove-order">
                        <i class="fas fa-trash mr-1"></i>Remove</button>

                    </form>
                  </td>
                </tr>
                @endforeach
                @if(!empty($order))
                <tr>
                  <th colspan="4">Total Price</th>
                  <td>
                    Rp. {{ number_format($order -> order -> total_price) }}
                  </td>
                </tr>
                @endif
              </tbody>
            </table>
          </div>

          <div class="text-center">
            <a href="{{ url('checkout/confirm') }}" class="btn btn-primary my-4"><i class="fa fa-cart-arrow-down mr-2"></i>Checkout</a>
            <button onclick="window.history.back()" class="btn btn-white ml-auto">Back</button>
          </div>
        </div>
      </div>
      @endif

      @endif

      <div class="alert bg-gradient-warning {{ (($no_items == null) || ($no_items -> total_price == 0)) ? ' d-block' : ' d-none' }}">
        <h3 class="text-white"><i class="fa fa-exclamation-triangle mr-1"></i>Oops...</h3>
        <span class="text-dark">
          No Orders yet...

        </span>
        <a href="{{ url('book') }}" class="btn btn-success btn-sm float-right"><i class="fa fa-shopping-cart mr-1"></i>Order Now</a>
      </div>

    </div>
  </div>

  @include('layouts.footers.auth')

</div>

@endsection