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
            <li><a data-toggle="tab" href="#ranks-container"><span class="tab-name">Ranks</span></a></li>
        </ul>

        <div class="tab-content">
            <div id="profile-container" class="user-data-container tab-pane fade in active">
                <ul id="profile-data-list">
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Image</p>
                        </div>
                        <div class="field-value-box">
                            <img src="/img/users/{{ $user->user_image }}" alt="User's Image" id="user-image" />
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Username</p>
                        </div>
                        <div class="field-value-box">
                            <p class="field-value">{{ $user->username }}</p>
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Location</p>
                        </div>
                        <div class="field-value-box">
                            <img src="/img/countries/32/{{ $user->country->country_flag }}" alt="Country Image" title="{{ $user->country->country_name }}">
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Gender</p>
                        </div>
                        <div class="field-value-box">
                            <p class="field-value">{{ $user->gender }}</p>
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Reputation</p>
                        </div>
                        <div class="field-value-box">
                            <p class="field-value">{{ $user->reputation }}</p>
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Birthday</p>
                        </div>
                        <div class="field-value-box">
                            <p class="field-value">{{ $user->birthday }}</p>
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Joined Website</p>
                        </div>
                        <div class="field-value-box">
                            <p class="field-value">{{ substr($user->created_at, 0, 10) }}</p>
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Age</p>
                        </div>
                        <div class="field-value-box">
                            <p class="field-value">20</p>
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Job/Hobbies</p>
                        </div>
                        <div class="field-value-box">
                            <p class="field-value">{{ $user->job_hobbies }}</p>
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">GamerRanger ID</p>
                        </div>
                        <div class="field-value-box">
                            <p class="field-value">{{ $user->gameranger_id }}</p>
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Status</p>
                        </div>
                        <div class="field-value-box">
                            <p class="field-value">
                                @if($user->status)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Description</p>
                        </div>
                        <div class="field-value-box">
                            <p class="field-value">{{ $user->description }}</p>
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Email</p>
                        </div>
                        <div class="field-value-box">
                            <p class="field-value">{{ $user->email }}</p>
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Facebook</p>
                        </div>
                        <div class="field-value-box">
                            <p class="field-value">{{ $user->facebook }}</p>
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Twitter</p>
                        </div>
                        <div class="field-value-box">
                            <p class="field-value">{{ $user->twitter }}</p>
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Skype</p>
                        </div>
                        <div class="field-value-box">
                            <p class="field-value">{{ $user->skype }}</p>
                        </div>
                    </li>
                    <li>
                        <div class="field-name-box">
                            <p class="field-name">Signature</p>
                        </div>
                        <div class="field-value-box">
                            @if($user->signature)
                                <img src="/img/signatures/{{ $user->signature }}" alt="User's Signature" id="user-signature" />
                            @else
                                <p class="field-value"></p>
                            @endif
                        </div>
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