@extends ('templates.frontend.template')

@section('head')
    <title>New Password</title>
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

    <div id="auth-div">
        <h2>Join our community</h2>
        <img id="dzp-logo" src="/img/dzp.png" alt="Logo">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#new-password">New Password</a></li>
        </ul>

        <div class="tab-content">
            <div id="new-password" class="tab-pane fade in active">
                <form class="auth-form" action="/new-password" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" name="resetPasswordToken" value="{{ $token }}">

                    <div class="form-group">
                        <div class="fields-group">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            <input class="fields" type="password" name="password" id="new_password">
                            <label class="float-label">New Password</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="fields-group">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            <input class="fields" type="password" name="password_confirmation" id="new_password_confirmation">
                            <label class="float-label">New Password Confirmation</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="auth-button" id="new-password-button" type="submit" value="New Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script src="/js/frontend/auth.js"></script>
@stop