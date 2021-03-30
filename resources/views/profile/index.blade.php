@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                          <div class="d-flex justify-content-between">
                              <a href="#!" class="btn btn-sm btn-default float-center">
                                @if(auth()->user()->is_admin == 1)
                                Administrator
                                @else
                                Customer
                                @endif
                              </a>
                          </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <!--<div class="row">-->
                        <!--    <div class="col">-->
                        <!--        <div class="card-profile-stats d-flex justify-content-center mt-md-5">-->
                        <!--            <div>-->
                        <!--                <span class="heading">22</span>-->
                        <!--                <span class="description">{{ __('Friends') }}</span>-->
                        <!--            </div>-->
                        <!--            <div>-->
                        <!--                <span class="heading">10</span>-->
                        <!--                <span class="description">{{ __('Photos') }}</span>-->
                        <!--            </div>-->
                        <!--            <div>-->
                        <!--                <span class="heading">89</span>-->
                        <!--                <span class="description">{{ __('Comments') }}</span>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni ni-email-83 mr-2"></i>
                                {{ auth()->user()->email }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="fa fa-phone mr-2"></i>{{ auth()->user()->phone }}
                            </div>
                            <div>
                                <i class="ni ni-pin-3 mr-2"></i>{{ auth()->user()->address }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        @include('layouts.footers.auth')
    </div>
@endsection
