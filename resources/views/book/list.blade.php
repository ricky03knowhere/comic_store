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
            <i class="ni ni-book-bookmark mx-2"></i> Comics Collection
          </h2>
        </div>

        <button type="button" class="btn btn-primary mt-4 btn-add badge-pill d-flex float-right" data-toggle="modal"
          data-target="#modal-form"><i class="fas fa-plus mr-2"></i>Add Comic</button>
        <div class="card-body py-5 px-3">



          <div class="table-responsive">

            <table class="table table-bordered table-hover my-3" id="dataTable">
              <thead class="bg-primary text-white text-center">
                <tr>

                  <th>No.</th>
                  <th>Cover</th>
                  <th>Title</th>
                  <th>Stock</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                @php $i = 1 @endphp
                @foreach ($books as $book)
                <tr>
                  <td class="align-middle">{{ $i++ }}</td>
                  <td class="align-middle">
                    <div class="img">
                      <img src="{{ asset('assets') }}/img/books/{{ $book ->picture }}" alt="404" id="img">
                    </div>
                  </td>
                  <td class="align-middle">{{ $book -> title }}</td>
                  <td class="align-middle">{{ $book -> stock }}</td>
                  <td class="align-middle">
                    <a href="{{ url('book/detail', $book ->id) }}" class="btn btn-primary btn-sm info">
                      <i class="fa fa-info-circle"></i></a>

                    <a href="{{ url('book/edit', $book ->id) }}" class="btn btn-success btn-sm info">
                      <i class="fa fa-edit"></i></a>

                    <a href="#!" class="btn btn-danger btn-sm delete warn-notif" data-msg="delete this book data..."
                      data-form="delete-form">
                      <i class="fa fa-trash-alt"></i></a>
                    <form action="{{ url('book/delete', $book ->id) }}" id="delete-form" method="post">
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
  <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">

        <div class="modal-body p-0">

          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-white">
              <h3>Add New Book Form</h3>
            </div>
            <div class="card-body px-md-4 px-lg-5 py-lg-5">
              <form role="form" action="{{ url('book/save') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group mb-3">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-book-bookmark"></i></span>
                        </div>
                        <input class="form-control" placeholder="Title" name="title" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                        </div>
                        <input class="form-control" placeholder="Author" name="author" required>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group mb-3">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input class="form-control" placeholder="Price" type="number" name="price" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <div class="input-group input-group-merge input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-books"></i></span>
                        </div>
                        <input type="number" class="form-control" placeholder="Quantity" name="stock" required>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-copy-04"></i></span>
                    </div>
                    <textarea class="form-control" placeholder="Description" name="desc" rows="3" required></textarea>
                  </div>

                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-collection"></i></span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFileLang" lang="en" name="picture"
                        required>
                      <label class="custom-file-label" for="customFileLang">Select cover picture</label>
                    </div>
                  </div>
                </div>


                <div class="text-center">
                  <button type="button" class="btn btn-white ml-auto" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary my-4">Save</button>
                </div>
              </form>
            </div>
          </div>




        </div>
      </div>
    </div>
  </div>

  @include('layouts.footers.auth')
</div>

@endsection