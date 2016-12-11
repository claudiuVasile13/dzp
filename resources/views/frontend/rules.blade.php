@extends ('templates.frontend.template')

@section('head')
    <title>Rules</title>
    <link rel="stylesheet" href="/css/frontend/common.css" />
@stop

@section('content')
    <div class="page-container">
        <div class="page-content">
            <div class="logo-container">
                <img src="/img/dzp.png" alt="dZp Logo" />
            </div>
            <h2 class="title">RANK STRUCTURE</h2>
            <h3 id="ranks-title">Ranks you can work up to</h3>
            <ul id="ranks-list" class="nested-list">
                <li>
                    <p class="rank-name" id="leader">Leader:</p>
                    <ul class="list">
                        <li>He runs the clan under the Founder.</li>
                        <li>He is in charge of every clan war and tournaments and takes full responsibility of the entire team.</li>
                        <li>He is having a crucial vote in each new application.</li>
                        <li>He has full adminship on the teamspeak and gaming servers.</li>
                        <li>He will discuss all new features which will be added to the clan along with the Founder.</li>
                    </ul>

                    <p class="rank-name" id="co-leader">Co-Leader:</p>
                    <ul class="list">
                        <li>He runs the clan under the Founder and Leaders.</li>
                        <li>He will fulfill all the tasks if the Founder and Leaders are absent.</li>
                        <li>He has full adminship on the teamspeak and gaming servers.</li>
                    </ul>

                    <p class="rank-name" id="master-admin">Server Master Admin:</p>
                    <ul class="list">
                        <li>He has full adminship on the teamspeak server and gaming servers. including changing maps and giving ranks.</li>
                        <li>He will be in charge of a clan war if the Founder, Leaders and Co-Leaders are absent.</li>
                    </ul>

                    <p class="rank-name" id="server-admin">Server Admin:</p>
                    <ul class="list">
                        <li>They are the veterans of the community and have been in the clan for a while.</li>
                        <li>He has kicking, temporary ban and permanent ban rights on the server, and the ability to change maps.</li>
                        <li>He will gain channel admin rank on the teamspeak server.</li>
                    </ul>

                    <p class="rank-name" id="member">Member:</p>
                    <ul class="list">
                        <li>He has kicking, ban rights and is able to change maps on the gaming servers.</li>
                    </ul>
                </li>
            </ul>

            <h2 class="title">ADMIN RULES</h2>
            <ul class="list">
                <li>Clan admin will have to respect and follow the same rules as the players and members. Any admin caught not following the rules or abusing his or her powers shall be banned and kicked from the server and clan.</li>
                <li>All admins are expected to be extra courteous and friendly with new members and players. Good admins is what makes a server fun and fair to play on.</li>
                <li>Any admin that does not participate in any clan activities or play in the server for a certain amount of period with a out a valid reason shall have his admin rights revoked.</li>
                <li>All admin should keep a cool head when judging a player. If an admin can’t keep his cool he shall have his right revoked.</li>
                <li>Teleporting, freezing, flaming or other admin powers is considered admin abuse. Forcing people to knife or play only the maps the admin likes is also considered admin abuse. This will result in the loss of admin right and or permanent ban from the server and clan.</li>
                <li>Admin shall always wear the clan tag with no exception.</li>
                <li>Admins represent the clan anywhere they go so please act accordingly. We do not want to hear how a clan admin is making a fool of themselves on another server. Misrepresenting the clan will automatically get you banned from the clan and server.</li>
            </ul>

            <h2 class="title">MEMBER RULES</h2>
            <ul class="list">
                <li>All initiated clan members have to wear the clan tag. Any member not wearing it will be considered as not wanting to be part of the clan. The official tag is |dZp|!</li>
                <li>If you are a |dZp| Clan member you are expected to participate and play on our servers. This does not mean that you can only play on our servers but anyone that is not active on our clan will be kicked from the clan. This is so we can support and help the clan grow.</li>
                <li>The clans will occasionally clan wars against other clans. If you like to participate, please ask about joining the scrim team. While having a clan war please keep the talk to a minimum and do not whine or complain about the game play this will only distract or demoralize other players, you are also NOT allowed to leave the cw without a valid reason!. This will also reflex badly on our clan.</li>
                <li>This clan does not condone the recruiting and advertising on other servers or clans. It gives our clan a bad name and reputation if we actively pursue other clan members. If someone ask about the clan or would like to join just add them to your friend list and talk to them off the server. Please keep all clan matters and conversation on our server. If you need to talk about the clan or our server contact the person directly or go to the the clan server.</li>
                <li>Once a Member has joined our clan, he is assumed that he will remain |dZp|!if he wants to leave that his full right but there is no way he can come back anymore. OUT = OUT FOREVER! Loyalty is very important in this clan.</li>
                <li>Show some respect to fellow members. You are supposed to be a team so act like team mates to each other, this is what makes a clan strong!</li>
                <li>Multi-clanning will not be tolerated. Choose one clan, and one clan only.</li>
                <li>If a clan member is inactive for a certain amount of time, he'll be considered inactive. If you remain inactive for too long without informing us, you may get chucked out.</li>
                <p>Ranks don't come easy. Good behavior and motivation of a clan member can earn him a promotion to a higher rank in time!</p>
            </ul>

            <h2 class="title">RULES BEFORE BECOMING AN ADMIN</h2>
            <ul class="list">
                <li>You must be able to speak decent english.</li>
                <li>You must have a mic and TS3 installed.</li>
                <li>You must show your interests for this clan,so be active on site and our servers too!</li>
                <li>Come up with ideas and try to keep a balance between fun and seriousness!</li>
                <li>You should never have been Kicked/Banned from our servers no matter the reason!</li>
                <li>You must be a decent player.</li>
            </ul>

            <h2 class="title">CLAN WARS</h2>
            <ul class="list">
                <li>Respect our opponents. Keep it fun. Don't insult them. End the war with a friendly "good game".</li>
                <li>If you see a hacker, DON'T start screaming out accusations. Tell your team in team chat, quietly, that you suspect someone is hacking.</li>
                <li>If you and your team know someone is hacking tell it on team chat or on teamspeak but keep playing. Do not leave.</li>
                <li>When we have a ts3 server up, try and use it if you can. It really helps coordinate gameplay.</li>
                <li>Leaders are in charge of a clan war at all cost, if a leader is not able to play, the most senior member will take over.</li>
                <li>Spamming binds during a CW is very off putting, try to avoid it.</li>
                <li>All players should take SS and record for all CW's and if asked provide them, their are no excuses for not providing other clans.</li>
            </ul>

            <h2 class="title">FORUM RULES</h2>
            <ul class="list">
                <li>This is one of the chief rules - respect the other users who share the Forums with you. You may not agree with what they have to say - likewise, they may not agree with you. So agree to disagree. Anyone who is found to be flaming or launching personal attacks against other Forum users may be subject to a ban. The Forums are meant to provide an enjoyable experience for all - so don't abuse them and each other.</li>
                <li>There are no set rules against the use of profanity in the Forums, but users should only really apply it where appropriate. Inserting swear words in every post doesn't make a user look "tough" or "clever". In fact to most people, it comes across as a literacy deficiency. Posters who frequently use excessive levels of profanity may be cautioned to tone it down. In no way, will the usage of racial, religious, ethnical or sexual discrimination be allowed on our forums. This may lead to definite banning.</li>
                <li>Mindless spamming will NOT be tolerated in the Forums. Any user found posting pointless rubbish (such as multiple posts with no text, only smilies - for example) is likely to incur a warning, followed by a ban. Filling the boards with pointless or nonsensical posts simply to gain a Forum rank is not acceptable either.</li>
                <li>The posting of adult links, banners, or any other material that promotes pornographic material is prohibited. These forums are for the discussion of not sexual entertainment. If you want to discuss or observe that kind of thing, we suggest you look elsewhere.</li>
                <li>As with regular online chatrooms and other Internet Forums, please do not use all caps (ie. higher-case text) when posting - especially when creating a new thread title. Using caps is conventionally akin to "shouting" online - and isn't really necessary for entire posts.</li>
            </ul>
        </div>
    </div>
@stop

@section('footer')

@stop