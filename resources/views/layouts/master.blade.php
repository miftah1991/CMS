<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>سیستم ثپت قراردادها</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->

    <link rel="stylesheet" href="{{asset('public/css/bootstrap-theme.css')}} ">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="{{asset('public/css/rtl.css')}} ">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('public/Ionicons/css/ionicons.min.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href=" {{asset('public/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href=" {{asset('public/tables/datatables.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/css/AdminLTE.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('public/css/skins/_all-skins.min.css')}}">

    <script src="{{asset('public/tables/jquery.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/my.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/select2/css/select2.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

    <![endif]-->

    <!-- Google Font -->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   @include('layouts.header')
    <!-- right side column. contains the logo and sidebar -->
   @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="container">
@yield('content')
        <!-- /.content -->
        </div>

    </div>
    <!-- /.content-wrapper -->
       @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<!-- Bootstrap 3.3.7 -->
<script type="text/javascript" charset="utf8" src="{{asset('public/tables/datatables.js') }}"></script>


<script src="{{asset('public/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/js/adminlte.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('public/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap  -->
<script src="{{asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('public/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/Chart.js/Chart.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/js/demo.js')}}"></script>
<script type="text/javascript" charset="utf8" src="{{asset('public/select2/js/select2.js') }}"></script>
</body>
</html>
