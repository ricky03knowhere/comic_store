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
            <i class="fas fa-hand-holding-usd mx-2"></i> Transactions /
            <i class="fa fa-edit mx-2"></i> Edit
          </h2>
        </div>


        <div class="card-body py-5 px-3">

          <div class="table-responsive">

            <table class="table table-bordered table-hover">
              <thead class="bg-primary text-white text-center">

                <th>Email</th>
                <th>Name</th>
                <th>Nominal</th>
                <th>Payment ID</th>
                <th>Total Pay</th>
                <th>Status</th>
              </thead>
              <tbody class="text-center">
                <tr>
                  <td>{{ $order ->name }}</td>
                  <td>{{ $order ->email }}</td>
                  <td>Rp. {{ number_format($order ->total_price) }}</td>
                  <td>Rp. {{ number_format($order ->payment_id) }}
                  <td>Rp. {{ number_format($order ->total_price + $order ->payment_id) }}</td>
                  <td>

                    @if($order ->status == 1)
                    <label class="custom-toggle">
                      <input type="checkbox" checked>
                      <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                    </label>

                    @else
                    <span class="badge badge-pill badge-danger"><i class="fa fa-close-circle mr-1"></i> Unpaid</span>
                    @endif
                  </td>
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