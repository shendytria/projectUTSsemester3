<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
@include('layout.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding px-3 d-flex align-items-center justify-content-between">
            <div>
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/skydash-admin-template" target="_blank" class="btn me-2 buy-now-btn border-0">Buy Now</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/skydash-admin-template/"><i class="ti-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="ti-close text-white"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_navbar.html -->

@include('layout.navbar')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->

@include('layout.sidebar')

        <!-- partial -->
        <div class="container">
            <h2>Edit Menu</h2>

            <form action="{{ route('menu.update', $menu->menu_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="menu_name" class="form-label">Menu Name</label>
                    <input type="text" class="form-control" id="menu_name" name="menu_name" value="{{ $menu->menu_name }}" required>
                </div>
                <div class="mb-3">
                    <label for="menu_link" class="form-label">Menu Link</label>
                    <input type="text" class="form-control" id="menu_link" name="menu_link" value="{{ $menu->menu_link }}">
                </div>
                <div class="mb-3">
                    <label for="menu_icon" class="form-label">Menu Icon</label>
                    <input type="text" class="form-control" id="menu_icon" name="menu_icon" value="{{ $menu->menu_icon }}">
                </div>
                {{-- <div class="mb-3">
                    <label for="parent_id" class="form-label">Parent ID</label>
                    <input type="text" class="form-control" id="parent_id" name="parent_id" value="{{ $menu->parent_id }}">
                </div> --}}
                <button type="submit" class="btn btn-primary">Update Menu</button>
            </form>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->

{{-- @include('layout.footer') --}}

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
     <!-- plugins:js -->
     <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
     <!-- Plugin js for this page -->
     <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
     <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
     <script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
     <script src="{{ asset('assets/js/dataTables.select.min.js') }}"></script>
     <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
  </body>
</html>




