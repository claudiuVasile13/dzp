@extends ('templates.frontend.template')

@section('head')
    <title>Private Messages</title>
    <link rel="stylesheet" href="/css/frontend/pm-notifications.css" />
@stop

@section('content')
    <div id="pm-box">
        @if(session()->has('PrivateMessageSent'))
            <div class="div-alert">
                <ul>
                    <li class="alert alert-success">{{ session()->get('PrivateMessageSent') }}</li>
                </ul>
            </div>
        @endif

        @if(session()->has('PMItIsNotYours'))
            <div class="div-alert">
                <ul>
                    <li class="alert alert-danger">{{ session()->get('PMItIsNotYours') }}</li>
                </ul>
            </div>
        @endif

        @if(session()->has('PMDoesNotExist'))
            <div class="div-alert">
                <ul>
                    <li class="alert alert-danger">{{ session()->get('PMDoesNotExist') }}</li>
                </ul>
            </div>
        @endif

        @if(session()->has('PMDeleted'))
            <div class="div-alert">
                <ul>
                    <li class="alert alert-success">{{ session()->get('PMDeleted') }}</li>
                </ul>
            </div>
        @endif

        <h3>Private Messages</h3>
        <a href="/send-pm" id="send-pm-button">Send PM</a>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#new-list"><span class="tab-name">New</span></a></li>
            <li><a data-toggle="tab" href="#sent-list"><span class="tab-name">Sent</span></a></li>
            <li><a data-toggle="tab" href="#received-list"><span class="tab-name">Received</span></a></li>
        </ul>

        <div class="tab-content">
           {{-- New PM Received List --}}
            <ul id="new-list" class="list-group tab-pane fade active in">
                <h4 class="messages-count">New Messages ({{ count($newPM) }})</h4>
                @if(count($newPM))
                    @foreach($newPM as $message)
                        <li class="list-group-item">
                            <p><strong>To:</strong> {{ $message->username }}</p>
                            <p><strong>Subject:</strong> {{ $message->pm_title }}</p>
                            <a href="/pm/{{ $message->pm_id }}"><i class="fa fa-eye view" aria-hidden="true"></i></a>
                        </li>
                    @endforeach
                @endif
           </ul>

            {{-- Sent PM List --}}
            <ul id="sent-list" class="list-group tab-pane fade">
                <h4 class="messages-count">Sent Messages ({{ count($sentPM) }})</h4>
                @if(count($sentPM))
                    @foreach($sentPM as $message)
                        <li class="list-group-item">
                            <p><strong>To:</strong> {{ $message->username }}</p>
                            <p><strong>Subject:</strong> {{ $message->pm_title }}</p>
                            <a href="/delete-pm/{{ $message->pm_id }}"><i class="fa fa-trash-o delete" aria-hidden="true"></i></a>
                            <a href="/pm/{{ $message->pm_id }}"><i class="fa fa-eye view" aria-hidden="true"></i></a>
                        </li>
                    @endforeach
                @endif
            </ul>

            {{-- Received PM List --}}
            <ul id="received-list" class="list-group tab-pane fade">
                <h4 class="messages-count">Received Messages ({{ count($receivedPM) }})</h4>
                @if(count($receivedPM))
                    @foreach($receivedPM as $message)
                        <li class="list-group-item">
                            <p><strong>To:</strong> {{ $message->username }}</p>
                            <p><strong>Subject:</strong> {{ $message->pm_title }}</p>
                            <a href="/pm/{{ $message->pm_id }}"><i class="fa fa-eye view" aria-hidden="true"></i></a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@stop

@section('footer')
@stop