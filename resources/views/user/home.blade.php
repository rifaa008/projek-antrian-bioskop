@extends('user.layout')

@section('content')

<style>
.bg {
    background: url("{{ asset('images/bg.jpg') }}") no-repeat center center;
    background-size: cover;
    min-height: 100vh;
}

.overlay {
    background: rgba(0, 0, 0, 0.6);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: white;
}

.box h1 {
    font-size: 36px;
    margin-bottom: 10px;
}

.box p {
    color: #ddd;
}

.btn {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 25px;
    background: orange;
    color: white;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
}

.btn:hover {
    background: #ff8800;
}
</style>

<div class="bg">
    <div class="overlay">
        <div class="box">
            <h1>🎬 Selamat Datang</h1>
            <p>Ambil nomor antrian film favoritmu dengan mudah</p>

            <a href="/user/ambil" class="btn">Ambil Antrian 🎟</a>
        </div>
    </div>
</div>

@endsection