<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield("title")</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{ asset("css/app.css") }}" rel="stylesheet">
</head>

<body>

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
