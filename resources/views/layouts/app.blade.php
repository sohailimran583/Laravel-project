<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}" >
        <script src="{{asset('js/app.js')}}"></script>
        <title>@yield('title')</title>

    </head>
    <body>
        <div>
            @if(session('status'))
            <div class="alert alert-success">
            {{session('status')}}
           </div>
            @endif
            <nav class="navbar navbar-expand-lg navbar-light bg-light">

            @guest
            <a class="navbar-brand" href="{{route('login')}}">Login</a>
            <a class="navbar-brand" href="{{route('register')}}">Register</a>
            <a class="navbar-brand" href="{{route('home.contact')}}">Contact</a>
            <a class="navbar-brand" href="{{route('posts.create')}}">Create Post</a>
            <a class="navbar-brand" href="{{route('posts.index')}}">All Posts</a>

            hello guest
            @else
            <a class="navbar-brand" href="{{route('posts.create')}}">Create Post</a>
            <a class="navbar-brand" href="{{route('posts.index')}}">All Posts</a>
            <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout')  }}</a>

            <form id="logout-form" action="{{route('logout')}}"  method="POST" >
                @CSRF
             {{Auth::user()->name}}
             </form>
            @endguest
            </nav>
            @yield('content')
        </div>

    </body>

</html>
