@extends ('templates.frontend.template')

@section('head')
    <title>Send PM</title>
    <link rel="stylesheet" href="/css/frontend/view-pm.css" />
@stop

@section('content')
    <div id="view-pm-container">
        @if($isAuthor)
            <a href="/delete-pm/{{ $pm->pm_id }}" id="delete-pm">Delete this PM</a>
        @endif
        <ul id="list-pm-details">
            <li><span>Title: </span> {{ $pm->pm_title }}</li>
            @if($isAuthor)
                <li><span>To:</span> {{ $pm_receiver->username }}
                </li>
                <li><span>From:</span> {{ $pm_author->username }}</li>
            @else
                <li>
                    <span>To:</span> {{ $pm_receiver->username }}
                </li>
                <li><span>From:</span> {{ $pm_author->username }}</li>
            @endif
            <li><span>Date:</span> {{ $pm->created_at }}</li>
            <li><hr id="list-break-line" /></li>
            <li>{{ $pm->pm_body }}</li>
        </ul>
    </div>
@stop

@section('footer')
@stop