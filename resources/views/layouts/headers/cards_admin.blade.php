<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid" id="admin-dashboard">
    <div class="header-body">
      <a class="h4 text-white text-uppercase" href="{{ url('admin/home') }}">
        <i class="ni ni-tv-2 mr-2 mt--2"></i>
        Admin Dashboard
      </a>
      <!-- Card stats -->
      <div class="row mt-6">
        <div class="col-lg-6 mb-3 mb-xl-6">
          <div class="card card-stats card-lift--hover mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Today Income</h5>
                  <span class="h2 font-weight-bold mb-0">Rp {{ number_format($today_income) }} ,-</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                    <i class="fas fa-hand-holding-usd"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-success mr-2">{{ $today_trades }}</span>
                <span class="text-nowrap">Today transactions</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-3 mb-xl-6">
          <div class="card card-stats card-lift--hover mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Books Sold</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $sold_title }} titles</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                    <i class="fas fa-money-check-alt"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-success mr-2"> {{ $sold_title }} pcs</span>
                <span class="text-nowrap">Purchased books</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-3 mb-xl-6">
          <div class="card card-stats card-lift--hover mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Books Collection</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $books_collection }} Titles</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                    <i class="ni ni-book-bookmark"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-primary mr-2"> {{ $books_new_added }} titles</span>
                <span class="text-nowrap">Recently added</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-3 mb-xl-6">
          <div class="card card-stats card-lift--hover mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Users</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $users }}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                    <i class="ni ni-single-02"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-primary mr-2"> {{ $admin }} Administrators </span> |
                <span class="text-warning mr-2"> {{ $customer }} Customers</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>