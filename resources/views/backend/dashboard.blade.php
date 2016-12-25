@extends ('templates.backend.template')

@section('head')
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/backend/dashboard.css" />
@stop

@section('content')
    <div id="dashboard-container">
        <h2 id="welcome">Welcome to your administration panel</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
        </ol>
    </div>
@stop

@section('footer')
@stop