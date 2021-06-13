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

          <div class="table-responsive" id="toggle-paid">

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

                    <form action="{{ url('transactions/update', $order ->id) }}" id="toggle-paid-form" method="post">
                      @csrf

                      @if($order ->status == 1)
                      <input type="checkbox" checked data-toggle="toggle" data-style="ios" data-size="sm"
                        data-on="✔ PAID" data-off="UNPAID" data-onstyle="success" data-offstyle="danger" class="toggler"
                        name="status" />

                      @else
                      <input type="checkbox" data-toggle="toggle" data-style="ios" data-size="sm" data-on="✔ PAID"
                        data-off="UNPAID" data-onstyle="success" data-offstyle="danger" class="toggler" name="status" />

                      @endif
                    </form>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>


        <div class=" text-center mb-3">
          <a href="{{ url('transactions/list') }}" class="btn btn-white">
            <i class="fas fa-backward mr-2"></i>Back</a>
        </div>
      </div>

    </div>
  </div>

  @include('layouts.footers.auth')

</div>

@endsection