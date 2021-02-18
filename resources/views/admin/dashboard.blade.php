<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Dasboard</h1>
        <a href="#" class="btn btn-primary float-right mb-4">Logout</a>
        <table class="table table-hover">
            <tr>
                <th>LOCATION</th>
                <th>USERS ID</th>
                <th>TEMPERATURE</th>
                <th>TIME IN</th>
            </tr>
            @foreach($logs as $log)
            <tr>
                <td>{{ $log->loc }}</td>
                <td>{{ $log->usersId }}</td>
                <td>{{ $log->temp }}</td>
                <td>{{ $log->created_at }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>