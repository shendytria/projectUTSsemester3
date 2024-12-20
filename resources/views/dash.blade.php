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
        <!-- Promo Banner -->
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding px-3 d-flex align-items-center justify-content-between">
                    <div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">
                                Free 24/7 customer support, updates, and more with this template!
                            </p>
                            <a href="https://www.bootstrapdash.com/product/skydash-admin-template" target="_blank"
                                class="btn me-2 buy-now-btn border-0">
                                Buy Now
                            </a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/skydash-admin-template/">
                            <i class="ti-home me-3 text-white"></i>
                        </a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="ti-close text-white"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar -->
        @include('layout.navbar')

        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            @include('layout.sidebar')

            <!-- Main Content -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Buku</h4>
                    <p class="card-description">Tambahkan buku</p>
                    <form method="POST" class="forms-sample" action="/addbuku">
                        @csrf
                        <!-- Form to Add Buku -->
                        <div class="form-group">
                            <label for="kode">Kode Buku</label>
                            <input type="text" class="form-control" id="kode" name="kode_buku"
                                placeholder="ex : NV-01">
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul Buku</label>
                            <input type="text" class="form-control" id="judul" name="judul_buku"
                                placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" class="form-control" id="pengarang" name="pengarang_buku"
                                placeholder="Nama Pengarang">
                        </div>
                        <div class="form-group">
                            <label for="id_kategori">Kategori</label>
                            <select class="form-control" id="id_kategori" name="id_kategori">
                                @foreach ($kategori as $category)
                                    <option value="{{ $category->id_kategori }}">{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <a href="/buku" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    {{-- @include('layout.footer') --}}

    <!-- JS Plugins -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
    <script src="assets/js/dataTables.select.min.js"></script>

    <!-- JS Template and Custom Scripts -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <script src="assets/js/dashboard.js"></script>
</body>

</html>
