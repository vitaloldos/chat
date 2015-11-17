<!--
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 14.11.15
 * Time: 10:01
 */
 -->
<!DOCTYPE html>
<html>

<head>
    @section('head')
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="author" content="Vitaliy Churakov">
        <!-- Mobile Specific Meta
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Style section
        ================================================== -->
        <link href="{{asset('chat/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('chat/css/user.css')}}" rel="stylesheet">
        <link href="{{asset('chat/css/styles.css')}}" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>


        <script src="{{asset('//code.jquery.com/jquery-1.11.2.min.js')}}"></script>
        <script src="{{asset('//code.jquery.com/jquery-migrate-1.2.1.min.js')}}"></script>
        <script src="{{asset('https://cdn.socket.io/socket.io-1.3.4.js')}}"></script>


        <!--[if lt IE 9]>
        <link href="{{asset('chat/css/rgba-fallback.css')}}" rel="stylesheet">
        <script src="{{asset('chat/js/html5shiv.js')}}"></script>
        <script src="{{asset('chat/js/respond.min.js')}}"></script>
        <![endif]-->

    @show
</head>

<div class="content">
    @if (Session::has('message'))
        <div class="flash alert-info">
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class='flash alert-danger'>
            @foreach ( $errors->all() as $error )
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif


    @yield('content')

</div>

@section('scripts')

    <!-- Script section
        ================================================== -->

    <script src="{{asset('chat/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('chat/js/chart.min.js')}}"></script>
    <script src="{{asset('chat/js/chart-data.js')}}"></script>
    <script src="{{asset('chat/js/easypiechart.js')}}"></script>
    <script src="{{asset('chat/js/easypiechart-data.js')}}"></script>
    <script src="{{asset('chat/js/custom.js')}}"></script>
 {{--   <script>
        window.onload = function(){
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive : true,
                scaleLineColor: "rgba(255,255,255,.2)",
                scaleGridLineColor: "rgba(255,255,255,.05)",
                scaleFontColor: "#ffffff"
            });
            var chart2 = document.getElementById("bar-chart").getContext("2d");
            window.myBar = new Chart(chart2).Bar(barChartData, {
                responsive : true,
                scaleLineColor: "rgba(255,255,255,.2)",
                scaleGridLineColor: "rgba(255,255,255,.05)",
                scaleFontColor: "#ffffff"
            });
            var chart5 = document.getElementById("radar-chart").getContext("2d");
            window.myRadarChart = new Chart(chart5).Radar(radarData, {
                responsive : true,
                scaleLineColor: "rgba(255,255,255,.05)",
                angleLineColor : "rgba(255,255,255,.2)"
            });

        };
    </script>
  --}}
 @show



</html>