<!DOCTYPE html>
<html>
<head>
    <title>Antrian Bioskop</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
        }

        /* background khusus home */
        .home-bg {
            background: url("{{ asset('images/bg.jpg') }}") no-repeat center center;
            background-size: cover;
            min-height: 100vh;
        }

        .navbar {
            background: #111;
            padding: 15px;
            display: flex;
            gap: 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar a:hover {
            color: orange;
        }

        .container {
            padding: 20px;
        }

        .card {
            background: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        img {
            width: 120px;
            border-radius: 10px;
        }

        .film-box {
            display: flex;
            gap: 15px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="/user">🏠 Home</a>
    <a href="/user/films">🎬 Films</a>
    <a href="/user/jadwal">🗓️ Jadwal Films</a>
    <a href="/user/antrian">🎟️ Antrian Saya</a>
</div>

<div class="container">
    @yield('content')
</div>

</body>
</html>