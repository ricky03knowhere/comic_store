@extends('../layouts.app')

@section('content')
@include('layouts.headers.header')

<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-11">
      <div class="card table-card bg-secondary shadow mb-6" id="book-list">

        <div class="card-header bg-white border-0">
          <h2 class="pt-1">
            <i class="fa fa-hand-holding-usd mx-2"></i> Transactions /
            <i class="fa fa-list mx-2"></i> List
          </h2>
        </div>

        <div class="card-body py-5 px-3">


          <div class="table-responsive">

            <table class="table table-bordered table-hover my-3" id="dataTable">
              <thead class="bg-primary text-white text-center">
                <tr>

                  <th>No.</th>
                  <th>Date</th>
                  <th>Email</th>
                  <th>Nominal</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="align-items-center text-center">
                @php $i = 1 @endphp
                @foreach ($orders as $order)
                <tr>
                  <td class="align-middle">{{ $i++ }}</td>
                  <td class="align-middle">{{ $order -> date }}</td>
                  <td class="align-middle">{{ $order -> email }}</td>
                  <td class="align-middle">Rp. {{ number_format($order -> total_price) }}</td>

                  <td class="align-middle">

                    @if($order ->status != 1)
                    <span class="badge badge-pill badge-danger"><i class="fa fa-close-circle mr-1"></i> Unpaid</span>
                    @else
                    <span class="badge badge-pill badge-success"><i class="fa fa-check-circle mr-1"></i> Paid</span>
                    @endif

                  </td>


                  <td class="align-middle">
                    <a href=" {{ url('transactions/edit', $order ->id) }}" class="btn btn-warning btn-sm">
                      <i class="fa fa-edit"></i></a>

                    <a href="{{ url('transactions/details', $order ->id) }}" class="btn btn-primary btn-sm info">
                      <i class="fa fa-info-circle"></i></a>

                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>

    @include('layouts.footers.auth')
  </div>

  @endsection