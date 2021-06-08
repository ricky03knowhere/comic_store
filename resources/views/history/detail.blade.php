@extends('../layouts.app')
@section('content')
@include('layouts.headers.header')


@if(session('notif'))
<div id="notif" data-notif="{{ session('notif') }}"></div>
@endif

<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-md-12 col-lg-11">


      <div class="card table-card bg-secondary shadow mb-6">

        <div class="card-header bg-white border-0">
          <h2 class="pt-1">
            <i class="fas fa-shopping-cart mx-2"></i> Order /
            <i class="fa fa-history mx-2"></i> History /
            <i class="fa fa-info-circle mx-2"></i> Details
          </h2>
        </div>


        <div class="card-body py-5 px-3">

          @if($order ->status != 1)
          <div class="alert alert-success" role="alert">
            <span class="alert-icon"><i class="fa fa-info-circle mr-2"></i> Success!</span>
            <span class="alert-text">Your orders have been confirmed,
              please complete the payment with a nominal value of
              <b>Rp. {{ number_format($order ->total_price + $order ->payment_id) }}</b>
              to account number <b>38-2918-1018</b> in the name of <b>Annie Leonhart</b></span>
          </div>
          @endif

          <span class="badge badge-pill bg-yellow mb-4" style="font-size: 0.8rem; text-transform: capitalize">
            <b><i class="ni ni-calendar-grid-58 mr-2"></i>
              Order Date : {{ $order ->date }}</b>
          </span>


          <table class="table table-bordered table-hover">
            <thead class="bg-primary text-white text-center">

              <th>No.</th>
              <th>Title</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total Price</th>
            </thead>
            <tbody>
              <?php
              $i = 1;
              ?>
              @foreach($detail_orders as $detail_order)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $detail_order -> book -> title }}</td>
                <td>Rp. {{ number_format($detail_order -> book -> price) }}</td>
                <td>{{ $detail_order -> quantity }}</td>
                <td>Rp. {{ number_format($detail_order -> total_price) }}</td>
              </tr>
              @endforeach
              <tr>
                <td></td>
                <th colspan="3">Total Books Price</th>
                <td>
                  Rp. {{ number_format($order ->total_price) }}
                </td>
              </tr>
              <tr>
                <td></td>
                <th colspan="3">Payment ID</th>
                <td>
                  Rp. {{ number_format($order ->payment_id) }}
                </td>
              </tr>
              <tr>
                <td></td>
                <th colspan="3">Total Pay</th>
                <th>
                  Rp. {{ number_format($order ->total_price + $order ->payment_id) }}
                </th>
              </tr>
              <tr>
                <td></td>
                <th colspan="3">Status</th>
                <th>
                  @if($order ->status == 1)
                  <span class="badge badge-pill badge-success"><i class="fa fa-check-circle mr-1"></i> Paid</span>
                  @else
                  <span class="badge badge-pill badge-danger"><i class="fa fa-close-circle mr-1"></i> Unpaid</span>
                  @endif

                </th>
              </tr>
            </tbody>
          </table>

        </div>


        <div class="text-center mb-3">
          <a href="{{ url('book') }}" class="btn btn-white ml-auto"><i class="ni ni-shop mr-2"></i>Back to Store</a>
        </div>
      </div>

    </div>
  </div>

  @include('layouts.footers.auth')

</div>

@endsection