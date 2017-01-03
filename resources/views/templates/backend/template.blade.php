<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" href="/css/app.css" />
        <link href="/css/backend/template.css" rel="stylesheet" />
        <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css"
              href="https://fonts.googleapis.com/css?family=Roboto Condensed|Days One|Chewy|Josefin Sans" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        @yield('head')
    </head>

    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/admin-panel">dZp Admin Panel</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->username }} <b
                                    class="caret"></b></a>
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
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li>
                            <a href="/admin-panel"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="/admin-panel/users"><i class="fa fa-users" aria-hidden="true"></i> Users</a>
                        </li>
                        <li>
                            <a href="/admin-panel/ranks"><i class="fa fa-circle" aria-hidden="true"></i> Ranks</a>
                        </li>
                        <li>
                            <a href="/admin-panel/roster"><i class="fa fa-list" aria-hidden="true"></i> Roster</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-file-text" aria-hidden="true"></i> Pages Content</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-comments" aria-hidden="true"></i> Forum</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-commenting" aria-hidden="true"></i> Live Chat</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">
                @yield('content')
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->

        <script src="/js/jquery-3.1.1.min.js"></script>
        <script src="/js/app.js"></script>
        @yield('footer')
    </body>
</html>