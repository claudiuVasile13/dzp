@extends ('templates.backend.template')

@section('head')
    <title>Edit Rank</title>
    <link rel="stylesheet" href="/css/backend/edit-rank.css" />
@stop

@section('content')
    <div id="edit-rank-container">

        @if(session()->has('RankDoesNotExist'))
            <div class="div-alert">
                <ul>
                    <li class="alert alert-danger">{{ session()->get('RankDoesNotExist') }}</li>
                </ul>
            </div>
        @endif

        <div id="rank-edit-info-box">
            <form action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h3>Edit Rank's Info</h3>
                <div class="form-group">
                    <label for="#rank-name">Rank Name</label>
                    <input type="text" id="rank-name" name="rank_name" value="{{ $rank->rank_name }}" />
                </div>
                <div class="form-group">
                    <label for="#rank-color">Rank Color</label>
                    <input type="color" id="rank-color" name="rank_color" value="{{ $rank->rank_color }}" />
                </div>
                <div class="form-group">
                    <label for="#rank-image">Rank Image</label>
                    <img src="/img/ranks/{{ $rank->rank_image }}" alt="Rank's Image" />
                    <input type="file" id="rank-image" name="rank_image" />
                </div>
                <div class="form-group" id="save-button-form-group">
                    <input type="submit" value="Save" />
                </div>
            </form>
        </div>

        <div id="rank-edit-members-box">

        </div>

    </div>
@stop

@section('footer')
@stop

