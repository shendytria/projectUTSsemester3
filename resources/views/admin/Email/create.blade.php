<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding px-3 d-flex align-items-center justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates,
                                and more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/skydash-admin-template" target="_blank"
                                class="btn me-2 buy-now-btn border-0">Buy Now</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/skydash-admin-template/"><i
                                class="ti-home me-3 text-white"></i></a>
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

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Send Email</h4>
                            <form action="{{ url('/email/send') }}" method="POST">
                                @csrf
                                <!-- Input Subject -->
                                <div class="form-group">
                                    <label for="subject">Subjek:</label>
                                    <input type="text" name="subject" class="form-control"
                                        value="" required>
                                    @error('subject')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Input Email Tujuan -->
                                <div class="form-group">
                                    <label for="to">Kirim ke:</label>
                                    <select name="to" id="" class="form-select">
                                      <option value="">Pilih User</option>
                                      @foreach ($users as $item)
                                          <option value="{{ $item->id }}">{{ $item->email }}</option>
                                      @endforeach
                                    </select>
                                    {{-- <input type="email" name="to" class="form-control"
                                        value="{{ old('to') }}" required> --}}
                                    @error('to')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Input Pesan -->
                                <div class="form-group">
                                    <label for="message_text">Pesan:</label>
                                    <textarea name="message_text" class="form-control" rows="5" required>{{ old('message_text') }}</textarea>
                                    @error('message_text')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Tombol Kirim -->
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Kirim Email</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

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
