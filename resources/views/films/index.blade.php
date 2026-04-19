@extends('layouts.app')

@section('content')

<h2>Data Films</h2>

<a href="{{ route('films.create') }}">+ Tambah Film</a>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1" width="100%" cellpadding="10" style="margin-top:20px;">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Genre</th>
        <th>Durasi</th>
        <th>Deskripsi</th>
        <th>Poster</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Aksi</th>
    </tr>

    @foreach ($films as $film)
    <tr>
        <td>{{ $film->id }}</td>
        <td>{{ $film->judul }}</td>
        <td>{{ $film->genre }}</td>
        <td>{{ $film->durasi }}</td>
        <td>{{ $film->deskripsi }}</td>

        <td>
            @if($film->poster)
                <img src="{{ asset('storage/' . $film->poster) }}" width="100">
            @else   
                 Tidak ada poster
            @endif
        </td>

        <td>{{ $film->created_at }}</td>
        <td>{{ $film->updated_at }}</td>

        <td>
            <a href="{{ route('films.edit',$film->id) }}">Edit</a>

            <form action="{{ route('films.destroy', $film->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin mau hapus?')" 
                style="background:red; color:white; border:none; padding:5px 10px; border-radius:5px;">
                Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection