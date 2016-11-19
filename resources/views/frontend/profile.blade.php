@extends ('templates.frontend.template')

@section('head')
    <title>Profile</title>
    <link rel="stylesheet" href="/css/frontend/profile.css">
@stop

@section('content')
    {{-- User's Account Details --}}
    <div id="account-container">
        {{-- User's Avatar Section --}}
        <div id="profile-picture-section">
            <img id="rank-image" src="/img/ranks/guest.png" alt="Group Image"><br>
            <img id="profile-picture" src="/img/users/{{ $user->picture }}" alt="Profile Picture"><br>
            <button id="change-profile-picture">Change Image</button>
        </div>

        {{-- User's Details Sections --}}
        <div id="account-details-section">
            <div id="username-div">
                <h3 id="username">{{ $user->username }}</h3>
                <button class="pull-right" id="edit-profile-button">Edit Profile</button>
                <div style="clear: both"></div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#profile-div">Profile</a></li>
                <li><a data-toggle="tab" href="#friends-div">Friends</a></li>
                <li><a data-toggle="tab" href="#contact-div">Contact</a></li>
            </ul>

            <div class="tab-content">
                <div id="profile-div" class="tab-pane fade in active">
                    <ul class="info-list">
                        <li>
                            <p class="field-name">Location :</p>
                            <img src="/img/countries/32/{{ $country->country_flag }}" alt="Country Image" title="{{ $country->country_name }}">
                        </li>
                        <li>
                            <p class="field-name">Gender :</p>
                            <p class="field-value">{{ $user->gender }}</p>
                        </li>
                        <li>
                            <p class="field-name">Reputation :</p>
                            <p class="field-value">{{ $user->reputation }}</p>
                        </li>
                        <li>
                            <p class="field-name">Birthday :</p>
                            <p class="field-value">{{ $user->birthday }}</p>
                        </li>
                        <li>
                            <p class="field-name">Joined Website :</p>
                            <p class="field-value">{{ substr($user->created_at, 0, 10) }}</p>
                        </li>
                        <li>
                            <p class="field-name">Age :</p>
                            <p class="field-value">20</p>
                        </li>
                        <li>
                            <p class="field-name">Job/Hobbies :</p>
                            <p class="field-value">{{ $user->job_hobbies }}</p>
                        </li>
                        <li>
                            <p class="field-name">GamerRanger ID :</p>
                            <p class="field-value">{{ $user->gameranger_id }}</p>
                        </li>
                        <li>
                            <p class="field-name">Status :</p>
                            <p class="field-value">
                                @if($user->status)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </p>
                        </li>
                        <li>
                            <p class="field-name">Description :</p>
                            <p class="field-value">{{ $user->description }}</p>
                        </li>
                    </ul>
                </div>

                <div id="friends-div" class="tab-pane fade">
                    <div id="flex-friends">
                        <h3>0 Friends</h3>
                    </div>
                </div>

                <div id="contact-div" class="tab-pane fade">
                    <ul class="info-list">
                        <li>
                            <img class="media-logos" src="/img/social-media/email.png" alt="Email">
                            <p class="field-value">{{ $user->email }}</p>
                        </li>
                        <li>
                            <img class="media-logos" src="/img/social-media/skype.png" alt="Skype">
                            @if($user->skype)
                                <p>{{ $user->skype }}</p>
                            @endif
                        </li>
                        <li>
                            <img class="media-logos" src="/img/social-media/fb.png" alt="Facebook">
                            @if($user->facebook)
                                <img class="facebook-twitter" src="/img/social-media/facebook.png" alt="Facebook">
                            @endif
                        </li>
                        <li>
                            <img class="media-logos" src="/img/social-media/tw.png" alt="Twitter">
                            @if($user->twitter)
                                <img class="facebook-twitter" src="/img/social-media/twitter.jpg" alt="Twitter">
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
@stop