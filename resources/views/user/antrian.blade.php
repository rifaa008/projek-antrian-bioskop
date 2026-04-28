@extends('user.layout')

@section('content')

<style>
.title {
    text-align: center;
    margin-top: 20px;
    margin-bottom: 30px;
}

.studio-section {
    margin-bottom: 40px;
    padding: 0 20px;
}

.studio-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 15px;
    border-left: 5px solid #333;
    padding-left: 10px;
}

.container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.box {
    width: 260px;
    border: 1px solid #ccc;
    border-radius: 12px;
    padding: 15px;
    background: #fff;
    box-shadow: 0 3px 8px rgba(0,0,0,0.15);
}

.badge {
    display: inline-block;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    color: white;
    margin-top: 8px;
}

.menunggu { background: orange; }
.dipanggil { background: blue; }
.selesai { background: green; }
</style>

<h2 class="title">Daftar Antrian</h2>

@php
    $grouped = $antrians
    ->sortBy(fn($a) => $a->jadwalFilm->studio)
    ->groupBy(fn($a) => $a->jadwalFilm->studio);
@endphp

@foreach($grouped as $studio => $items)
<div class="studio-section">

    <div class="studio-title">
     {{ $studio }}
    </div>

    <div class="container">
        @foreach($items as $a)
        <div class="box">
            <h3>{{ $a->nama }}</h3>
            <p><b>Film:</b> {{ $a->jadwalFilm->film->judul }}</p>
            <p><b>Nomor:</b> {{ $a->nomor_antrian }}</p>

            @if($a->status == 'menunggu')
                <span class="badge menunggu">Menunggu</span>
            @elseif($a->status == 'dipanggil')
                <span class="badge dipanggil">Dipanggil</span>
            @else
                <span class="badge selesai">Selesai</span>
            @endif
        </div>
        @endforeach
    </div>

</div>
@endforeach

@endsection