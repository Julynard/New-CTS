<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Admin Dasboard</h1>
        <div class="container">
            <form action="{{ route('stud.search') }}" method="get">
                <div class="form-group">
                    <input type="search" name="search" placeholder="Search" class="form-control">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <ul class="nav nav-tabs">
            <li class="nav-items "><a href="{{ route('admin.dashboard') }}" class="nav-link">Employees and Students Records</a></li>
            <li class="nav-items active"><a href="{{ route('admin.dashboardv') }}" class="nav-link">Visitors Records</a></li>
            <li class="nav-items"><a href="{{ route('logout') }}" class="nav-link">Logout</a></li>
        </ul>
    
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th>LOCATION</th>
                    <th>USERS ID</th>
                    <th>TEMPERATURE</th>
                    <th>TIME IN</th>
                </tr>
            </thead>
            @foreach($logs as $log)
            <tbody>
                <tr>
                    <td>{{ $log->loc }}</td>
                    <td>{{ $log->usersId }}</td>
                    <td>{{ $log->temp }}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            </tbody>
            @endforeach
        </table>
        {{ $logs->appends(['search' => Request::get('search')])->links() }}
    </div>
</body>

</html>