<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/frontend/template.css">
        <link rel="stylesheet" type="text/css"
              href="https://fonts.googleapis.com/css?family=Roboto Condensed|Days One|Chewy|Josefin Sans">
        @yield('head')
    </head>

    <body>
        @yield('modal')

        {{-- Top Menu Bar --}}
        <div id="top-bar-div">
            <i class="fa fa-bars" aria-hidden="true" id="menu-button"></i>
            @if(Auth::check())
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> {{ Auth::user()->username }}
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/profile/{{ Auth::user()->username }}"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <div id="login-btn">
                    <a href="/auth" class="profile-login">Login</a>
                </div>
            @endif
            <div style="clear: both"></div>
        </div>

        {{-- Side Menu Bar --}}
        <div id="side-bar-div" class="hide-side-bar">
            @if(session()->has('group') && (session('group') === "admin" || session('group') === "developer"))
                <a href="/admin-panel" id="admin-panel-button">Admin Panel</a>
            @endif
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
                            <i class="fa fa-bell notification-bell" aria-hidden="true"></i>
                            <span class="notifications-number">{{ $pmNotifications }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="/friendship-notifications">
                            <i class="fa fa-bell" aria-hidden="true"></i> Friendship Notifications
                            <i class="fa fa-bell notification-bell" aria-hidden="true"></i>
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