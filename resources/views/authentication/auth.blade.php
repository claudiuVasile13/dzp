@extends ('templates.frontend.template')

@section('head')
    <link rel="stylesheet" href="/css/frontend/auth.css">
@stop

@section('content')
    <div id="auth-div">
        <h2>Join our community</h2>
        <img id="dzp-logo" src="/img/dzp.png" alt="Logo">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
            <li><a data-toggle="tab" href="#register">Register</a></li>
        </ul>

        <div class="tab-content">
            <div id="login" class="tab-pane fade in active">
                <form class="auth-form" action="" method="post">
                    <div class="form-group">
                        <div class="fields-group">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <input class="fields" type="text" name="email" id="login_email">
                            <label class="float-label">Email</label>
                            <div id="clear"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fields-group">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            <input class="fields" type="password" name="password" id="login_password">
                            <label class="float-label">Password</label>
                            <div id="clear"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="auth-button" id="login-button" type="submit" value="Login">
                        <a href="" id="forgot-pass-link">Forgot password?</a>
                        <div id="clear"></div>
                    </div>
                </form>
            </div>

            <div id="register" class="tab-pane fade">
                <form class="auth-form" action="" method="post">
                    <div class="form-group">
                        <div class="fields-group">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <input class="fields" type="text" name="email" id="register_email">
                            <label class="float-label">Email</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fields-group">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <input class="fields" type="text" name="username" id="register_username">
                            <label class="float-label">Username</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fields-group">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            <input class="fields" type="password" name="password" id="register_password">
                            <label class="float-label">Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fields-group">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            <input class="fields" type="password" name="re_password" id="register_re_password">
                            <label class="float-label">Re-Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        <label class="dropdown-label" for="register_country">Select country</label>
                        <select class="form-control" id="register_country">
                            <option value="0">Select a country ...</option>
                            @if(count($countries))
                                @foreach($countries as $country)
                                    <option value="{{ $country->country_id }}">{{ $country->country_name  }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-venus-mars" aria-hidden="true"></i>
                        <label class="dropdown-label" for="register_gender">Select gender</label>
                        <select class="form-control" id="register_gender">
                            <option value="0">Select a gender ...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="auth-button" id="register-button" type="submit" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script src="/js/frontend/auth.js"></script>
@stop