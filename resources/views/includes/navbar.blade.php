<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(94, 96, 206);">
    <div class="container-fluid">
        <h1 class="navbar-brand text-white">
            
            Auth Project
        </h1>

        <div class="collapse navbar-collapse" id="navbarNav" style="display:inline-flexbox; justify-content: space-between; ">

            @if(Auth::check())
            <ul class="navbar-nav ml-auto mr-4">
            <li class="nav-item px-5 text-white">
            <img src="{{ asset($data->user_image) }}" alt="Logo" class="rounded-circle" width="50" height="50">
                </li>
                @if ($data->role =="1")

                <li class="nav-item px-5 text-white">
                   Admin
                </li>
                    
                @endif
               
                <li class="nav-item px-5 text-white">
                    {{$data->name}}
                </li>
                <li class="nav-item text-white">
                    {{$data->email}}
                </li>
            </ul>
            @endif

            <ul class="navbar-nav ml-auto">
                @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link navbar-brand text-white " href="{{route('logout-user')}}">Log Out</a>
                </li>
                @endif
                @if(!Auth::check())
                <li class="nav-item px-5">
                    <a class="nav-link navbar-brand text-white" href="{{route('signUp')}}">Sign Up</a>
                </li>
                <li class="nav-item px-5">
                    <a class="nav-link navbar-brand text-white" href="{{route('logIn')}}">Log In</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
