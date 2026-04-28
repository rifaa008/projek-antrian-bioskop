@extends('user.layout')

@section('content')

<style>
.bg {
    background: url("{{ asset('images/bg.jpg') }}") no-repeat center center;
    background-size: cover;
    min-height: 100vh;
}

.overlay {
    background: rgba(255, 255, 255, 0.6); /* biar terang, bukan gelap */
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: black; /* <- ini biar tulisan hitam */
}

.box h1 {
    font-size: 36px;
    margin-bottom: 10px;
}

.box p {
    color: black; /* pastikan juga hitam */
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
            <p>
                Mau nonton bioskop tapi males ngantri panjang lebar??<br>
                Tenang aja! Sekarang kamu bisa ambil langsung Antriannya secara online di website ini<br>
                Yukk segera pilih film apa yang mau kamu tonton dan atur jadwalnya sendiri!!!
            </p>

            <a href="/user/ambil" class="btn">Ambil Antrian 🎟</a>
        </div>
    </div>
</div>

@endsection