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

        <h3>Private Messages</h3>
        <a href="/send-pm" id="send-pm-button">Send PM</a>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#new-list"><span class="tab-name">New</span></a></li>
            <li><a data-toggle="tab" href="#sent-list"><span class="tab-name">Sent</span></a></li>
            <li><a data-toggle="tab" href="#received-list"><span class="tab-name">Received</span></a></li>
        </ul>

        <div class="tab-content">
           {{-- New PM Received List --}}
            <ul id="new-list" class="list-group tab-pane fade">

           </ul>

            {{-- Sent PM List --}}
            <ul id="sent-list" class="list-group tab-pane fade">
                @if(count($sentPM))
                    @foreach($sentPM as $message)
                        <li class="list-group-item">
                            <p><strong>To:</strong> {{ $message->username }}</p>
                            <p><strong>Subject:</strong> {{ $message->pm_title }}</p>
                            <a href="#"><i class="fa fa-trash-o" aria-hidden="true" id="delete"></i></a>
                            <a href="#"><i class="fa fa-eye" aria-hidden="true" id="view"></i></a>
                        </li>
                    @endforeach
                @endif
            </ul>

            {{-- Received PM List --}}
            <ul id="received-list" class="list-group tab-pane fade">

            </ul>
        </div>
    </div>
@stop

@section('footer')
@stop