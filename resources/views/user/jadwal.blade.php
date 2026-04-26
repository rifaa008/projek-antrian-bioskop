@extends('user.layout')

@section('content')
<h2>Jadwal Film</h2>

@foreach($jadwals as $j)
<div class="card">
    <h3>{{ $j->film->judul }}</h3>
    <p>Tanggal: {{ $j->tanggal }}</p>
    <p>Jam: {{ $j->jam_tayang }}</p>
    <p>Studio: {{ $j->studio }}</p>
</div>
@endforeach

@endsection