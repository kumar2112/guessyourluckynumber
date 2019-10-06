<html>
    <head>
        <title>Guess Your Number- @yield('title')</title>
        <meta charset="UTF-8">
      	<meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        	<link rel="icon" type="image/png" href="{{url('assets/images/icons/favicon.ico')}}"/>
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="{{url('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="{{url('assets/fonts/iconic/css/material-design-iconic-font.min.css')}}">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="{{url('assets/vendor/animate/animate.css')}}">
        <!--===============================================================================================-->
        	<link rel="stylesheet" type="text/css" href="{{url('assets/css/util.css')}}">
        	<link rel="stylesheet" type="text/css" href="{{url('assets/css/main.css')}}">
        <!--===============================================================================================-->
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <!--===============================================================================================-->
        	<script src="{{url('assets/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
        <!--===============================================================================================-->
        	<script src="{{url('assets/vendor/animsition/js/animsition.min.js')}}"></script>
        <!--===============================================================================================-->
        	<script src="{{url('assets/vendor/bootstrap/js/popper.js')}}"></script>
        	<script src="{{url('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <!--===============================================================================================-->
                <script src="{{url('assets/js/main.js')}}"></script>
    </body>
</html>
