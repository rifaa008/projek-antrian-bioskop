@extends('layouts.app')

@section('content')
<div style="display:flex; justify-content:center; align-items:center; min-height:80vh;">
    
    <div style="background:#fff; padding:30px; border-radius:12px; width:500px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
        
        <h2 style="text-align:center; margin-bottom:20px;">Edit Film</h2>

        <form action="{{ route('films.update', $film->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="margin-bottom:15px;">
                <label>Judul</label>
                <input type="text" name="judul" value="{{ $film->judul }}" 
                style="width:100%; padding:8px; border-radius:6px; border:1px solid #ccc;">
            </div>

            <div style="margin-bottom:15px;">
                <label>Genre</label>
                <input type="text" name="genre" value="{{ $film->genre }}" 
                style="width:100%; padding:8px; border-radius:6px; border:1px solid #ccc;">
            </div>

            <div style="margin-bottom:15px;">
                <label>Durasi (HH:MM:SS)</label>
                <input type="text" name="durasi" value="{{ $film->durasi }}" 
                style="width:100%; padding:8px; border-radius:6px; border:1px solid #ccc;">
            </div>

            <div style="margin-bottom:15px;">
                <label>Deskripsi</label>
                <textarea name="deskripsi" 
                style="width:100%; padding:8px; border-radius:6px; border:1px solid #ccc;">{{ $film->deskripsi }}</textarea>
            </div>

            <div style="margin-bottom:15px;">
                <label>Poster Sekarang</label><br>
                @if($film->poster)
                    <img src="{{ asset('storage/' . $film->poster) }}" 
                    style="width:120px; height:160px; object-fit:cover; border-radius:8px;">
                @endif
            </div>

            <div style="margin-bottom:20px;">
                <label>Ganti Poster</label>
                <input type="file" name="poster">
            </div>

            <button type="submit" 
            style="width:100%; padding:10px; background:#4CAF50; color:#fff; border:none; border-radius:8px;">
                Update Film
            </button>
        </form>

    </div>

</div>
@endsection