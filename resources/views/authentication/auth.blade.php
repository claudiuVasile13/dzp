@extends ('templates.frontend.template')

@section('head')
    <title>Authentication</title>
    <link rel="stylesheet" href="/css/frontend/auth.css">
@stop

@section('content')
    @if(count($errors))
        <br><br>
        <div class="div-alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('activateAccountMessage'))
        <br><br>
        <div class="div-alert">
            <ul>
                <li class="alert alert-success">{{ session()->get('activateAccountMessage') }}</li>
            </ul>
        </div>
    @endif

    @if(session()->has('activateAccountSuccess'))
        <br><br>
        <div class="div-alert">
            <ul>
                <li class="alert alert-success">{{ session()->get('activateAccountSuccess') }}</li>
            </ul>
        </div>
    @endif

    @if(session()->has('activateAccountError'))
        <br><br>
        <div class="div-alert">
            <ul>
                <li class="alert alert-danger">{{ session()->get('activateAccountError') }}</li>
            </ul>
        </div>
    @endif

    @if(session()->has('WrongCredentials'))
        <br><br>
        <div class="div-alert">
            <ul>
                <li class="alert alert-danger">{{ session()->get('WrongCredentials') }}</li>
            </ul>
        </div>
    @endif

    @if(session()->has('ActivationRequired'))
        <br><br>
        <div class="div-alert">
            <ul>
                <li class="alert alert-danger">{{ session()->get('ActivationRequired') }} <a href="/resend-activation">Resend Activation Email</a></li>
            </ul>
        </div>
    @endif

    @if(session()->has('AccountNotFound'))
        <br><br>
        <div class="div-alert">
            <ul>
                <li class="alert alert-danger">{{ session()->get('AccountNotFound') }}</li>
            </ul>
        </div>
    @endif

    @if(session()->has('newPasswordSuccess'))
        <br><br>
        <div class="div-alert">
            <ul>
                <li class="alert alert-success">{{ session()->get('newPasswordSuccess') }}</li>
            </ul>
        </div>
    @endif

    <div id="auth-div">
        <h2>Join our community</h2>
        <img id="dzp-logo" src="/img/dzp.png" alt="Logo">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
            <li><a data-toggle="tab" href="#register">Register</a></li>
        </ul>

        <div class="tab-content">
            <div id="login" class="tab-pane fade in active">
                <form class="auth-form" action="/login" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="fields-group">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <input class="fields" type="text" name="username" id="login_username" value="{{ old('username') }}">
                            <label class="float-label">Username</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fields-group">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            <input class="fields" type="password" name="password" id="login_password">
                            <label class="float-label">Password</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="auth-button" id="login-button" type="submit" value="Login">
                        <a href="/reset-password" id="forgot-pass-link">Forgot password?</a>
                        <div id="clear"></div>
                    </div>
                </form>
            </div>

            <div id="register" class="tab-pane fade">
                <form class="auth-form" action="/register" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="fields-group">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <input class="fields" type="text" name="email" id="register_email" value="{{ old('email') }}">
                            <label class="float-label">Email</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fields-group">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <input class="fields" type="text" name="username" id="register_username" value="{{ old('username') }}">
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
                            <input class="fields" type="password" name="password_confirmation" id="register_password_confirmation">
                            <label class="float-label">Password Confirmation</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        <label class="dropdown-label" for="register_country">Select country</label>
                        <select class="form-control" id="register_country" name="country">
                            <option value="">Select a country ...</option>
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
                        <select class="form-control" id="register_gender" name="gender">
                            <option value="">Select a gender ...</option>
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