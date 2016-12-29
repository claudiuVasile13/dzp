@extends ('templates.backend.template')

@section('head')
    <title>Users</title>
    <link rel="stylesheet" href="/css/backend/users.css" />
@stop

@section('content')
    <div id="users-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Users</li>
        </ol>

        @if(session()->has('UserDoesNotExist'))
            <div class="div-alert">
                <ul>
                    <li class="alert alert-danger">{{ session()->get('UserDoesNotExist') }}</li>
                </ul>
            </div>
        @endif

        @if(session()->has('EditProfileSuccess'))
            <div class="div-alert">
                <ul>
                    <li class="alert alert-success">{{ session()->get('EditProfileSuccess') }}</li>
                </ul>
            </div>
        @endif

        <div class="table-responsive">
            <table id="users-table" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->user_id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <a href="/admin-panel/users/view/{{ $user->user_id }}" class="view-user action-button" title="View {{ $user->username }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="/admin-panel/users/edit/{{ $user->user_id }}" class="edit-user action-button" title="Edit {{ $user->username }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="" class="delete-user action-button" title="Delete {{ $user->username }}"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $users->links() }}
        </div>
    </div>
@stop

@section('footer')
@stop