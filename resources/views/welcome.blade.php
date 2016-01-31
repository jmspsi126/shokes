@extends('app')



@section('content')


    <link href='http://fonts.googleapis.com/css?family=Raleway:200,300' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <style>
        input:-webkit-autofill {
            -webkit-box-shadow:0 0 0 50px white inset; /* Change the color to your own background color */
            -webkit-text-fill-color: black;
        }

        input:-webkit-autofill:focus {
            -webkit-box-shadow: /*your box-shadow*/,0 0 0 50px white inset;
            -webkit-text-fill-color: #333;
        }
    </style>

    <div class="row" style="color:#8C8A8A;margin-top:1%;margin-right:5%;text-align:right">
        <h6>Don't you have an account? <a href="{{ url('/auth/register') }}"><b>Register now with Invitation Code</b></a>
        </h6>
    </div>

    <div class="container-fluid" style="color:rgb(231, 223, 220);margin-top: -1%;text-align: right;padding-top:5%;">


        <div class="row">
            <div class="col-xs-12" style="text-align:center;">
                <h1 style="font-family:Raleway;font-size:xxx-large;color:#8C8A8A;">Shokse</h1>
            </div>
        </div>
        <div class="row" style="margin-bottom:1%">
            <div class="col-xs-12" style="text-align:center">
                <h3 style="text-transform: uppercase;font-size: small;font-weight:100;color:#CCCCCC;">
                   Work on what like not what you need
                </h3>
            </div>
        </div>
        <?php if (Auth::check()) {?>
        <div class="col-md-4 col-md-offset-4" style="text-align: center">Congratulations {{Auth::user()->name }}! You are logged in!</div>
        <div class="col-md-4 col-md-offset-4" style="text-align: center"><a class="btn btn-primary" href="{{ url('/auth/logout') }}">Logout</a></div>
        <?php } else { ?>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}" id="loginform">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="col-xs-4 col-xs-offset-4">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email"
                       autofocus=""
                       style="margin-bottom: 1%;height:50px">
            </div>
            <div class="col-xs-4 col-xs-offset-4" style="margin-bottom:2%">
                <input type="password" id="inputEmail" class="form-control" placeholder="Password" name="password"
                       autofocus=""
                       style="height:50px;margin-bottom: 1%">
            </div>


            <div class="col-xs-2 col-xs-offset-4" style="text-align:auto">
                <h6 style="color:#8C8A8A;margin-top:13%">Forget my password?</h6>
            </div>

            <div class="col-xs-2" style="text-align: center;color: aliceblue;;opacity: 0.7;">
                <button type="submit" class="btn  btn-primary" style="height: 60px;width:100%">Log In</button>
            </div>
        </form>
        <?php } ?>
    </div>

    <div style = "height:100px;width:100%;position:absolute;bottom:0;background-color:rgb(248, 248, 248);text-align:center;padding-top:2%">
        <footer style = "font-weight:700">@2015 Shokes Inc</footer>
        <p>Customer Policy</p>
    </div>

@endsection

