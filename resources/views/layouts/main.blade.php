<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Midamel</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="{{asset('css')}}/style.css" rel="stylesheet">
    <link href="{{asset('css')}}/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="{{asset('plugins')}}/toastr/toastr.min.css" rel="stylesheet">
    <link href="{{asset('plugins')}}/iCheck/skins/square/grey.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins') }}/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @if (Sentinel::check())
                        <a class="navbar-brand" href="{{ route('dashboard') }}">
                            Midamel
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ url('/') }}">
                            Midamel
                        </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Sentinel::check())
                            <li><a href="{{ route('dashboard') }}">Home</a></li>
                            <li><a href="{{ route('profil.show', Sentinel::getUser('id')) }}">Profile</a></li>
                            @if (Sentinel::inRole('admin'))
                                <li><a href="{{ route('user.list') }}">Admin Panel</a></li>
                                <li><a href="{{ route('jobs.index') }}">Jobs Panel</a></li>
                            @endif
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">{{ Sentinel::getUser()->first_name }} <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/signup') }}">Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/script.js"></script>
    <script type="text/javascript" src="{{asset('plugins')}}/toastr/toastr.min.js"></script>
    <script type="text/javascript" src="{{asset('plugins')}}/iCheck/js/icheck.min.js"></script>
    <script type="text/javascript" src="{{ asset('plugins') }}/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            @if(Session::has('notice'))
                toastr["success"]("{{Session::get('notice')}}", "Success")
            @endif

            @if(Session::has('error'))
                toastr["error"]("{{Session::get('error')}}", "Failed")
            @endif

            @if(Session::has('warning'))
                toastr["warning"]("{{Session::get('warning')}}", "Warning!")
            @endif
        });
    </script>
</body>
</html>
