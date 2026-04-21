<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body style="display:flex; justify-content:center; align-items:center; height:100vh;">

<form method="POST" action="/login" style="width:300px;">
    @csrf

    <h2>Login Admin</h2>

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <label>Email</label>
    <input type="email" name="email" required style="width:100%;">

    <br><br>

    <label>Password</label>
    <input type="password" name="password" required style="width:100%;">

    <br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>