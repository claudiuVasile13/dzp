<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" type="text/css"
              href="https://fonts.googleapis.com/css?family=Roboto Condensed">
        <link rel="stylesheet" type="text/css"
              href="https://fonts.googleapis.com/css?family=Courgette">
        <link rel="stylesheet" type="text/css"
              href="https://fonts.googleapis.com/css?family=Days One">
        @yield('head')
        <link rel="stylesheet" href="/css/frontend/template.css">
    </head>
    <body>
        @yield('modal')

        {{-- Top Menu Bar --}}
        <div id="top-bar-div">
            <div id="menu-button">
                <div id="toggle-menu-button">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>

        {{-- Side Menu Bar --}}
        <div id="side-bar-div" class="hide-side-bar">
            @if(Auth::check())
                <img id="user-picture" src="/img/users/{{ Auth::user()->picture }}" alt="Logo">
                <h3 id="username-side-menu">{{ Auth::user()->username }}</h3>
                <a href="/profile/{{ Auth::user()->profile_url_key }}" class="profile-login" id="profile-btn">Profile</a>
                <a href="/logout" class="profile-login" id="logout-btn">Logout</a>
            @else
                <a href="/auth" class="profile-login" id="login-btn">Login / Register</a>
            @endif
            <hr>
            <ul id="menu-ul">
                <li><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                <li><a href=""><i class="fa fa-comments" aria-hidden="true"></i> Forum</a></li>
                <li><a href=""><i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a></li>
                <li><a href=""><i class="fa fa-list" aria-hidden="true"></i> Roster</a></li>
                <li><a href=""><i class="fa fa-ban" aria-hidden="true"></i> Rules</a></li>
                <li><a href=""><i class="fa fa-server" aria-hidden="true"></i> Servers</a></li>
                <li><a href=""><i class="fa fa-trophy" aria-hidden="true"></i> Matches</a></li>
                <li><a href=""><i class="fa fa-hand-o-right" aria-hidden="true"></i> Join Us</a></li>
                <li><a href=""><i class="fa fa-envelope" aria-hidden="true"></i> Contact</a></li>
                {{-- Login Required --}}
                @if(Auth::check())
                    <li><a href=""><i class="fa fa-comment" aria-hidden="true"></i> PM</a></li>
                    <li>
                        <a href="">
                            <i class="fa fa-bell" aria-hidden="true"></i> Friendship Notifications
                            <div id="notifications-number">{{ $friendshipNotifications }}</div>
                        </a>
                    </li>
                    {{-- Membership Required --}}
                    @if(Auth::user()->member)
                        <li><a href=""><i class="fa fa-university" aria-hidden="true"></i> Conduct Code</a></li>
                    @endif
                @endif
            </ul>
        </div>

        <div id="frontend-container">
            @yield('content')
        </div>

        <div id="footer-div">
            <div class="social-media flex-item" id="facebook">
                <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            </div>
            <div class="social-media flex-item" id="youtube">
                <a href=""><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
            </div>
            <div class="social-media flex-item" id="twitch">
                <a href=""><i class="fa fa-twitch" aria-hidden="true"></i></a>
            </div>
        </div>
        <div id="copyright-div">
            <p>&copy; 2016 dZp. All rights reserved</p>
        </div>
        <script src="/js/jquery-3.1.1.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/frontend/template.js"></script>

        @yield('footer')
    </body>
</html>