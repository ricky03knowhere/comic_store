@extends('../layouts.admin')
@section('content')


  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-11">

        <div class="card p-2 table-card">
          <h2><i class="ni ni-book-bookmark mr-2" ></i>Books Collection</h2>
          <button type="button" class="btn btn-primary my-4 btn-add badge-pill d-flex float-right"
          data-toggle="modal" data-target="#modal-form"><i class="ni ni-fat-add mr-2"></i>Add Book</button>

          <div class="table-responsive">

            <table class="table table-bordered table-hover my-3" id="dataTable">
              <thead class="bg-primary text-white text-center">
              <tr>
                
                <th>No.</th>
                <th>Picture</th>
                <th>Title</th>
                <th>Auhtor</th>
                <th>Stock</th>
                <th>Action</th>
              </tr>  
              </thead>
              <tbody class="align-items-center text-center">
              @php  $i = 1 @endphp
              @foreach ($books as $book)
                <tr>
                  <td class="align-middle">{{ $i++ }}</td>
                  <td class="align-middle">
                    <div class="img">

                      <img src="assets/img/pict.jpg" alt="">
                    </div>
                  </td>
                  <td class="align-middle">{{ $book -> title }}</td>
                  <td class="align-middle">{{ $book -> author }}</td>
                  <td class="align-middle">{{ $book -> stock }}</td>
                  <td class="align-middle">
                    <a href=""
                      class="btn btn-primary btn-sm info">
                      <i class="fa fa-info-circle"></i></a>
                    <a href=""
                      class="btn btn-success btn-sm edit">
                      <i class="fa fa-edit"></i></a>
                    <a href=""
                      class="btn btn-danger btn-sm delete">
                      <i class="fa fa-trash-alt"></i></a>
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
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">

        <div class="modal-body p-0">

          <div class="card bg-secondary border-0 mb-0">
            <div class="card-header bg-white">
              <h3>Add New Book Form</h3>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-book-bookmark"></i></span>
                    </div>
                    <input class="form-control" placeholder="Title" name="title">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" placeholder="Author" name="author">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <input class="form-control" placeholder="Price" type="number" name="price">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-books"></i></span>
                    </div>
                    <input class="form-control" placeholder="Quantity" name="stock">
                  </div>
                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-copy-04"></i></span>
                    </div>
                    <textarea class="form-control" placeholder="Description" name="desc" rows="3"></textarea>
                  </div>

                </div>

                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-collections"></i></span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFileLang" lang="en">
                      <label class="custom-file-label" for="customFileLang">Select picture</label>
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

@endsection