@extends('layouts.app')

@section('content')

<style>
.edit-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
    padding: 20px;
}


.edit-card {
    width: 500px;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.4);

    background: #1e1e1e;
    color: white;
}


.edit-card h2 {
    text-align: center;
    margin-bottom: 20px;
}


.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
    color: #ddd;
}


.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #444;
    background: #2a2a2a;
    color: white;
}


.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: orange;
}


button {
    width: 100%;
    padding: 10px;
    background: orange;
    color: black;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
}

button:hover {
    background: #ffb347;
}


.poster {
    width: 120px;
    height: 160px;
    object-fit: cover;
    border-radius: 8px;
    margin-top: 5px;
}


input[type="file"] {
    background: transparent;
    border: none;
    color: white;
}
</style>

<div class="edit-wrapper">

    <div class="edit-card">

        <h2>Edit Film</h2>

        <form action="{{ route('films.update', $film->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="judul" value="{{ $film->judul }}">
            </div>

            <div class="form-group">
                <label>Genre</label>
                <input type="text" name="genre" value="{{ $film->genre }}">
            </div>

            <div class="form-group">
                <label>Durasi (HH:MM:SS)</label>
                <input type="text" name="durasi" value="{{ $film->durasi }}">
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi">{{ $film->deskripsi }}</textarea>
            </div>

            <div class="form-group">
                <label>Poster Sekarang</label><br>
                @if($film->poster)
                    <img src="{{ asset('storage/' . $film->poster) }}" class="poster">
                @endif
            </div>

            <div class="form-group">
                <label>Ganti Poster</label>
                <input type="file" name="poster">
            </div>

            <button type="submit">Update Film</button>

        </form>

    </div>

</div>

@endsection