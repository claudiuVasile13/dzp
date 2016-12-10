@extends ('templates.frontend.template')

@section('head')
    <title>Send PM</title>
    <link rel="stylesheet" href="/css/frontend/send-pm.css" />
@stop

@section('content')
    <div id="send-pm-container">
        <form id="send-pm-form" action="/send-pm" method="post">
            @if(count($errors))
                <div class="div-alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('UserDoesNotExist'))
                <div class="div-alert">
                    <ul>
                        <li class="alert alert-danger">{{ session()->get('UserDoesNotExist') }}</li>
                    </ul>
                </div>
            @endif

            @if(session()->has('CantSendMessageToYourself'))
                <div class="div-alert">
                    <ul>
                        <li class="alert alert-danger">{{ session()->get('CantSendMessageToYourself') }}</li>
                    </ul>
                </div>
            @endif

            {{ csrf_field() }}
            <div class="form-group">
                <label for="username">User</label>
                <input id="username" type="text" name="username" value="{{ $username }}" />
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input id="subject" type="text" name="subject" />
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" type="text" name="message"></textarea>
            </div>
            <div class="form-group">
                <input id="send-pm" type="submit" value="Send PM" />
            </div>
        </form>
    </div>
@stop

@section('footer')
@stop