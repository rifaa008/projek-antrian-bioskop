@extends('layouts.app')

@section('content')
<div style="padding:20px;">

    <h2>Data Antrian</h2>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Film</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Nomor Antrian</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @foreach($antrians as $a)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $a->user->name }}</td>
            <td>{{ $a->jadwalFilm->film->judul }}</td>
            <td>{{ $a->jadwalFilm->tanggal }}</td>
            <td>{{ $a->jadwalFilm->jam }}</td>
            <td>{{ $a->nomor_antrian }}</td>
            <td>
                @if($a->status == 'menunggu')
                    <span style="color:orange;">Menunggu</span>
                @elseif($a->status == 'dipanggil')
                    <span style="color:blue;">Dipanggil</span>
                @else
                    <span style="color:green;">Selesai</span>
                @endif
            </td>
            <td>
                <a href="/antrians/{{ $a->id }}/edit">Edit</a>

                <form action="/antrians/{{ $a->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</div>
@endsection