<!DOCTYPE html>
<html>
<head>
    <title>DayNight App</title>
</head>
<body>

    <div style="padding:20px; background:#eee; margin-bottom:20px;">
        <a href="{{ url('/') }}">Dashboard</a> |
        <a href="{{ route('films.index') }}">Films</a>
    </div>

    <div style="max-width:1100px; margin:auto;">
        @yield('content')
    </div>

</body>
</html>