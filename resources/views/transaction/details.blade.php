@extends('../layouts.app')
@section('content')
@include('layouts.headers.header')

<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-md-12 col-lg-11">


      <div class="card table-card bg-secondary shadow mb-6" id="tag-details">

        <div class="card-header bg-white border-0">
          <h2 class="pt-1">
            <i class="fas fa-hand-holding-usd mx-2"></i> Transactions /
            <i class="fa fa-info-circle mx-2"></i> Details
          </h2>
        </div>


        <div class="card-body py-5 px-3">

          <div class="user-info mr-xl-6 mr-xs-2 mb-5">
            <div class="tag-name">
              <h4>
                <i class="fas fa-user mr-2"></i><b> Name : {{ $order ->name }}</b>
              </h4>
              <h4>
                <i class="fas fa-envelope mr-2"></i><b> Email : {{ $order ->email }}</b>
              </h4>
            </div>
          </div>

          <span class="badge badge-pill bg-yellow mb-4" style="font-size: 0.8rem; text-transform: capitalize">
            <b><i class="ni ni-calendar-grid-58 mr-2"></i>
              Order Date : {{ $order ->date }}</b>
          </span>

          <div class="table-responsive">

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
        </div>


        <div class="text-center mb-3">
          <button onclick="window.history.back()" class="btn btn-white">Back</button>
        </div>
      </div>

    </div>
  </div>

  @include('layouts.footers.auth')

</div>

@endsection