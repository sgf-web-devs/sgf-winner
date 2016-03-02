<!DOCTYPE html>
<html>
<head>
    <title>SGF Web Devs Signup</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <script src="https://js.pusher.com/3.0/pusher.min.js"></script>

    <style>
        html, body {
            height: 100%;
            font-size:24px;
        }
        input {
            font-size: 24px;
        }
        button {
            font-size: 24px;
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
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <h3>SGF Web Devs Signup</h3>

        @if (Auth::check())
            <h1>Thanks for signing up!</h1>
            <h3>Stay tuned to see if you win one of the prizes!</h3>
        @else
            <button onclick="window.signin();">Sign In</button>
        @endif
    </div>
</div>
<script src="https://cdn.auth0.com/js/lock-8.2.min.js"></script>
<script type="text/javascript">

    var lock = new Auth0Lock('{{ env('AUTH0_CLIENT_ID') }}', 'sgfwebdevs.auth0.com');


    function signin() {
        lock.show({
            callbackURL: "{{url('auth0/callback')}}"
            , responseType: 'code'
            , authParams: {
                scope: 'openid profile'
            }
        });
        console.log(lock);
    }
</script>



</body>
</html>
