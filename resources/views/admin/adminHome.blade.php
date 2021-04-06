@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards_admin')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill=" #f6f9fc" fill-opacity="1" d="M0,192L60,192C120,192,240,192,360,176C480,160,600,128,720,133.3C840,139,960,181,1080,181.3C1200,181,1320,139,1380,117.3L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection