@extends('layouts.app')

@section('content')
<div style="padding:20px;">

    <h2>Data Antrian</h2>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Film</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Nomor</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @forelse($antrians as $a)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $a->nama }}</td>

            <td>{{ $a->jadwalFilm->film->judul ?? '-' }}</td>

            <!-- OPSI AMAN -->
            <td>{{ $a->jadwalFilm->tanggal ?? '-' }}</td>
            <td>{{ $a->jadwalFilm->jam_tayang ?? '-' }}</td>

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
                <a href="{{ route('antrians.edit', $a->id) }}">Edit</a>

                <form action="{{ route('antrians.destroy', $a->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" style="text-align:center;">Data kosong</td>
        </tr>
        @endforelse

    </table>

</div>
@endsection