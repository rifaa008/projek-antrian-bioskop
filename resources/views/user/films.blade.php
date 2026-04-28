@extends('user.layout')

@section('content')

<h2 style="text-align:center;">Daftar Film</h2>

<style>
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    vertical-align: top;
}

th {
    background-color: #333;
    color: white;
}

img {
    width: 80px;
    height: auto;
    border-radius: 5px;
}
</style>

<table>
    <thead>
        <tr>
            <th>Poster</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Durasi</th>
            <th>Deskripsi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($films as $film)
        <tr>
            <td>
                <img src="{{ asset('storage/' . $film->poster) }}" alt="poster">
            </td>
            <td>{{ $film->judul }}</td>
            <td>{{ $film->genre }}</td>
            <td>{{ $film->durasi }} menit</td>
            <td>{{ $film->deskripsi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection