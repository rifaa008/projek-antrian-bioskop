@extends('user.layout')

@section('content')
<h2>Antrian Saya</h2>

@foreach($antrians as $a)
<div class="card">
    <h3>{{ $a->nama }}</h3>
    <p>Film: {{ $a->jadwalFilm->film->judul }}</p>
    <p>Nomor: {{ $a->nomor_antrian }}</p>

    @if($a->status == 'menunggu')
        <span style="color:orange;">Menunggu</span>
    @elseif($a->status == 'dipanggil')
        <span style="color:blue;">Dipanggil</span>
    @else
        <span style="color:green;">Selesai</span>
    @endif
</div>
@endforeach

@endsection