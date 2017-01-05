@extends ('templates.backend.template')

@section('head')
    <title>Ranks</title>
    <link rel="stylesheet" href="/css/backend/ranks.css" />
@stop

@section('content')
    <div id="ranks-container">
        {{--<ol class="breadcrumb">--}}
            {{--<li class="breadcrumb-item">Rank</li>--}}
        {{--</ol>--}}

        @if(session()->has('RankDoesNotExist'))
            <div class="div-alert">
                <ul>
                    <li class="alert alert-danger">{{ session()->get('RankDoesNotExist') }}</li>
                </ul>
            </div>
        @endif

        <a href="/admin-panel/ranks/add" id="add-rank-button">Add Rank</a>

        {{-- Staff --}}
        <div class="table-responsive">
            <table id="ranks-table" class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($ranks))
                        @foreach($ranks as $rank)
                            <tr>
                                <td style="color: {{ $rank->rank_color }}">{{ $rank->rank_name }}</td>
                                <td><img src="/img/ranks/{{ $rank->rank_image }}" alt="Rank's Image" /></td>
                                <td>
                                    <a href="/admin-panel/ranks/edit/{{ $rank->rank_id }}" class="edit-rank action-button" title="Edit {{ $rank->rank_name }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="" class="delete-rank action-button" title="Delete {{ $rank->rank_name }}">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="100%" style="text-align: center">No Ranks</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('footer')
@stop

