@extends('layouts.app')

@section('content')

<h2>Tambah Film</h2>

<a href="{{ route('films.index') }}">← Kembali</a>

@if ($errors->any())
    <ul style="color:red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <p>Judul</p>
    <input type="text" name="judul">

    <p>Genre</p>
    <input type="text" name="genre">

    <p>Durasi</p>
    <input type="text" name="durasi">

    <p>Deskripsi</p>
    <textarea name="deskripsi"></textarea>

    <p>Poster</p>
    <input type="file" name="poster">

    <br><br>
    <button type="submit">Simpan</button>
</form>

@endsection