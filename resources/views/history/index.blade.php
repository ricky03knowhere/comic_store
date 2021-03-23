@extends('../layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-11">
      @php
        $no_items = null
      @endphp
      
      @if($orders != null)
      @php
        $no_items = $orders
      @endphp
      <a href="{{ url('book') }}" class="btn btn-info">Add Order</a>
      <table class="table">
        <thead>
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
                {{ "Paid" }}
              @else
                {{ "Unpaid" }}
              @endif
            </th>
            <td>
              <a href="{{ url('history', [$order ->id]) }}" class="btn btn-primary">
                <i class="fas fa-info-circle"></i> Details
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      @endif

      <div class="alert alert-warning {{ ($no_items == null) ? ' d-block' : ' d-none' }}">
        <h5><i class="fa fa-warning"></i>Oops...</h5>
        No History yet... <br>
        <a href="{{ url('book') }}" class="btn btn-info">Order Now</a>
      </div>

    </div>
  </div>
</div>

@endsection