<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>404 Page</title>
    <!-- Favicon -->
    <link href="{{ asset('fibonacci/adminpanel/assets/img/dummy/favicon.ico') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="{{ asset('fibonacci/adminpanel/assets/img/dummy/favicon.ico') }}" sizes="128x128" rel="shortcut icon" />

    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ asset('fibonacci/frontend/assets/css/404.css') }}" />

</head>
<body>
<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>Oops!</h1>
            <h2>404 - Page not found</h2>
        </div>
        <a href="{{ url('/') }}">Go TO Homepage</a>
    </div>
</div>

</body>
</html>
