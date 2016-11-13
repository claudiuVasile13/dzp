@extends ('templates.frontend.template')

@section('head')
    <title>Home</title>
@stop

@section('content')
    @if(session()->has('activateRequired'))
        <br><br>
        <div id="activate">
            <ul>
                <li class="alert alert-success">{{ session()->get('activateRequired') }}</li>
            </ul>
        </div>
    @endif
@stop

@section('footer')
@stop