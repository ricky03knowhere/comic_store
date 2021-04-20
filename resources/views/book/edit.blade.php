@extends('../layouts.app')

@section('content')
@include('layouts.headers.header')

<div class="container-fluid mt--6">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-11">
      <div class="card table-card bg-secondary shadow mb-6">
      
        <div class="card-header bg-white border-0">
          <h2 class="pt-1">
            <i class="ni ni-book-bookmark mx-2"></i>Books Collection /
            <i class="ni ni-collection mx-2"></i> {{ $book -> title }} /
            <i class="fas fa-edit mx-2"></i>Edit
          </h2>
        </div>

        <div class="card-body p-5">

          <form role="form" action="{{ url('book/update', $book ->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <label class="form-control-label" for="#">Title</label>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-book-bookmark"></i></span>
                    </div>
                    <input class="form-control" placeholder="Title" name="title" value="{{ $book ->title }}" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <lable class="form-control-label">Author</lable>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" placeholder="Author" name="author" value="{{ $book ->author }}" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <lable class="form-control-label">Price</lable>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input class="form-control" placeholder="Price" type="number" name="price" value="{{ $book ->price }}" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <lable class="form-control-label">Quantity</lable>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-books"></i></span>
                    </div>
                    <input type="number" class="form-control" placeholder="Quantity" name="stock" value="{{ $book ->stock }}" required>
                  </div>
                </div>
              </div>
            </div>

                <div class="form-group mb-3">
                  <lable class="form-control-label">Description</lable>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-copy-04"></i></span>
                    </div>
                    <textarea class="form-control" placeholder="Description" name="desc" rows="3" required>
                      {{ $book ->desc }}
                    </textarea>
                  </div>

                </div>
        
            <div class="row">
              <div class="col-md-6">
                  <img src="{{ asset('assets') }}/img/books/{{ $book ->picture }}" alt="" class="img-thumbnail rounded" width="150px">
              </div>
              <div class="col-md-6">
                <div class="form-group mb-3">
                  <lable class="form-control-label">Cover</lable>
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-collection"></i></span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFileLang" lang="en" name="picture">
                      <label class="custom-file-label" for="customFileLang">Select cover picture</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary my-4">Save</button>
          <button onclick="window.history.back()" class="btn btn-white ml-auto">Back</button>
            </div>
          </form>
        </div>



      </div>
    </div>
  </div>

  @include('layouts.footers.auth')
</div>

@endsection
