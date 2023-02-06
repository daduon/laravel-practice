<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>User Role and Permission</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/css/sb-admin-2.min.css') !!}" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
      @include('layouts.partials.slidebar')
        <div id="content-wrapper" class="d-flex flex-column">
          <div id="content">
              @include('layouts.partials.navbar')
              <div class="container-fluid">
                <main class="container">
                  @yield('content')
                </main>
              </div>
          </div>
          <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                      <span>Copyright &copy; Your Website 2021</span>
                  </div>
              </div>
          </footer>
      </div>
    </div>

    {{-- scroll top --}}
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('layouts.partials.modal')


    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="{!! url('assets/vendor/jquery/jquery.min.js') !!}"></script>
    <script src="{!! url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{!! url('assets/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{!! url('assets/js/sb-admin-2.min.js') !!}"></script>

    <!-- Page level plugins -->
    <script src="{!! url('assets/vendor/chart.js/Chart.min.js') !!}"></script>

    <!-- Page level custom scripts -->
    <script src="{!! url('assets/js/demo/chart-area-demo.js') !!}"></script>
    <script src="{!! url('assets/js/demo/chart-pie-demo.js') !!}"></script>
  </body>
</html>
