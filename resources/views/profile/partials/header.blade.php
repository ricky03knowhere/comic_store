<div class="header pb-8 pt-5 pt-md-8"
  style="background-image: url({{ asset('argon') }}/img/theme/user_background.jpg); background-size: cover; background-position: center top;">

  <span class="mask bg-gradient-default opacity-8"></span>

  <div class="container-fluid d-flex align-items-center mb-6">

    <h1 class="display-2 text-white " style="z-index: 99; text-shadow: 2px 2px 3px #0005"> {{ $title ?? '' }}</h1>
    @if (isset($description) && $description)
    <p class=" text-white mt-0 mb-5">{{ $description }}</p>
    @endif

  </div>
</div>