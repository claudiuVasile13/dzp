@extends ('templates.frontend.template')

@section('head')
    <title>Profile</title>
    <link rel="stylesheet" href="/css/frontend/profile.css">
@stop

@section('content')
    {{-- User's Account Details --}}
    <div id="account-container">
        @if(count($errors))
            <br><br>
            <div class="div-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            @if(session()->has('IncorrectPassword'))
                <br><br>
                <div class="div-alert">
                    <ul>
                        <li class="alert alert-danger">{{ session()->get('IncorrectPassword') }}</li>
                    </ul>
                </div>
            @endif

            @if(session()->has('NewPassword'))
                <br><br>
                <div class="div-alert">
                    <ul>
                        <li class="alert alert-success">{{ session()->get('NewPassword') }}</li>
                    </ul>
                </div>
            @endif

        {{-- User's Avatar Section --}}
        <div id="profile-picture-section">
            <img id="rank-image" src="/img/ranks/{{ $user->rank }}" alt="Group Image"><br>
            <img id="profile-picture" src="/img/users/{{ $user->picture }}" alt="Profile Picture"><br>
            @if($isAccountOwner)
                <button id="change-profile-picture">Change Image</button>
            @endif
        </div>

        {{-- User's Details Sections --}}
        <div id="account-details-section">
            <div id="username-div">
                <h3 id="username">{{ $user->username }}</h3>
                @if($isAccountOwner)
                    <button class="pull-right" id="edit-profile-button">Edit Profile</button>
                @endif
                <div style="clear: both"></div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#profile-div">
                        <i class="fa fa-user tab-icon" aria-hidden="true"></i>
                        <span class="tab-name">Profile</span>
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#friends-div">
                        <i class="fa fa-users tab-icon" aria-hidden="true"></i>
                        <span class="tab-name">Friends</span>
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#contact-div">
                        <i class="fa fa-envelope tab-icon" aria-hidden="true"></i>
                        <span class="tab-name">Contact</span>
                    </a>
                </li>
                @if($isAccountOwner)
                    <li>
                        <a data-toggle="tab" href="#change-password-div">
                            <i class="fa fa-key tab-icon" aria-hidden="true"></i>
                            <span class="tab-name">Password</span>
                        </a>
                    </li>
                @endif
            </ul>

            <div class="tab-content">
                {{-- Profile Tab --}}
                <div id="profile-div" class="tab-pane fade in active">
                    <ul class="info-list">
                        <li>
                            <p class="field-name">Location :</p>
                            <img src="/img/countries/32/{{ $user->country->country_flag }}" alt="Country Image" title="{{ $user->country->country_name }}">
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

                {{-- Friends Tab --}}
                <div id="friends-div" class="tab-pane fade">
                    <div id="flex-friends">
                        <h3>0 Friends</h3>
                    </div>
                </div>

                {{-- Contact Tab --}}
                <div id="contact-div" class="tab-pane fade">
                    <ul class="info-list">
                        <li>
                            <img class="media-logos" src="/img/social-media/email.png" alt="Email" title="Email">
                            <p class="field-value">{{ $user->email }}</p>
                        </li>
                        <li>
                            <img class="media-logos" src="/img/social-media/skype.png" alt="Skype" title="Skype">
                            @if($user->skype)
                                <p>{{ $user->skype }}</p>
                            @endif
                        </li>
                        <li>
                            <img class="media-logos" src="/img/social-media/fb.png" alt="Facebook" title="Facebook">
                            @if($user->facebook)
                                <img class="facebook-twitter" src="/img/social-media/facebook.png" alt="Facebook">
                            @endif
                        </li>
                        <li>
                            <img class="media-logos" src="/img/social-media/tw.png" alt="Twitter" title="Twitter">
                            @if($user->twitter)
                                <img class="facebook-twitter" src="/img/social-media/twitter.jpg" alt="Twitter">
                            @endif
                        </li>
                    </ul>
                </div>

                {{-- Change Password Tab --}}
                <div id="change-password-div" class="tab-pane fade">
                    <form id="change-password-form" action="/changePassword" method="post">
                        {{ csrf_field() }}
                        <h3 id="change-password-title">Change your password</h3>
                        <label for="current-password" class="change-password-label">Current Password</label>
                        <input type="password" id="current-password" class="change-password-input" name="current_password" /><br /><br />
                        <label for="new-password" class="change-password-label">New Password</label>
                        <input type="password" id="new-password" class="change-password-input" name="password" /><br /><br />
                        <label for="new-password-confirmation" class="change-password-label">New Password Confirmation</label>
                        <input type="password" id="new-password-confirmation" class="change-password-input" name="password_confirmation" />
                        <br /><br />
                        <input type="submit" value="Save" id="change-password-submit" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
@stop