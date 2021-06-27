@php
use Carbon\Carbon;

@endphp

</html>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link href="{{ asset('argon') }}/img/brand/brand.webp" rel="icon" type="image/png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Icon -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>
<title>transaction_receipt_{{ $order ->payment_id.'_'.date('Ymd') }}</title>

</head>

<body>

  <div class="pb-5 mb-5 mx-5">
    <div class="row mb-4">
      <div class="col-4">
        <img src="{{ asset('argon') }}/img/brand/brand.webp" class="mb-3" height="60" alt="brand_logo">
        <h3 class="mb-0">Comic Store</h3>

      </div>
      <div class="col-8 text-right">
        <p class="mb-0 mt-2">
          <i class="far fa-calendar-alt mr-2"></i> Order Date :
          {{ date_format(date_create($order ->date), "l, d F Y") }}
        </p>
        <p>
          Status:
          <span class="badge badge-pill ml-2 mt-3" style="font-size: 1rem;"><i class="fa fa-check-circle mr-1"></i>
            Paid</span>
        </p>
      </div>
    </div>
    <hr class="mb-4">
    <div class="row mb-4">
      <div class="col-6">
        <p class="mb-0 text-blue">
          Bill From:
        </p>
        <p class="mb-0">
          <strong>Comic Store</strong>
        </p>
        <p class="mb-0">
          comi000store@gmail.com
        </p>
        <p class="mb-0">
          0896-0453-5310 (Annie Leonhart)
        </p>
        <p class="mb-0">
          www.comic--store.herokuapp.com
        </p>
      </div>
      <div class="col-6 text-right">
        <p class="mb-0 text-blue">
          Bill To:
        </p>
        <p class="mb-0 text-capitalize">
          <strong>{{ $order ->name }}</strong>
        </p>
        <p class="mb-0">
          {{ $order ->email }}
        </p>
      </div>
    </div>
    <div class="row justify-content-center mt-5 pt-4">
      <div class="col-10">

        <table class="table table-bordered">
          <thead class="text-center">

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

          </tbody>
        </table>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="text-center col-lg-12 pt-5 mt-5">
        <p class="mb-0" style="max-width: 100%;">
          Thanks for shopping at our store...
        </p>
        <p class="mb-0 font-weight-bold" style="max-width: 100%;">
          Comic Store.
        </p>
      </div>
    </div>
  </div>
  <div class="float-right pt-7">
    @php
    $date = date_create(Carbon::now() ->addHours(7) ->toDateTimeString())

    @endphp
    {{ date_format($date, "h:i A l, d F Y") }}
  </div>

  <script type='text/javascript'>
  window.print()
  </script>
</body>



</html>