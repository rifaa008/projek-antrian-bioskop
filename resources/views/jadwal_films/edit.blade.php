@extends('layouts.app')

@section('content')
<div style="display:flex; justify-content:center; align-items:center; min-height:80vh;">

    <div style="background:#fff; padding:30px; border-radius:12px; width:450px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

        <h2 style="text-align:center; margin-bottom:20px;">Edit Jadwal Film</h2>

        <form action="{{ route('jadwal_films.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- FILM DROPDOWN -->
            <div style="margin-bottom:15px;">
                <label>Judul Film</label>
                <select name="film_id" required
                style="width:100%; padding:8px; border-radius:6px; border:1px solid #ccc;">
                    @foreach($films as $film)
                        <option value="{{ $film->id }}"
                        {{ $film->id == $jadwal->film_id ? 'selected' : '' }}>
                            {{ $film->judul }} - {{ $film->genre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- TANGGAL -->
            <div style="margin-bottom:15px;">
                <label>Tanggal</label>
                <input type="date" name="tanggal" value="{{ $jadwal->tanggal }}" required
                style="width:100%; padding:8px; border-radius:6px; border:1px solid #ccc;">
            </div>

            <!-- JAM -->
            <div style="margin-bottom:15px;">
                <label>Jam Tayang</label>
                <input type="time" name="jam_tayang" value="{{ $jadwal->jam_tayang }}" required
                style="width:100%; padding:8px; border-radius:6px; border:1px solid #ccc;">
            </div>

            <!-- STUDIO DROPDOWN -->
            <div style="margin-bottom:20px;">
                <label>Studio</label>
                <select name="studio" required
                style="width:100%; padding:8px; border-radius:6px; border:1px solid #ccc;">
                    <option value="Studio 1" {{ $jadwal->studio == 'Studio 1' ? 'selected' : '' }}>Studio 1</option>
                    <option value="Studio 2" {{ $jadwal->studio == 'Studio 2' ? 'selected' : '' }}>Studio 2</option>
                    <option value="Studio 3" {{ $jadwal->studio == 'Studio 3' ? 'selected' : '' }}>Studio 3</option>
                </select>
            </div>

            <!-- BUTTON -->
            <button type="submit" 
            style="width:100%; padding:10px; background:#4CAF50; color:#fff; border:none; border-radius:8px;">
                Update Jadwal
            </button>

        </form>

    </div>

</div>
@endsection