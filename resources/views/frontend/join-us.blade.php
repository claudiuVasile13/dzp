@extends ('templates.frontend.template')

@section('head')
    <title>Join Us</title>
    <link rel="stylesheet" href="/css/frontend/common.css" />
@stop

@section('content')
    <div class="page-container">
        <h3 id="recruitment-status">Recruitment is OPEN</h3>
        <div class="page-content">
            <div class="logo-container">
                <img src="/img/dzp.png" alt="dZp Logo" />
            </div>
            <h2 class="title">RULES BEFORE JOINING</h2>
            <ul class="list">
                <li>You are 17 years old or over.</li>
                <li>You can speak and understand English.</li>
                <li>You are a regular player on our server.</li>
                <li>You have a microphone/headset and willing to use/install TeamSpeak on your computer.</li>
                <li>You respect other players.</li>
                <li>You respect admins for any choice they make.</li>
                <li>You don't use insulting names, language, etc.</li>
                <li>You will act mature in every situation.</li>
                <li>You should visit the site on a regular base, for keeping up-to-date with the community.</li>
                <li>You need to be active for at least 1-2 hours a day. </li>
                <li>You will not use any noob perks (Grenade Launcher,Last Stand, Martyrdom, RPG on people,allowed on helicopters.).</li>
                <li class="important-rule">If you accepted the above rules and still want to join our clan, you need to fill out the recruitment form below. You can do this by adding a new topic HERE, call the topic "Apply [YourName]", paste the recruitment form below in the message section and fill it out.</li>
                <li class="important-rule">Each and every member of our team will have a chance to vote on your application , however the final decision is taken by Arctic or Yeoldegod.</li>
            </ul>

            <h2 class="title">RECRUITMENT FORM</h2>
            <ul id="recruitment-form-list" class="nested-list">
                <li>
                    <p class="information-title">Contact Information:</p>
                    <ul class="list">
                        <li>Real name:</li>
                        <li>Age:</li>
                        <li>Location:</li>
                        <li>GameRanger #ID (Numbers):</li>
                        <li>Evolve(optional):</li>
                        <li>Steam:</li>
                    </ul>
                </li>
                <li>
                    <p class="information-title">Game Information:</p>
                    <ul class="list">
                        <li>In-Game Nickname:</li>
                        <li>Previous nicks:</li>
                        <li>COD4 Experience (Years,best killstreak,...):</li>
                        <li>Do you have an original CD-Key (Yes/No):</li>
                        <li>Are you used to playing clanwars:</li>
                        <li>How many hours can you be online daily:</li>
                        <li>Do you play CS GO (State your rank if yes):</li>
                    </ul>
                </li>
                <li>
                    <p class="information-title">Personal Information:</p>
                    <ul class="list">
                        <li>Why do you want to join |dZp|:</li>
                        <li>What new things can you bring to our clan:</li>
                        <li>Previous clans and reason for leaving:</li>
                        <li>Do you have TeamSpeak3?:</li>
                        <li>Additional information(optional):</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
@stop

@section('footer')

@stop