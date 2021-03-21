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
          <th>Action</th>
        </thead>
        <tbody>
          <?php
          $i = 1;

          ?>
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
            <th colspan="4">Payment ID</th>
            <th colspan="4">Total Price</th>
            <td>
              Rp. {{ number_format($order -> order -> total_price) }}
            </td>
            <td>
              Rp. {{ number_format($order -> order -> payment_id) }}
            </td>
            <td>
              Rp. {{ number_format($order -> order -> total_price + $order -> order -> payment_id) }}
            </td>
          </tr>
          @endif
        </tbody>
      </table>

      @endif

      @endif

      <div class="alert alert-warning {{ (($no_items == null) || ($no_items -> total_price == 0)) ? ' d-block' : ' d-none' }}">
        <h5><i class="fa fa-warning"></i>Oops...</h5>
        No Orders yet... <br>
        <a href="{{ url('book') }}" class="btn btn-info">Order Now</a>
      </div>

    </div>
  </div>
</div>

@endsection