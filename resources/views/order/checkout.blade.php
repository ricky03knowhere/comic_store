@extends('../layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-11">
      @php
        $no_items = null
      @endphp
      
      @if($order != null)
      @php
        $no_items = $order
      @endphp

      @if($order -> total_price != 0)
      <a href="{{ url('book') }}" class="btn btn-info">Add Order</a>
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
              <form action="{{ url('checkout/remove',[$order -> id]) }}" method="post" class="remove-order">
                @csrf
                {{ method_field('DELETE') }}
                <button onclick="return false" class="btn btn-warning delete-order"><i class="fas fa-trash mr-1"></i>Remove</button>

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
            <td>
              <a href=" {{ url('checkout/confirm') }} "><i class="fa fa-shopping-cart mr-1"></i>Checkout</a>
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