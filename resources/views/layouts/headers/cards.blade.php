<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid" id="admin-dashboard">
    <div class="header-body">
      <a class="h4 text-white text-uppercase" href="{{ url('admin/home') }}">
        <i class="ni ni-tv-2 mr-2 mt--2"></i>
        Dashboard
      </a>
      <!-- Card stats -->
      <div class="row mt-6">
        <div class="col-lg-6 mb-3 mb-xl-6">
          <div class="card card-stats card-lift--hover mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Your Cart</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $cart }} pcs</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                    <i class="ni ni-cart"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-success mr-2">Rp. {{ number_format($total_pay) }} ,-</span>
                <span class="text-nowrap">Checkout now...</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-3 mb-xl-6">
          <div class="card card-stats card-lift--hover mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Orders History</h5>
                  <span class="h2 font-weight-bold mb-0">Rp. {{ $history_count }} Transactions</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                    <i class="fas fa-history"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-success mr-2">Rp. {{ number_format($history_paid) }} ,-</span>
                <span class="text-nowrap">Since last week</span>
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
                  <span class="h2 font-weight-bold mb-0">{{ $books_count }} pcs</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                    <i class="ni ni-book-bookmark"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm">
                <span class="text-primary mr-2">Rp. {{ number_format($history_paid) }} ,-</span>
                <span class="text-nowrap">This Month</span>
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>