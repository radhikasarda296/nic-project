<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="{{ request()->is('profile') ? 'active' : '' }}"><a href="{{ route('profile') }}">Profile</a></li>
                <li class="{{ request()->is('view-files') ? 'active' : '' }}"><a href="{{ route('view-files') }}">View Uploaded Files</a></li>
                <li class="{{ request()->is('reset-password') ? 'active' : '' }}"><a href="{{ route('reset-password') }}">Reset Password</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        @session("success")
        <div class="alert alert-success" id="success-alert">
            {{ session("success") }}
        </div>
        @endsession

        @session("error")
        <div class="alert alert-error" id="error-alert">
            {{ session("error") }}
        </div>
        @endsession

        @yield("content")
    </div>
</body>
</html>
