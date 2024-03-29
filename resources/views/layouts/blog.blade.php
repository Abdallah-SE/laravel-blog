
 <!-- The header -->
@yield('header')


 <!-- Main Content -->
@yield('content')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
        @yield('title')
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png')}}">
    <link rel="icon" href="{{ asset('img/favicon.png')}}">
  </head>

  <body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="{{ route('blog.index')}}">
            <img class="logo-dark" src="{{ asset('img/logo-dark.png') }}" alt="logo">
            <img class="logo-light" src="{{ asset('img/logo-light.png') }}" alt="logo">
          </a>
        </div>

          @if(Auth::user() && Auth::user()->role ==='admin')
          <a class="text-white" href="{{ route('dashboard') }}">Admin Panel</a>
          @else
          <a class="btn btn-xs btn-round btn-success" href="{{route("dashboard")}}">Login</a>
          @endif
        

      </div>
    </nav><!-- /.navbar -->

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-6 col-lg-3">
            <a href="{{ route('blog.index') }}"><img src="{{ asset('img/logo-dark.png') }}" alt="logo"></a>
          </div>

           
          <div class="col-lg-6"> <hr style="background-color: red;margin-top: 1rem;
  margin-bottom: 1rem;
  border: 0;
  border-top: 1px solid rgba(0, 0, 0, 0.1);"/>
            <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
                <strong>Copyright © 2022 | Abdallah Mahmoud | All Rights reserverd.</strong>
            </div>
          </div>
        </div>
      </div>
    </footer><!-- /.footer -->
    <!-- Scripts -->
    <script src="{{ asset('js/page.min.js')}}"></script>
    <script src="{{ asset('js/script.js')}}"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-62652f06deb0258d"></script>

  </body>
</html>
