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
              href="https://fonts.googleapis.com/css?family=Roboto Condensed|Days One|Chewy|Josefin Sans">
        @yield('head')
        <link rel="stylesheet" href="/css/frontend/template.css">
    </head>
    <body>
        @yield('modal')

        {{-- Top Menu Bar --}}
        <div id="top-bar-div">
            <i class="fa fa-bars" aria-hidden="true" id="menu-button"></i>
            @if(Auth::check())
                <div id="user-box">
                    <p>{{ Auth::user()->username }}</p>
                    <i class="fa fa-sort-desc" aria-hidden="true"></i>
                </div>
                <div id="user-options-box">
                    <i class="fa fa-sort-asc" aria-hidden="true"></i>
                    <a href="/profile/{{ Auth::user()->username }}" id="profile-link"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
                    <a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                </div>
            @else
                <div id="login-btn">
                    <a href="/auth" class="profile-login">Login</a>
                </div>
            @endif
            <div style="clear: both"></div>
        </div>

        {{-- Side Menu Bar --}}
        <div id="side-bar-div" class="hide-side-bar">
            <ul id="menu-ul">
                <li><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                <li><a href="/forum"><i class="fa fa-comments" aria-hidden="true"></i> Forum</a></li>
                <li><a href="/about-us"><i class="fa fa-info-circle" aria-hidden="true"></i> About Us</a></li>
                <li><a href="/roster"><i class="fa fa-list" aria-hidden="true"></i> Roster</a></li>
                <li><a href="/rules"><i class="fa fa-ban" aria-hidden="true"></i> Rules</a></li>
                <li><a href="/servers"><i class="fa fa-server" aria-hidden="true"></i> Servers</a></li>
                <li><a href="/matches"><i class="fa fa-trophy" aria-hidden="true"></i> Matches</a></li>
                <li><a href="/join-us"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Join Us</a></li>
                <li><a href="/contact"><i class="fa fa-envelope" aria-hidden="true"></i> Contact</a></li>
                {{-- Login Required --}}
                @if(Auth::check())
                    <li>
                        <a href="/pm">
                            <i class="fa fa-comment" aria-hidden="true"></i> PM
                            <span class="notifications-number">{{ $pmNotifications }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="/friendship-notifications">
                            <i class="fa fa-bell" aria-hidden="true"></i> Friendship Notifications
                            <span class="notifications-number">{{ $friendshipNotifications }}</span>
                        </a>
                    </li>
                    {{-- Membership Required --}}
                    @if(session()->has('group') && (session('group') === 'member' || session('group') === "admin" || session('group') === "developer"))
                        <li><a href="/conduct-code"><i class="fa fa-university" aria-hidden="true"></i> Conduct Code</a></li>
                    @endif
                @endif
            </ul>
        </div>

        <div id="frontend-container">
            @yield('content')
        </div>

        <div id="footer-div">
            <div id="social-media" class="footer-flex">
                <a href=""><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                <a href=""><i class="fa fa-twitch" id="twitch" aria-hidden="true"></i></a>
            </div>

            <div id="footer-menu" class="footer-flex">
                <a href="#">About</a>
                <a href="#">Cookies</a>
                <a href="#">Privacy</a>
                <a href="#">Policy</a>
                <a href="#">Help</a>
            </div>
            <div id="copyright-div">
                <hr />
                <p>&copy; 2016 dZp. All rights reserved</p>
            </div>
        </div>
        <script src="/js/jquery-3.1.1.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/frontend/template.js"></script>

        @yield('footer')
    </body>
</html>