<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{__("Blog")}}</title>
        <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/vendors/aos/aos.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/loader.js')}}"></script>
    </head>
    <body>
    {{--<div class="edica-loader"></div>--}}
        <header class="edica-header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="edicaMainNav">
                        <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route("post.index")}}">{{__("Home")}} <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route("categories.index")}}">{{__("Categories")}} <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link" href="{{route("new.index")}}">{{__("News")}} <span class="sr-only">(current)</span></a>
                            </li>

                            @auth()
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route("profile.index")}}"  aria-haspopup="true" aria-expanded="false">{{__("Profile")}}</a>
                                </li>
                            @endauth
                        </ul>
                        @guest()
                        <ul class="navbar-nav mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route("login")}}">{{__("Login")}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route("register")}}">{{__("Register")}}</a>
                            </li>
                        </ul>
                        @endguest
                    </div>
                </nav>
            </div>
        </header>
        @yield('content')

    </body>
    <footer>
        <div class="container">
            <div class="footer-bottom-content">
                <p class="mb-0">© Blog. 2020. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendors/aos/aos.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
</html>
