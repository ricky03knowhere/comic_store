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

          <a href="{{ url('store') }}" class="btn btn-success btn-sm float-right mb-5"><i class="fas fa-plus mr-1"></i>
            Add Order</a>

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
                ?>
                @foreach($detail_order as $order)
                <tr>
                  <td class="align-middle">{{ $i++ }}</td>
                  <td class="align-middle">{{ $order -> book -> title }}</td>
                  <td class="align-middle">Rp. {{ number_format($order -> book -> price) }}</td>
                  <td class="align-middle">{{ $order -> quantity }}</td>
                  <td class="align-middle">Rp. {{ number_format($order -> total_price) }}</td>
                  <td class="align-middle">
                    <form action="{{ url('checkout/remove',[$order -> id]) }}" method="post"
                      id="remove-order-{{ $order -> id }}">
                      @csrf
                      {{ method_field('DELETE') }}
                      <button class="btn btn-danger btn-sm delete-order warn-notif" data-msg="remove this order..?"
                        data-form="remove-order-{{ $order -> id }}">
                        <i class="fas fa-trash mr-1"></i>Remove</button>

                    </form>
                  </td>
                </tr>
                @endforeach
                <tr>
                  <th></th>
                  <th colspan="3">Total Pay</th>
                  <th>
                    Rp. {{ number_format($order -> order -> total_price) }}
                  </th>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="text-center pt-6">
            <form action="{{ url('checkout/confirm') }}" id="checkout">
              @csrf
            </form>
            <button type="submit" class="btn btn-primary warn-notif" data-form="checkout"
              data-msg="checkout your orders now..?">
              <i class="fa fa-cart-arrow-down mr-2"></i>Checkout</button>


            <button onclick="window.history.back()" class="btn btn-white">
              <i class="fas fa-backward mr-2"></i>Back</button>
          </div>
        </div>
      </div>
      @endif

      @endif

      <div
        class="alert bg-gradient-warning mt-4 {{ (($no_items == null) || ($no_items -> total_price == 0)) ? ' d-block' : ' d-none' }}"
        id="empty-cart">
        <h3 class="text-white font-weight-600"><i class="fa fa-exclamation-triangle mr-1"></i>Oops...</h3>
        <span class="text-dark font-weight-bold">
          No Orders yet...

        </span>
        <a href="{{ url('store') }}" class="btn btn-success btn-sm float-right"><i
            class="fa fa-shopping-cart mr-1"></i>Order Now</a>
      </div>

    </div>
  </div>

  @include('layouts.footers.auth')

</div>

@endsection