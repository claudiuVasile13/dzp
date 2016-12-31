@extends ('templates.backend.template')

@section('head')
    <title>Roster</title>
    <link rel="stylesheet" href="/css/backend/roster.css" />
@stop

@section('content')
    <div id="roster-container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Roster</li>
        </ol>

        <a href="/admin-panel/roster/add-member" id="add-member-button">Add Member</a>

        {{-- Staff --}}
        <div class="table-responsive">
            <h3 class="section-header">STAFF</h3>
            <table id="staff-table" class="table roster-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Rank</th>
                    <th>GamerRanger ID</th>
                    <th>Joined dZP</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(2 == 1)

                    @else
                        <tr>
                            <td colspan="100%" style="text-align: center">No Members</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Server Admins --}}
        <h3 class="section-header">SERVER ADMINS</h3>
        <div class="table-responsive">
            <table id="server-admins-table" class="table roster-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Rank</th>
                    <th>GamerRanger ID</th>
                    <th>Joined dZP</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(2 == 1)

                    @else
                        <tr>
                            <td colspan="100%" style="text-align: center">No Members</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Clan Members --}}
        <h3 class="section-header">CLAN MEMBERS</h3>
        <div class="table-responsive">
            <table id="members-table" class="table roster-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Rank</th>
                    <th>GamerRanger ID</th>
                    <th>Joined dZP</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(2 == 1)

                    @else
                        <tr>
                            <td colspan="100%" style="text-align: center">No Members</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Retired --}}
        <h3 class="section-header">HONORARY MEMBERS</h3>
        <div class="table-responsive">
            <table id="retired-table" class="table roster-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Rank</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(2 == 1)

                    @else
                        <tr>
                            <td colspan="100%" style="text-align: center">No Members</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
@stop

@section('footer')
@stop

