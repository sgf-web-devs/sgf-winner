<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

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
    <h1>All entries</h1>
    <div class="content">
        <table class="users">
            <tr><th>Name</th><th>Email</th></tr>
            @foreach($users as $cur_user)
                <tr>
                    <td>       {{$cur_user->name}}
                    </td>
                    <td>       {{$cur_user->email}}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>

