<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <header>
            <nav id="navbar">
                <ul>
                    <li><a href="{{route('index')}}">Home</a></li>
                    @auth
                        <li></li>
                    @endauth
                    @guest
                        <li><a href="{{route('login')}}">Sign In</a></li>
                        <li><a href="{{route('register')}}">Sign Up</a></li>
                    @endguest
                </ul>
            </nav>
            @auth
                <p>Welcome, {{$user->first_name}}</p>
                <button>Log Out</button>
            @endauth
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <p>Copyright Language Dojo 2026 &copy;</p>
        </footer>
    </body>
</html>
