<header>
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 text-sm">
                    <div class="site-info" style="color: #A1AAA7">
                        <span class="mai-call text-primary"></span> +880 018 627 017 17
                        <span class="divider">|</span>
                        <a href="mailto:mdroshannafiz@gmail.com" target="_blank"><span class="mai-mail text-primary"></span> mdroshannafiz@gmail.com</a>
                    </div>
                </div>
                <div class="col-sm-4 text-right text-sm">
                    <div class="social-mini-button">
                        <a href="#"><span class="mai-logo-facebook-f"></span></a>
                        <a href="#"><span class="mai-logo-twitter"></span></a>
                        <a href="#"><span class="mai-logo-dribbble"></span></a>
                        <a href="#"><span class="mai-logo-instagram"></span></a>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"><span class="text-primary">One</span>-Health</a>

            <div class="input-group input-navbar">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                </div>
                <input type="text" onfocus="showSearchResult()" onblur="hideSearchResult()" class="form-control"
                       id="search" placeholder="Doctors ..." aria-label="Username"
                       aria-describedby="icon-addon1">
                <div id="suggestDoctor"
                     style="position: absolute; top: 60px; left: 0px; z-index: 21; width: 785px; border-radius: 5px; background: #fffefe">
                </div>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupport">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }} {{ request()->is('home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item {{ request()->is('about-us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/about-us') }}">About Us</a>
                    </li>
                    <li class="nav-item {{ request()->is('our-doctor') ? 'active' : '' }} {{ 'doctor-details/'.request()->route('id') == request()->path() ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/our-doctor') }}">Doctors</a>
                    </li>
                    <li class="nav-item {{ request()->is('news') ? 'active' : '' }} {{ 'blog-details/'.request()->route('id') == request()->path() ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/news') }}">News</a>
                    </li>
                    <li class="nav-item {{ request()->is('contact-us') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/contact-us') }}">Contact</a>
                    </li>

                    @if(Route::has('login'))

                        @auth
                            <li class="nav-item">
                                <a style="background: #00D9A5 !important; color: white" class="nav-link"
                                   href="{{ url('/my-appointment') }}">My Appointment</a>
                            </li>
                            <x-app-layout>

                            </x-app-layout>
                        @else

                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
                            </li>

                        @endauth
                    @endif

                </ul>
            </div> <!-- .navbar-collapse -->
        </div> <!-- .container -->
    </nav>
</header>
<script>
    function showSearchResult() {
        $('#suggestDoctor').slideDown()
    }

    function hideSearchResult() {
        $('#suggestDoctor').slideUp()
    }
</script>
