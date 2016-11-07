<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('backend/img/favicon.png')}}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('backend/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{asset('backend/css/paper-dashboard.css')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('backend/css/demo.css')}}" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('backend/css/themify-icons.css')}}" rel="stylesheet">
	@yield('styles')
</head>
<body>
<div class="wrapper">
    @include('backend.includes.sidebar')
    <div class="main-panel">
        @include('backend.includes.navbar')
.

        @yield('content')



        @include('backend.includes.footer')
    </div>
</div><!--End Wrepper-->
</body>

    <!--   Core JS Files   -->
    <script src="{{asset('backend/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/bootstrap.min.js')}}" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="{{asset('backend/js/bootstrap-checkbox-radio.js')}}"></script>

    <!--  Charts Plugin -->
    <script src="{{asset('backend/js/chartist.min.js')}}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{asset('backend/js/bootstrap-notify.js')}}"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="{{asset('backend/js/paper-dashboard.js')}}"></script>

	@yield('scripts')

</html>
