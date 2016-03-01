<!DOCTYPE html>
<html>
<head>
    <title>SGF Web Devs Signup</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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
        @if (Auth::check())

            <h3>SGF Web Devs Signup</h3>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul style="list-style-type:none; color: red; font-weight:bold;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Cookie::get('entrysuccess'))
                <h1>Thanks for signing up!</h1>
                <h3>Stay tuned to see if you win one of the prizes!</h3>

            @else
                <form action="/" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="text" name="name" id="name" required="required" placeholder="Name" value="{{ $data->name }}" />
                    <input type="email" name="email" id="email" required="required" placeholder="Email Address" value="{{ $data->email }}" />
                    <button type="submit">Submit</button>
                </form>

            @endif
        @else
            <button onclick="window.signin();">Login</button>
        @endif
    </div>
</div>
<script src="https://cdn.auth0.com/js/lock-8.2.min.js"></script>
<script type="text/javascript">

    var lock = new Auth0Lock('Nko1NUaKIElDRrUwzryYEgovGa6OJRIv', 'sgfwebdevs.auth0.com');


    function signin() {
        lock.show({
            callbackURL: 'http://signup.dev/auth0/callback'
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
