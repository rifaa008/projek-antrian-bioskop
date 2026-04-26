@extends('user.layout')

@section('content')

<style>
.form-box {
    max-width: 500px;
    margin: auto;
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

input, select {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
}

button {
    width: 100%;
    padding: 12px;
    margin-top: 15px;
    border: none;
    border-radius: 8px;
    background: black;
    color: white;
    font-weight: bold;
}

button:hover {
    background: orange;
}
</style>

<div class="form-box">
    <h2>📝 Isi Data Dulu</h2>

    <form method="POST" action="/ambil-antrian">
        @csrf

        <input type="text" name="nama" placeholder="Masukkan Nama" required>

        <select name="jadwal_film_id" required>
            <option value="">Pilih Film & Jadwal</option>

            @foreach($jadwals as $j)
                <option value="{{ $j->id }}">
                    {{ $j->film->judul }} - {{ $j->tanggal }} - {{ $j->jam_tayang }}
                </option>
            @endforeach
        </select>

        <button type="submit">Ambil Antrian 🎟</button>
    </form>
</div>

@endsection