@extends ('templates.frontend.template')

@section('head')
    <title>Send PM</title>
    <link rel="stylesheet" href="/css/frontend/view-pm.css" />
@stop

@section('content')
    <div id="view-pm-container">
        @if($isAuthor)
            {{--<a href="/delete-pm/{{ $pm->pm_id }}" id="delete-pm">Delete this PM</a>--}}
            <ul id="pm-list">
                <li>
                    <div class="pm-field-name-box">
                        <span class="pm-field-name">Subject</span>
                    </div>
                    <div class="pm-field-value-box">
                        <span class="pm-field-value">{{ $pm->pm_title }}</span>
                    </div>
                </li>
                <li>
                    <div class="pm-field-name-box">
                        <span class="pm-field-name">Date</span>
                    </div>
                    <div class="pm-field-value-box">
                        <span class="pm-field-value">{{ $pm->created_at }}</span>
                    </div>
                </li>
                <li>
                    <div class="pm-field-name-box">
                        <span class="pm-field-name">To</span>
                    </div>
                    <div class="pm-field-value-box">
                        <img class="pm-user-image" src="/img/users/{{ $pm_receiver->user_image }}" alt="User's Image" />
                        <div class="pm-user-info-box">
                            <img class="pm-user-rank" src="/img/ranks/{{ $pm_receiver->mainRank[0]->rank_image }}" alt="User's Rank" />
                            <span class="pm-username">{{ $pm_receiver->username }}</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="pm-field-name-box">
                        <span class="pm-field-name">Message</span>
                    </div>
                    <div class="pm-field-value-box">
                        <span class="pm-body">{{ $pm->pm_body }}</span>
                    </div>
                </li>
            </ul>
        @else
            <ul id="pm-list">
                <li>
                    <div class="pm-field-name-box">
                        <span class="pm-field-name">Subject</span>
                    </div>
                    <div class="pm-field-value-box">
                        <span class="pm-field-value">{{ $pm->pm_title }}</span>
                    </div>
                </li>
                <li>
                    <div class="pm-field-name-box">
                        <span class="pm-field-name">Date</span>
                    </div>
                    <div class="pm-field-value-box">
                        <span class="pm-field-value">{{ $pm->created_at }}</span>
                    </div>
                </li>
                <li>
                    <div class="pm-field-name-box">
                        <span class="pm-field-name">From</span>
                    </div>
                    <div class="pm-field-value-box">
                        <img class="pm-user-image" src="/img/users/{{ $pm_author->user_image }}" alt="User's Image" />
                        <div class="pm-user-info-box">
                            <img class="pm-user-rank" src="/img/ranks/{{ $pm_author->mainRank[0]->rank_image }}" alt="User's Rank" />
                            <span class="pm-username">{{ $pm_author->username }}</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="pm-field-name-box">
                        <span class="pm-field-name">Message</span>
                    </div>
                    <div class="pm-field-value-box">
                        <span class="pm-field-value">{{ $pm->pm_body }}</span>
                    </div>
                </li>
            </ul>
        @endif

    </div>
@stop

@section('footer')
@stop