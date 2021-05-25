@extends('../layouts.app')

@section('content')
@include('layouts.headers.header')

@if(session('notif'))
<div id="notif" data-notif="{{ session('notif') }}"></div>
@endif
<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-12 col-lg-11">
      <div class="card table-card bg-secondary shadow mb-6" id="book-list">

        <div class="card-header bg-white border-0">
          <h2 class="pt-1">
            <i class="fa fa-users mx-2"></i> Users List
          </h2>
        </div>

        <button type="button" class="btn btn-primary mt-4 btn-add badge-pill d-flex float-right"
          data-toggle="modal" data-target="#modal-form"><i class="fas fa-plus mr-2"></i>Add Comic</button>
        <div class="card-body py-5 px-3">



          <div class="table-responsive">

            <table class="table table-bordered table-hover my-3" id="dataTable">
              <thead class="bg-primary text-white text-center">
                <tr>

                  <th>No.</th>
                  <th>Email</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="align-items-center text-center">
                @php  $i = 1 @endphp
                @foreach ($users as $user)
                <tr>
                  <td class="align-middle">{{ $i++ }}</td>
                  <td class="align-middle">{{ $user -> email }}</td>
                  <td class="align-middle">{{ $user -> name }}</td>
               
                  <td class="align-middle">{{ $user -> name }}</td>


                  <td class="align-middle">
                    <a href="{{ url('user/history', $user ->id) }}"
                      class="btn btn-warning btn-sm info">
                      <i class="fa fa-dollar-sign"></i></a>
                
                    <a href="{{ url('user/details', $user ->id) }}"
                      class="btn btn-primary btn-sm info">
                      <i class="fa fa-info-circle"></i></a>

                    <a href="#!"
                      class="btn btn-danger btn-sm delete warn-notif" data-msg="delete this user data..." data-form="delete-form">
                      <i class="fa fa-trash-alt"></i></a>
                    <form action="{{ url('user/delete', $user ->id) }}" id="delete-form" method="post">
                      @method('delete')
                      @csrf
                    </form>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('layouts.footers.auth')
</div>

@endsection