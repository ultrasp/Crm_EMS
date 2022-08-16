<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <title>Electronic medical card</title>

    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backasset/plugins/fontawesome-free/css/all.min.css')}}">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Tempusdominus Bbootstrap 4 -->
      <link rel="stylesheet" href="{{asset('backasset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
      <!-- SweetAlert2 -->
      <link rel="stylesheet" href="{{asset('backasset')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
      <!-- iCheck -->
      <link rel="stylesheet" href="{{asset('backasset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
      <!-- JQVMap -->
      <link rel="stylesheet" href="{{asset('backasset/plugins/jqvmap/jqvmap.min.css')}}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{asset('backasset/css/adminlte.min.css')}}">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="{{asset('backasset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="{{asset('backasset/plugins/daterangepicker/daterangepicker.css')}}">
      <!-- summernote -->
      <link rel="stylesheet" href="{{asset('backasset/plugins/summernote/summernote-bs4.css')}}">
      <!-- DataTables -->
      <link rel="stylesheet" href="{{asset('backasset')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="{{asset('backasset')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @stack('css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.layout._top_navbar')
        @include('admin.layout._sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-12">
                    @if(\Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ \Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    {{ \Session::forget('success') }}
                    @if(\Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ \Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif

<!--                     <h1 class="m-0 text-dark">Dashboard</h1> -->
                  </div><!-- /.col -->
                  <div class="col-sm-6">
<!--                     <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol> -->
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
            <!-- /.content -->
          </div>

        <footer class="main-footer">
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- jQuery -->
    <script src="{{asset('backasset')}}/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('backasset')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('backasset')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('backasset')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('backasset')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Summernote -->
    <script src="{{asset('backasset')}}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- DataTables -->
    <script src="{{asset('backasset')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('backasset')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('backasset')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('backasset')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="{{asset('backasset')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('backasset')}}/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('backasset')}}/js/demo.js"></script>
    <!-- Save trait js -->
    <script src="{{asset('backasset')}}/js/save-trait.js"></script>
    <script>
      $(function () {
        // Summernote
        $('.summernote').summernote();
        bsCustomFileInput.init()
      })
    </script>

    @stack('js')
</body>
</html>
