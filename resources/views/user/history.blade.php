@extends('../layouts.app')
@section('content')

@include('layouts.headers.header')


<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-md-12 col-lg-11">

      @php
      $no_items = null
      @endphp

      @if($orders != null)
      @php
      $no_items = $orders
      @endphp
      <div class="card table-card bg-secondary shadow mb-6">

        <div class="card-header bg-white border-0">
          <h2 class="pt-1">
            <i class="fas fa-users mx-2"></i> User /
            <i class="fas fa-user mx-2"></i> {{$user ->name}} /
            <i class="fa fa-history mx-2"></i> History
          </h2>
        </div>

        <div class="card-body py-5 px-3">

          <div class="table-responsive">

            <table class="table table-bordered table-hover my-3" id="dataTable">
              <thead class="bg-primary text-white text-center">

                <th>No.</th>
                <th>Date</th>
                <th>Total items</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php
                $i = 1;
                ?>
                @foreach($orders as $order)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $order -> date }}</td>
                  <td>{{ $total_item[($i-2)] }}</td>
                  <td>Rp. {{ number_format($order -> total_price) }}</td>
                  <th>

                    @if($order ->status == 1)
                    <span class="badge badge-pill badge-success"><i class="fa fa-check-circle mr-1"></i> Paid</span>
                    @else
                    <span class="badge badge-pill badge-danger"><i class="fa fa-close-circle mr-1"></i> Unpaid</span>
                    @endif

                  </th>
                  <td>
                    <a href="{{ url('transactions/details', [$order ->id]) }}" class="btn btn-info btn-sm">
                      <i class="fas fa-info-circle"></i> Details
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>


        <div class="text-center mb-3">
          <button onclick="window.history.back()" class="btn btn-white ml-auto"><i class="fa fa-fast-backward mr-2"></i>
            Back
          </button>
        </div>
      </div>

      @endif


      <div class="alert bg-gradient-warning {{ ($no_items == null) ? ' d-block' : ' d-none' }}">
        <h3 class="text-white"><i class="fa fa-exclamation-triangle mr-1"></i>Oops...</h3>
        <span class="text-dark">
          No Histories yet...

        </span>

      </div>

    </div>
  </div>

  @include('layouts.footers.auth')

</div>

@endsection