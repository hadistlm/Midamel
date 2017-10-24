<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Midamel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{asset('plugins')}}/toastr/toastr.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ route('signup') }}">Register</a>
            </div>

            <div class="content">
                <div class="title m-b-md">
                    Midamel
                </div>

                <div class="links">
                    <p>Find your prefered jobs here based on your major skills, Make sure you find happiness on your selected jobs.</p><br>
                    <h6>- Works hard, Play harder -</h6>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{asset('js')}}/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="{{asset('plugins')}}/toastr/toastr.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }

            @if(Session::has('notice'))
                toastr["success"]("{{Session::get('notice')}}", "Success")
            @endif
        });
    </script>
    </body>
</html>
