@extends ('templates.frontend.template')

@section('head')
    <title>Private Messages</title>
    <link rel="stylesheet" href="/css/frontend/pm-notifications.css" />
@stop

@section('content')
    <div id="pm-box">
        <h3>Private Messages</h3>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#new-list">New</a></li>
            <li><a data-toggle="tab" href="#sent-list">Sent</a></li>
            <li><a data-toggle="tab" href="#received-list">Received</a></li>
        </ul>

        <div class="tab-content">
           {{-- New PM Received List --}}
            <ul id="new-list">

           </ul>

            {{-- Sent PM List --}}
            <ul id="sent-list">

            </ul>

            {{-- Received PM List --}}
            <ul id="received-list">

            </ul>
        </div>
    </div>
@stop

@section('footer')
@stop