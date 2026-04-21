@extends('layouts.app')

@section('content')
<div style="padding:30px;">

    <h2>Jadwal Film</h2>

    <a href="{{ route('jadwal_films.create') }}">+ Tambah Jadwal</a>

    <table border="1" cellpadding="10" style="margin-top:20px; width:100%; text-align:center;">
        <tr>
            <th>ID</th>
            <th>Judul Film</th>
            <th>Tanggal</th>
            <th>Jam Tayang</th>
            <th>Studio</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Aksi</th>
        </tr>

        @foreach($jadwals as $jadwal)
        <tr>
            <td>{{ $jadwal->id }}</td>
            <td>{{ $jadwal->film->judul }}</td>
            <td>{{ $jadwal->tanggal }}</td>
            <td>{{ $jadwal->jam_tayang }}</td>
            <td>{{ $jadwal->studio }}</td>
            <td>{{ $jadwal->created_at->format('d-m-Y H:i') }}</td>
            <td>{{ $jadwal->updated_at->format('d-m-Y H:i') }}</td>
            <td>
                <a href="{{ route('jadwal_films.edit', $jadwal->id) }}">Edit</a>

                <form action="{{ route('jadwal_films.destroy', $jadwal->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin mau hapus jadwal ini?')"
                            style="background:red; color:white; border:none; padding:5px 10px; border-radius:5px;">
                            Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</div>
@endsection