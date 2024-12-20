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
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Edit User</h3>
                </div>
                <div class="card-body">
                  <form action="{{ route('users.update', $data->user_id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" value="{{ $data->email }}"
                                    placeholder="Enter email">
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleInputEmail1">Nama User</label>
                                <input type="text" name="nama_user" class="form-control" id="exampleInputEmail1" value="{{ $data->nama_user }}"
                                    placeholder="Nama User">
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" value="{{ $data->username }}"
                                    placeholder="Username">
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleInputEmail1">No HP</label>
                                <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" value="{{ $data->no_hp }}"
                                    placeholder="08554xxxx">
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleFormControlSelect1">ID Jenis User</label>
                                <select class="form-control" name="status_user" id="exampleFormControlSelect1">
                                    <option value="1" {{ $data->status_user == 1 ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ $data->status_user == 2 ? 'selected' : '' }}>User</option>
                                    <option value="3" {{ $data->status_user == 3 ? 'selected' : '' }}>Dosen</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
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


