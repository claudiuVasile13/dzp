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
            <img id="profile-picture" src="/img/users/{{ $user->picture }}" alt="Profile Picture">
            <img id="rank-image" src="/img/ranks/guest.png" alt="Group Image">
        </div>

        {{-- User's Details Sections --}}
        <div id="account-details-section">
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
                            <img src="/img/countries/32/ad.png" alt="Country Image" title="Romania">
                        </li>
                        <li>
                            <p class="field-name">Gender :</p>
                            <p class="field-value">Male</p>
                        </li>
                        <li>
                            <p class="field-name">Reputation :</p>
                            <p class="field-value">6</p>
                        </li>
                        <li>
                            <p class="field-name">Birthday :</p>
                            <p class="field-value">1997-10-10</p>
                        </li>
                        <li>
                            <p class="field-name">Joined Website</p>
                            <p class="field-value">2015-09-07</p>
                        </li>
                        <li>
                            <p class="field-name">Age</p>
                            <p class="field-value">20</p>
                        </li>
                        <li>
                            <p class="field-name">Job/Hobbies :</p>
                            <p class="field-value">Male</p>
                        </li>
                        <li>
                            <p class="field-name">GamerRanger ID :</p>
                            <p class="field-value">22123312</p>
                        </li>
                        <li>
                            <p class="field-name">Status</p>
                            <p class="field-value">Active</p>
                        </li>
                        <li>
                            <p class="field-name">Description :</p>
                            <p class="field-value"></p>
                        </li>
                    </ul>
                </div>

                <div id="friends-div" class="tab-pane fade">
                    <div id="flex-friends">
                        <div class="friends-picture-div">
                            <img src="/img/users/default.png" alt="Friend's Picture">
                        </div>

                        <div class="friends-picture-div">
                            <img src="/img/users/default.png" alt="Friend's Picture">
                        </div>

                        <div class="friends-picture-div">
                            <img src="/img/users/default2.jpg" alt="Friend's Picture">
                        </div>
                    </div>
                </div>

                <div id="contact-div" class="tab-pane fade">
                    <ul class="info-list">
                        <li>
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <p class="field-name">Email</p>
                            <p class="field-value">johndoe@gmail.com</p>
                        </li>
                        <li>
                            <img id="skype" src="/img/social-media/skype.png" alt="Skype">
                            <p>john.doe</p>
                        </li>
                        <li>
                            <img class="facebook-twitter" src="/img/social-media/facebook.png" alt="Facebook">
                            <img class="facebook-twitter" src="/img/social-media/twitter.jpg" alt="Twitter">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
@stop