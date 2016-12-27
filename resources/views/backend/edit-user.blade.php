@extends ('templates.backend.template')

@section('head')
    <title>Edit User</title>
    <link rel="stylesheet" href="/css/backend/edit-user.css" />
@stop

@section('content')
    <div id="view-user-container">
        <form id="edit-profile-form" action="/admin-panel/users/edit/{{ $user->user_id }}" method="post">
            {{ csrf_field() }}
            <div class="form-group" id="submit-box">
                <input id="edit-profile-submit" type="submit" value="Save Changes">
            </div>
            <ul class="nav nav-tabs" id="tabs">
                <li class="active"><a data-toggle="tab" href="#profile-container"><span class="tab-name">Profile</span></a></li>
                <li><a data-toggle="tab" href="#friends-container"><span class="tab-name">Friends</span></a></li>
                <li><a data-toggle="tab" href="#pm-container"><span class="tab-name">PM</span></a></li>
                <li><a data-toggle="tab" href="#ranks-container"><span class="tab-name">Ranks</span></a></li>
            </ul>

            <div class="tab-content">
                <div id="profile-container" class="user-data-container tab-pane fade in active">
                    <div class="profile-data-box">
                        <h3 class="profile-data-box-title">Profile</h3>
                        <div class="form-group">
                            <label class="edit-profile-field"><i class="fa fa-picture-o" aria-hidden="true"></i> Change Image</label>
                            <input type="file" name="image" id="change_image" />
                        </div>
                        <div class="form-group">
                            <label class="edit-profile-label" for="edit_country"><i class="fa fa-globe" aria-hidden="true"></i> Select country</label>
                            <select class="form-control" id="edit_country" name="country">
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
                            <input class="edit-profile-field" type="date" name="birthday" id="edit_birthday" value="{{ $user->birthday }}" />
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
                            <label class="edit-profile-label"><i class="fa fa-users" aria-hidden="true"></i> Group</label>
                            <select class="form-control" id="edit_status" name="group">
                                @foreach($groups as $group)
                                    <option value="{{ $group->group_id }}"
                                            @if($group->group_id === $user['group']->group_id)
                                            selected="selected"
                                            @endif>
                                        {{ $group->group_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="edit-profile-label"><i class="fa fa-commenting" aria-hidden="true"></i> Description</label>
                            <textarea class="edit-profile-field" type="text" name="description" id="edit_description">{{ $user->description }}</textarea>
                        </div>
                    </div>

                    <div class="profile-data-box">
                        <h3 class="profile-data-box-title">Change password</h3>
                        <div class="form-group">
                            <label for="new-password" class="change-password-label">New Password</label>
                            <input type="password" id="new-password" class="change-password-input" name="password" />
                        </div>
                        <div class="form-group">
                            <label for="new-password-confirmation" class="change-password-label">New Password Confirmation</label>
                            <input type="password" id="new-password-confirmation" class="change-password-input" name="password_confirmation" />
                        </div>
                    </div>

                    <div class="profile-data-box">
                        <h3 class="profile-data-box-title">Contact</h3>
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
                    </div>
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
                                        <p class="friend-username" style="color: {{ $friend->rank_color }};">{{ $friend->username }}</p>
                                        <img class="friend-rank" src="/img/ranks/{{ $friend->rank_image }}" alt="Friend's Rank">
                                        <br />
                                        <input type="checkbox" name="remove-friends[]" value="{{ $friend->user_id }}" />
                                        <label>Remove Friend</label>
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
        </form>
    </div>
@stop

@section('footer')
@stop