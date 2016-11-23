@extends ('templates.frontend.template')

@section('head')
    <title>Profile</title>
    <link rel="stylesheet" href="/css/frontend/profile.css">
@stop

@section('modal')
    {{-- Edit Profile Modal --}}
    <div id="editProfileModal" class="modal fade modal-fix" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Profile</h3>
                </div>
                <div class="modal-body">
                    <form id="edit-profile-form" action="" method="post">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend>Profile</legend>
                            <div class="form-group">
                                <label class="edit-profile-label" for="edit_country"><i class="fa fa-globe" aria-hidden="true"></i> Select country</label>
                                <select class="form-control" id="edit_country" name="country">
                                    <option value="">Select a country ...</option>
                                    @if(count($countries))
                                        @foreach($countries as $country)
                                            <option value="{{ $country->country_id }}"
                                                    @if($user->country->country_name === $country->country_name)
                                                    selected="selected"
                                                    @endif>
                                                {{ $country->country_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="edit-profile-label" for="edit_gender"><i class="fa fa-venus-mars" aria-hidden="true"></i> Select gender</label>
                                <select class="form-control" id="edit_gender" name="gender">
                                    <option value="">Select a gender ...</option>
                                    <option value="Male"
                                            @if($user->gender === 'Male')
                                            selected="selected"
                                            @endif>
                                        Male
                                    </option>
                                    <option value="Female"
                                            @if($user->gender === 'Female')
                                            selected="selected"
                                            @endif>
                                        Female
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="edit-profile-label"><i class="fa fa-user-circle" aria-hidden="true"></i> Username</label>
                                <input class="edit-profile-field" type="text" name="username" id="edit_username" value="{{ $user->username }}" />
                            </div>
                            <div class="form-group">
                                <label class="edit-profile-label"><i class="fa fa-birthday-cake" aria-hidden="true"></i> Birthday</label>
                                <input class="edit-profile-field" type="text" name="birthday" id="edit_birthday" value="{{ $user->birthday }}" />
                            </div>
                            <div class="form-group">
                                <label class="edit-profile-label"><i class="fa fa-list-alt" aria-hidden="true"></i> Job/Hobbies</label>
                                <textarea class="edit-profile-field" type="text" name="job_hobbies" id="edit_job_hobbies">{{ $user->job_hobbies }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="edit-profile-label"><i class="fa fa-gamepad" aria-hidden="true"></i> Gameranger ID</label>
                                <input class="edit-profile-field" type="text" name="gameranger_id" id="edit_gameranger_id" value="{{ $user->gameranger_id }}" />
                            </div>
                            <div class="form-group">
                                <label class="edit-profile-label"><i class="fa fa-cog" aria-hidden="true"></i> Status</label>
                                <select class="form-control" id="edit_status" name="status">
                                    <option value="">Select a status ...</option>
                                    <option value="1"
                                            @if($user->status === 1)
                                            selected="selected"
                                            @endif>
                                        Active
                                    </option>
                                    <option value="0"
                                            @if($user->status === '0')
                                            selected="selected"
                                            @endif>
                                        Inactive
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="edit-profile-label"><i class="fa fa-commenting" aria-hidden="true"></i> Description</label>
                                <textarea class="edit-profile-field" type="text" name="description" id="edit_description">{{ $user->description }}</textarea>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Contact</legend>
                            <div class="form-group">
                                <label class="edit-profile-label"><i class="fa fa-envelope" aria-hidden="true"></i> Email</label>
                                <input class="edit-profile-field" type="text" name="email" id="edit_email" value="{{ $user->email }}" />
                            </div>
                            <div class="form-group">
                                <label class="edit-profile-label"><i class="fa fa-skype" aria-hidden="true"></i> Skype</label>
                                <input class="edit-profile-field" type="text" name="skype" id="edit_skype" value="{{ $user->skype }}" />
                            </div>
                            <div class="form-group">
                                <label class="edit-profile-label"><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</label>
                                <input class="edit-profile-field" type="text" name="facebook" id="edit_facebook" value="{{ $user->facebook }}" />
                            </div>
                            <div class="form-group">
                                <label class="edit-profile-label"><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter</label>
                                <input class="edit-profile-field" type="text" name="twitter" id="edit_twitter" value="{{ $user->twitter }}" />
                            </div>
                        </fieldset>

                        <div class="form-group">
                            <input id="edit-profile-submit" type="submit" value="Save Changes">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                    <button class="pull-right" id="edit-profile-button" data-toggle="modal" data-target="#editProfileModal">Edit Profile</button>
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
                        <fieldset>
                            <legend>Change your password</legend>
                            <label for="current-password" class="change-password-label">Current Password</label>
                            <input type="password" id="current-password" class="change-password-input" name="current_password" /><br /><br />
                            <label for="new-password" class="change-password-label">New Password</label>
                            <input type="password" id="new-password" class="change-password-input" name="password" /><br /><br />
                            <label for="new-password-confirmation" class="change-password-label">New Password Confirmation</label>
                            <input type="password" id="new-password-confirmation" class="change-password-input" name="password_confirmation" />
                            <br /><br />
                            <input type="submit" value="Save" id="change-password-submit" />
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
@stop