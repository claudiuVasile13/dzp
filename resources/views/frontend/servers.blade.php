@extends ('templates.frontend.template')

@section('head')
    <title>Servers</title>
    <link rel="stylesheet" href="/css/frontend/common.css" />
@stop

@section('content')
    <div class="page-container">
        <div class="page-content">
            <div class="logo-container">
                <img src="/img/dzp.png" alt="dZp Logo" />
            </div>
            <h2 class="title">Servers</h2>
            <ul class="list">
                <li>We don't have any servers yet!</li>
            </ul>

            <h2 class="title">Server Rules</h2>
            <ul class="list">
                <li>Rule #1. No Grenade Laucher, Last Stand, Martyrdom or Juggernaut. </li>
                <li>Rule #2. No RPG on People.</li>
                <li>Rule #3. No HardCore Camping.</li>
                <li>Rule #4. No recruiting for your clan, your server, or anything else.</li>
                <li>Rule #5. No advertising or spamming of websites or servers.</li>
                <li>Rule #6. Hacking will result in a permanent ban.</li>
                <li>Rule #7. Our ping limit is 300.</li>
                <li>Rule #8. Do not stay in the spectator zone for more then 5 minutes.</li>
            </ul>
            <p>Breaking one of the above rules once will result in a <span class="ban">KICK</span>. Second time will be a <span class="ban">TEMPBAN</span>! Hacking will immediately result in a <span class="ban">BAN</span>!</p>
            <p>If you got banned without any reason, feel free to make a post <a id="ban-appeal" href="#">HERE</a></p>
        </div>
    </div>
@stop

@section('footer')

@stop