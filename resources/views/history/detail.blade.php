@extends('../layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-11">
      <table class="table">
        <thead>
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
          @foreach($orders as $order)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $order -> book -> title }}</td>
            <td>Rp. {{ number_format($order -> book -> price) }}</td>
            <td>{{ $order -> quantity }}</td>
            <td>Rp. {{ number_format($order -> total_price) }}</td>
          </tr>
          @endforeach
          
          <tr>
            <th colspan="4">Total Books Price</th>
            <td>
              Rp. {{ number_format($order -> order -> total_price) }}
            </td>
          </tr>
          <tr>
            <th colspan="4">Payment ID</th>
            <td>
              Rp. {{ number_format($order -> order -> payment_id) }}
            </td>
          </tr>
          <tr>
            <th colspan="4">Total Price</th>
            <td>
              Rp. {{ number_format($order -> order -> total_price + $order -> order -> payment_id) }}
            </td>
          </tr>
          <tr>
            <th colspan="4">Status</th>
            <th>
              @if($status == 1)
              {{ "Paid" }}
              @else
              {{ "Unpaid" }}
              @endif
            </th>
          </tr>
        </tbody>
      </table>

    </div>
  </div>
</div>

@endsection