@extends ('templates.frontend.template')

@section('head')
    <title>Send PM</title>
    <link rel="stylesheet" href="/css/frontend/view-pm.css" />
@stop

@section('content')
    <div id="view-pm-container">
        {{--@if($isAuthor)--}}
            {{--<a href="/delete-pm/{{ $pm->pm_id }}" id="delete-pm">Delete this PM</a>--}}
        {{--@endif--}}
        <ul id="list-pm-details">
                <div class="pm-field-name">
                    <span><i class="fa fa-text-width" aria-hidden="true"></i> Subject</span>
                </div>
                <div class="pm-field-box">
                    <p class="pm-fields-content">{{ $pm->pm_title }}</p>
                </div>
            </li>
            <li>
                <div class="pm-field-name">
                    <span><i class="fa fa-calendar" aria-hidden="true"></i> Date</span>
                </div>
                <div class="pm-field-box">
                    <p class="pm-fields-content">{{ $pm->created_at }}</p>
                </div>
            </li>
            <li>
                <div class="pm-field-name">
                    <span><i class="fa fa-plane" aria-hidden="true"></i> To</span>
                </div>
                <div class="pm-user-info-box">
                    <img src="/img/users/{{ $pm_receiver->user_image }}" alt="Receiver User's Image" class="pm-user-image" />
                    <div class="user-info-inner-box">
                        <img src="/img/ranks/{{ $pm_receiver->mainRank[0]->rank_image }}" alt="Receiver User's Rank" class="pm-user-rank" />
                        <p class="pm-username" style="color: #{{ $pm_receiver->mainRank[0]->rank_color }}">{{ $pm_receiver->username }}</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="pm-field-name">
                    <span><i class="fa fa-user" aria-hidden="true"></i> From</span>
                </div>
                <div class="pm-user-info-box">
                    <img src="/img/users/{{ $pm_author->user_image }}" alt="Receiver User's Image" class="pm-user-image" />
                    <div class="user-info-inner-box">
                        <img src="/img/ranks/{{ $pm_author->mainRank[0]->rank_image }}" alt="Receiver User's Rank" class="pm-user-rank" />
                        <p class="pm-username" style="color: #{{ $pm_author->mainRank[0]->rank_color }}">{{ $pm_author->username }}</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="pm-field-name">
                    <span><i class="fa fa-commenting" aria-hidden="true"></i> Message</span>
                </div>
                <div class="pm-field-box">
                    <p class="pm-fields-content">{{ $pm->pm_body }}</p>
                </div>
            </li>
        </ul>
    </div>
@stop

@section('footer')
@stop