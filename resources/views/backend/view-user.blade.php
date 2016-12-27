@extends ('templates.backend.template')

@section('head')
    <title>View User</title>
    <link rel="stylesheet" href="/css/backend/view-user.css" />
@stop

@section('content')
    <div id="view-user-container">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#profile-container"><span class="tab-name">Profile</span></a></li>
            <li><a data-toggle="tab" href="#friends-container"><span class="tab-name">Friends</span></a></li>
            <li><a data-toggle="tab" href="#pm-container"><span class="tab-name">PM</span></a></li>
            <li><a data-toggle="tab" href="#group-container"><span class="tab-name">Group</span></a></li>
            <li><a data-toggle="tab" href="#ranks-container"><span class="tab-name">Ranks</span></a></li>
        </ul>

        <div class="tab-content">
            <div id="profile-container" class="user-data-container tab-pane fade in active">
                <ul id="profile-data-list">
                    <li>
                        <p class="field-name">Location</p>
                        <img src="/img/countries/32/{{ $user->country->country_flag }}" alt="Country Image" title="{{ $user->country->country_name }}">
                    </li>
                    <li>
                        <p class="field-name">Gender</p>
                        <p class="field-value">{{ $user->gender }}</p>
                    </li>
                    <li>
                        <p class="field-name">Reputation</p>
                        <p class="field-value">{{ $user->reputation }}</p>
                    </li>
                    <li>
                        <p class="field-name">Birthday</p>
                        <p class="field-value">{{ $user->birthday }}</p>
                    </li>
                    <li>
                        <p class="field-name">Joined Website</p>
                        <p class="field-value">{{ substr($user->created_at, 0, 10) }}</p>
                    </li>
                    <li>
                        <p class="field-name">Age</p>
                        <p class="field-value">20</p>
                    </li>
                    <li>
                        <p class="field-name">Job/Hobbies</p>
                        <p class="field-value">{{ $user->job_hobbies }}</p>
                    </li>
                    <li>
                        <p class="field-name">GamerRanger ID</p>
                        <p class="field-value">{{ $user->gameranger_id }}</p>
                    </li>
                    <li>
                        <p class="field-name">Status</p>
                        <p class="field-value">
                            @if($user->status)
                                Active
                            @else
                                Inactive
                            @endif
                        </p>
                    </li>
                    <li>
                        <p class="field-name">Description</p>
                        <p class="field-value">{{ $user->description }}</p>
                    </li>
                </ul>
            </div>

            <div id="friends-container" class="user-data-container tab-pane fade">
                @if(count($user['friends']))
                    <ul id="friends-list">
                        @foreach($user['friends'] as $friend)
                            <li>
                                <a class="pull-left" href="/profile/{{ $friend->username }}" title="{{ $friend->username }}">
                                    <img src="/img/users/{{ $friend->user_image }}" alt="Friend's Image" />
                                </a>
                                <div class="pull-right" class="buttons-container">
                                    <img class="friend-rank" src="/img/ranks/{{ $friend->rank_image }}" alt="Friend's Rank">
                                    <br />
                                    <p class="user-username" style="color: {{ $friend->rank_color }};">{{ $friend->username }}</p>
                                </div>
                                <div style="clear:both;"></div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div id="pm-container" class="user-data-container tab-pane fade">
                <ul id="pm-list" class="list-group">
                    @if(count($user['sent_pm']))
                        @foreach($user['sent_pm'] as $message)
                            <li class="list-group-item">
                                <p><strong>To:</strong> {{ $message->username }}</p>
                                <p><strong>Subject:</strong> {{ $message->pm_title }}</p>
                                <a pm-id="/admin-panel/pm/delete/{{ $message->pm_id }}" id="delete-pm-button"><i class="fa fa-times delete-pm" aria-hidden="true"></i></a>
                                <a href="/admin-panel/pm/view/{{ $message->pm_id }}"><i class="fa fa-eye view-pm" aria-hidden="true"></i></a>
                            </li>
                        @endforeach
                    @endif

                    @if(count($user['received_pm']))
                        @foreach($user['received_pm'] as $message)
                            <li class="list-group-item">
                                <p><strong>To:</strong> {{ $message->username }}</p>
                                <p><strong>Subject:</strong> {{ $message->pm_title }}</p>
                                <a pm-id="/admin-panel/pm/delete/{{ $message->pm_id }}" id="delete-pm-button"><i class="fa fa-times delete-pm" aria-hidden="true"></i></a>
                                <a href="/admin-panel/pm/view/{{ $message->pm_id }}"><i class="fa fa-eye view-pm" aria-hidden="true"></i></a>
                            </li>
                        @endforeach
                    @endif

                    @if(count($user['new_pm']))
                        @foreach($user['new_pm'] as $message)
                            <li class="list-group-item">
                                <p><strong>To:</strong> {{ $message->username }}</p>
                                <p><strong>Subject:</strong> {{ $message->pm_title }}</p>
                                <a pm-id="/admin-panel/pm/delete/{{ $message->pm_id }}" id="delete-pm-button"><i class="fa fa-times delete-pm" aria-hidden="true"></i></a>
                                <a href="/admin-panel/pm/view/{{ $message->pm_id }}"><i class="fa fa-eye view-pm" aria-hidden="true"></i></a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>

            <div id="group-container" class="user-data-container tab-pane fade">
                <h4>Group: <strong>{{ $user['group']->group_name }}</strong></h4>
            </div>

            <div id="ranks-container" class="user-data-container tab-pane fade">
                <div class="table-responsive">
                    <table class="table" id="ranks-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Main</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($user['ranks']))
                                @foreach($user['ranks'] as $rank)
                                    <tr>
                                        <td style="color: {{ $rank->rank_color }}"><strong>{{ $rank->rank_name }}</strong></td>
                                        <td><img src="/img/ranks/{{ $rank->rank_image }}" alt="Rank's Image" /></td>
                                        <td>
                                            @if($rank->rank_id === $user['mainRank'][0]->rank_id)
                                                <span class="main-rank-yes"><strong>Yes</strong></span>
                                            @else
                                                <span class="main-rank-no"><strong>No</strong></span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
@stop