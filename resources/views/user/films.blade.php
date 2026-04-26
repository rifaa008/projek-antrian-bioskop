@extends('user.layout')

@section('content')
<h2>Daftar Film</h2>

@foreach($films as $film)
<div class="card film-box">

    {{-- POSTER --}}
    <img src="{{ asset('storage/' . $film->poster) }}" alt="poster">

    <div>
        <h3>{{ $film->judul }}</h3>
        <p>Genre: {{ $film->genre }}</p>
        <p>Durasi: {{ $film->durasi }} menit</p>
        <p>{{ $film->deskripsi }}</p>
    </div>

</div>
@endforeach

@endsection