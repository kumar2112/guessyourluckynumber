<!DOCTYPE html>
<html  lang="en-US">
    <head>
        <title>Guess Your Number- @yield('title')</title>
        <meta charset="UTF-8"/>
        <meta http-equiv="Content-Type" content="application/javascript"; charset="UTF-8" />
      	<meta name="viewport" content="width=device-width, initial-scale=1"/>

        	<link rel="icon" type="image/png" href="{{url('asset/images/icons/favicon.ico')}}"/>

        	<link rel="stylesheet" type="text/css" href="{{url('asset/styles/bootstrap/css/bootstrap.min.css')}}"/>

        	<link rel="stylesheet" type="text/css" href="{{url('asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}"/>

        	<link rel="stylesheet" type="text/css" href="{{url('asset/fonts/iconic/css/material-design-iconic-font.min.css')}}"/>

        	<link rel="stylesheet" type="text/css" href="{{url('asset/styles/animate/animate.css')}}"/>

        	<link rel="stylesheet" type="text/css" href="{{url('asset/css/util.css')}}"/>
        	<link rel="stylesheet" type="text/css" href="{{url('asset/css/main.css')}}"/>

    </head>
    <body>
        <div class="container">
            <a href="">logout</a>
            @yield('content')
        </div>
        <!--===============================================================================================-->
        	<script  type="text/javascript" src="{{url('asset/styles/jquery/jquery-3.2.1.min.js')}}"></script>
        <!--===============================================================================================-->
        	<script type="text/javascript" src="{{url('asset/styles/animsition/js/animsition.min.js')}}"></script>
        <!--===============================================================================================-->
        	<script type="text/javascript" src="{{url('asset/styles/bootstrap/js/popper.js')}}"></script>
        	<script type="text/javascript" src="{{url('asset/styles/bootstrap/js/bootstrap.min.js')}}"></script>
        <!--===============================================================================================-->
        <script type="text/javascript"  src="{{url('asset/js/main.js')}}"></script>
    </body>
</html>
