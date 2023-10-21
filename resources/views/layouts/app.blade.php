<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('css')
        @yield('profileCSS')
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            
<div class="container">
            <br>
           @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            @if(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
            @endif
            @yield('content');
        </div>
            <!-- Page Content -->
            <main style="margin-top:20px;">
                <div class="container mr-lg-1">
                    <div class="row">
                        <div class="col-4">
                            <ul class="list-group p-2 bg-light border">
                                @if(auth()->user()->isAdmin())
                                    <li class="list-group-item">
                                        <a href="{{ route('users.index') }}">Users</a>
                                    </li>
                                @endif
                                <li class="list-group-item">
                                    <a href="{{ route('posts.index') }}">Posts</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('categories.index') }}">Categories</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('tags.index') }}">Tags</a>
                                </li>
                            </ul>
                            <ul class="list-group p-2 bg-opacity-20 mt-3 border border-dark">
                                <li class="list-group-item">
                                    <a href="{{ route('trashed-posts.index') }}">Trashed Posts</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="col-8">
                            <div class="bg-white shadow">
                                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                    {{ $header }}
                                </div>
                                   {{ $slot }}
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                
            </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
       
        

  <!--Footer-->
  <footer class="page-footer text-center text-md-left pt-4">
 
    <hr>
    <!--Call to action-->
    <div class="call-to-action text-center my-4">
      <ul class="list-unstyled list-inline">
        <li class="list-inline-item">
          <h5>See The Blog</h5>
        </li>
        <li class="list-inline-item"><a href="{{ route('blog.index') }}" class="btn btn-primary">TheSass</a></li>
      </ul>
    </div>
    <!--/.Call to action-->

    <hr>

    

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        © 2022 Copyright: <a href="https://github.com/Abdallah-SE"> Abdallah Mahmoud (GitHub) </a>

      </div>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

</body>

        </body>
</html>
