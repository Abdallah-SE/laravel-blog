<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            <div class="d-flex">
                <div class="p-2">
                    
                </div>
                <div class="m1-auto p-2">
                    
                </div>
            </div>
            
        </h2>
       
          <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight text-xl">My Profile</div>
            
          </div>
        <div class=" card text-primary">
            <div class="card card-header">
                <h1 style="display: inline-block">
                    {{ Auth::user()->name }}</h1>
            </div>
            <div class="card-body">
                <div class="container page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center inner-conatiner">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0" id='profile_content'>
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white ">
                                <div class="m-b-25 text-center"> <img width="50px" height="50px" style="margin-left: 57px;border-radius: 50%;" src="{{ Gravatar::get(Auth::user()->email, ['size'=>50]);  }}" class="img-radius" alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600">{{ Auth::user()->name }}</h6>
                                <p>{{ Auth::user()->role }}</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                           <div class="card-footer text-center">
                <form method="POST" action="{{ route('users.index', Auth::user()->id) }}">
                    <button style="float: right;" class="btn btn-info">Update Now</button>
                </form>
            </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400">{{ Auth::user()->email }}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400">-</h6>
                                    </div>
                                </div>
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">About
                                    
                                        
                                </h6>
                                <h6 class="text-muted f-w-400">{{ Auth::user()->about }}</h6>
                                <br><hr><br><div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Recent</p>
                                        <h6 class="text-muted f-w-400">Some important info</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Most Viewed</p>
                                        <h6 class="text-muted f-w-400">Who are you!</h6>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
            
            <div class="card-footer text-center">
                <form method="POST" action="">
                    <button style="float: right;" class="btn btn-info btn-lg">My GitHub</button>
                </form>
            </div>
        </div>
        
    
    </x-slot>
    
    
       
 
    @section('profileCSS')
    <link href="{{ URL::asset('css/profileCSS.css') }}" rel="stylesheet">
    @endsection
</x-app-layout>

