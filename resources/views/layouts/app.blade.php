<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>
        @if (trim($__env->yieldContent('title')))
            @yield('title') | {{ config('app.name', 'E-services') }}
        @else
            {{ config('app.name', 'E-services') }}
        @endif
    </title>
    <meta name="theme-color" content="#ffffff">

    <script src="https://jsuites.net/v4/jsuites.js"></script>

    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />

    @stack('before-styles')
    @vite('resources/sass/app.scss')


    @stack('after-styles')

    <link rel="icon" type="image/png" href="{{ asset('img/ensah.png') }}">

    <style>
        .nav-group-items li {
            padding-left: 10px;
        }
        .sidebar-nav{
            background-color: #505abb;
        }.sidebar-nav a {
             font-weight: bold;
         }
         .sidebar{
             background-color: #505abb;
             box-shadow: 0 4px 8px 0 #505abb, 0 6px 20px 0 #505abb;
         }
        .sidebar-brand{
             background :  rgba(0, 0, 0, 0);;
         }

        .nav-group-items .nav-link.active{
           color: black;
        }
        .nav-group-items .nav-link:hover{
            color: #232222;
        }
        .nav-group-items .nav-link{
            color: dimgray;
        }
        .nav-group-items .nav-link .nav-icon{
            color: dimgray;
        }
        .nav-group-items .nav-link:hover .nav-icon{
            color: #232222;
        }


        .nav-group-items .nav-link.active .nav-icon{
            color: #232222;
        }
        .nav-group-items{

            background: white;
            border-radius: 5%;
            width: 95%;
            margin: auto;
            opacity: 90%;
        }

        .page-title{
            color : #505abb;
        }
    </style>

</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                 <use xlink:href="{{ asset('icons/cMFyTi01.svg#full') }}"></use>
            </svg>
            <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="{{ asset('icons/cMFyTi01.svg#signet') }}"></use>
            </svg>
        </div>
        @include($name . '.navigation')
        {{-- @yield('navigation') --}}
        <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 ">
        <!-- Header block -->
        @include('layouts.includes.header')

        <!-- / Header block -->

        <div class="body flex-grow-1 px-3">

                <!-- Errors block -->
                @include('layouts.includes.errors')
                <!-- / Errors block -->
               @yield('content')

        </div>

        <!-- Footer block -->
        @include('layouts.includes.footer')
        <!-- / Footer block -->
    </div>

    <!-- Scripts -->
    @stack('before-scripts')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
   {{-- <script src="{{ mix('js/app.js') }}"></script>--}}
    @vite('resources/js/app.js')

    @stack('after-scripts')
    <!-- / Scripts -->



</body>

</html>
