@include('link')
<style>

body {
            margin: 0;
            padding: 0;
        }

        a.navbar-brand {
            float: left;
            height: 50px;
            padding: 15px 15px;
            font-size: 18px;
            line-height: 20px;
            text-decoration: none;
            color: orangered;
            font-family: cursive;
            font-weight: 700;

        }

        nav.main-navigation {
            position: relative;
        }

        nav.main-navigation ul.nav-list {
            margin: 0;
            padding: 0;
            list-style: none;
            position: relative;
            text-align: right;
        }

        .nav-list li.nav-list-item {
            display: inline-block;
            line-height: 40px;
            margin-left: 30px;
            margin-top: 15px;
        }

        a.nav-link {
            text-decoration: none;
            font-size: 18px;
            font-family: sans-serif;
            font-weight: 500;
            cursor: pointer;
            position: relative;
            color: #404040;
        }

        @keyframes FadeIn {
            0% {
                opacity: 0;
                -webkit-transition-duration: 0.8s;
                transition-duration: 0.8s;
                -webkit-transform: translateY(-10px);
                -ms-transform: translateY(-10px);
                transform: translateY(-10px);
            }


            100% {
                opacity: 1;
                -webkit-transform: translateY(0);
                -ms-transform: translateY(0);
                transform: translateY(0);
                pointer-events: auto;
                transition: cubic-bezier(0.4, 0, 0.2, 1);
            }
        }

        .nav-list li {
            animation: FadeIn 1s cubic-bezier(0.65, 0.05, 0.36, 1);
            animation-fill-mode: both;
        }

        .nav-list li:nth-child(1) {
            animation-delay: .3s;
        }

        .nav-list li:nth-child(2) {
            animation-delay: .6s;
        }

        .nav-list li:nth-child(3) {
            animation-delay: .9s;
        }

        .nav-list li:nth-child(4) {
            animation-delay: 1.2s;
        }

        .nav-list li:nth-child(5) {
            animation-delay: 1.5s;
        }

        /* Animation */

        @keyframes fadeInUp {
            from {
                transform: translate3d(0, 40px, 0)
            }

            to {
                transform: translate3d(0, 0, 0);
                opacity: 1
            }
        }

        @-webkit-keyframes fadeInUp {
            from {
                transform: translate3d(0, 40px, 0)
            }

            to {
                transform: translate3d(0, 0, 0);
                opacity: 1
            }
        }

        .animated {
            animation-duration: 1s;
            animation-fill-mode: both;
            -webkit-animation-duration: 1s;
            -webkit-animation-fill-mode: both
        }

        .animatedFadeInUp {
            opacity: 0
        }

        .fadeInUp {
            opacity: 0;
            animation-name: fadeInUp;
            -webkit-animation-name: fadeInUp;
        }

#nav1 {
  font-weight: bolder;
  text-decoration-color: blue;
  color:darkblue;
}

</style>

<head>
    <title>Driver DashBoard | Carpool</title>
</head>

<header>
  <nav class="main-navigation navbar-expand-sm navbar-dark" style="background-color:rgb(221, 221, 11); padding-top:10px; padding-bottom:25px;">
    <div class="navbar-header  bg-light animated fadeInUp" style="pad">
        <a class="navbar-brand" href="{{ route('dashboard') }}"> <img src="/img/logo/logo.png" style=" margin-top:0px; margin-left: 10px;" width="120px;" alt=""></a>
    </div>
    <ul class="nav-list">
        <li class="nav-list-item">
            <a class="nav-link" style="color:green; font-weight:bold;" href="{{ route('driver.index') }}">HOME</a>
        </li>
        <li class="nav-list-item">
            <a class="nav-link" style="color:green; font-weight:bold;" href="{{ route('event.create') }}">Create Event</a>
        </li>
        <li class="nav-list-item">
            <a class="nav-link" style="color:green; font-weight:bold;" href="{{ route('event.bookings') }}">See Bookings</a>
        </li>

        <li class="nav-list-item">
            <a class="nav-link" style="color:green; font-weight:bold;" href="{{ route('driverquery') }}">Queries</a>
        </li>

        <li class="nav-list-item">
            <a class="nav-link" style="color:green; font-weight:bold;" href="{{ route('driverreporting') }}">Report Concerns</a>
        </li>
        <li class="nav-list-item">
        <a class="nav-link" style="color:black; font-weight:bold;">Hi! {{Auth::user()->name}}</a>
        </li>
        <li class="nav-list-item">
            <a class="button nav-link btn-primary" style="color:white; font-weight:bold; margin-right:15px;" href="{{ route('logout') }}">Logout</a>
        </li>
    </ul>

</nav>
</header>