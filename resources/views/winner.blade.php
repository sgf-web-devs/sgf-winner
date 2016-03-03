<!DOCTYPE html>
<html>
<head>
    <title>Winners</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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
    </style>
</head>
<body>
<div class="container">
    <h1>And the winners are...</h1>
    <div class="content">
        <?php $count = 1; ?>
        <table class="users">
            <tr><th>Name</th><th>Email</th><th>Prize</th></tr>
            @foreach($users as $cur_user)
                <tr>
                    <td>       {{$cur_user->name}}
                    </td>
                    <td>       {{$cur_user->email}}
                    </td>
                    <td>
                        @if($count == 1)
                            Pluralsight
                        @elseif($count == 2)
                            JetBrains
                        @endif
                    </td>
                </tr>
                <?php $count++; ?>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>

