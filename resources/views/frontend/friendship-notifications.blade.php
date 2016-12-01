@extends ('templates.frontend.template')

@section('head')
    <title>Friendship Notifications</title>
    <link rel="stylesheet" href="/css/frontend/friendship-notifications.css">
@stop

@section('content')
    <div id="notifications-box">
        <h3>Friendship Notifications ({{ $friendshipNotifications }})</h3>
        <ul id="notifications-list" class="list-group">
            @if(count($friendshipNotifications))
                @foreach($friendshipNotificationsSenders as $friendshipNotificationSender)
                    <li class="list-group-item">
                        <a href="/profile/{{ $friendshipNotificationSender->profile_url_key }}" class="pull-left" title="{{ $friendshipNotificationSender->username }}">
                            <img src="/img/users/{{ $friendshipNotificationSender->picture }}" alt="User's Photo" />
                        </a>
                        <div id="notification-response-box">
                            <button class="notification-response-button" id="accept-button"><a href="">Accept</a></button>
                            <br />
                            <button class="notification-response-button" id="decline-button"><a href="">Decline</a></button>
                        </div>
                        <div style="clear: both"></div>
                    </li>
                @endforeach
            @else
                <li class="list-group-item">You have no friendship requests</li>
            @endif
        </ul>
    </div>
@stop

@section('footer')
@stop