<!DOCTYPE html>
<html>
<head>
    <title>Signup Sheet</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <script src="https://js.pusher.com/3.0/pusher.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
        td {
            padding: 15px;
        }
        .user-list ul {
            list-style: none;
            padding-left: 0;
        }
        .user-list ul li {
            display: inline-block;
            max-width: 33%;
            padding: 15px;
        }
        .user-list ul li .email, .user-list ul li .name {
            display: block;
            font-size:20px;
            font-weight: bold;
        }
        .user-list ul li img {
            max-width: 212px;
            border-radius: 100px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Signup Sheet</h1>
    <div class="user-list">
        <ul>
            @foreach($users as $cur_user)
                <li>
                    <img src="{{ $cur_user->picture }}" />
                    <span class="name">{{ $cur_user->name }}</span>
                    <span class="email">{{ $cur_user -> email }}</span>
                </li>
            @endforeach

        </ul>
    </div>
</div>
<script>
    var pusher = new Pusher('{{ env('PUSHER_KEY') }}', {
        encrypted: true
    });

    var channel = pusher.subscribe('sgf-channel');
    channel.bind('DevCheckedIn', function (data) {
        console.log($('.email'));
        if ($('.user-list ul li').length !== 0) {

            $('.email').each(function() {

                if ($(this).text() !== data.user.email) {
                    $('.user-list ul').append('<li><img src=' + data.user.picture + ' /><span class="name">' + data.user.name + '</span><span class="email"> ' + data.user.email + '</span></li>');
                } else {
                    return;
                }

            });
        }
        else {
            $('.user-list ul').append('<li><img src=' + data.user.picture + ' /><span class="name">' + data.user.name + '</span><span class="email">' + data.user.email + '</span></li>');
        }
    });
</script>
</body>
</html>

