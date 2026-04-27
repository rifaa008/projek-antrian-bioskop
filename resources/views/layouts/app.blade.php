<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DayNight App</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #121212;
            color: white;
        }

        .top-nav {
            background: #1e1e1e;
            padding: 10px 20px;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        /* FIX SVG BIAR GA GEDE */
        svg {
            width: 18px;
            height: 18px;
        }

        .nav-menu {
            display: flex;
            gap: 20px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #ccc;
            text-decoration: none;
            font-size: 14px;
        }

        .nav-link.active,
        .nav-link:hover {
            color: orange;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            background: orange;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }
    </style>
</head>

<body>

<nav class="top-nav">
    <div class="nav-container">

        <div class="nav-left">
            <a href="/admin" class="logo">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 
                             10-4.48 10-10S17.52 2 12 2z"/>
                </svg>
                DayNight
            </a>

            <div class="nav-menu">
                <a href="/admin" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="/films" class="nav-link {{ request()->is('films*') ? 'active' : '' }}">
                    Films
                </a>

                <a href="/jadwal_films" class="nav-link {{ request()->is('jadwal_films*') ? 'active' : '' }}">
                    Jadwal Films
                </a>

                <a href="/antrians" class="nav-link {{ request()->is('antrians*') ? 'active' : '' }}">
                    Antrian
                </a>
            </div>
        </div>

        <div class="nav-right">
            <div class="user-avatar">A</div>
            <span>Admin</span>
        </div>

    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>