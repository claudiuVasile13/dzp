@extends ('templates.frontend.template')

@section('head')
    <title>Reset Password</title>
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

    @if(session()->has('WrongEmail'))
        <br><br>
        <div class="div-alert">
            <ul>
                <li class="alert alert-danger">{{ session()->get('WrongEmail') }}</li>
            </ul>
        </div>
    @endif

    @if(session()->has('ResetPasswordEmail'))
        <br><br>
        <div class="div-alert">
            <ul>
                <li class="alert alert-success">{{ session()->get('ResetPasswordEmail') }}</li>
            </ul>
        </div>
    @endif

    <div id="auth-div">
        <h2>Join our community</h2>
        <img id="dzp-logo" src="/img/dzp.png" alt="Logo">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#password-reset">Reset Password</a></li>
        </ul>

        <div class="tab-content">
            <div id="reset-password" class="tab-pane fade in active">
                <form class="auth-form" action="/reset-password" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="fields-group">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <input class="fields" type="text" name="email" id="reset_password_email" value="{{ old('email') }}">
                            <label class="float-label">Email</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="auth-button" id="reset-password-button" type="submit" value="Reset Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script src="/js/frontend/auth.js"></script>
@stop