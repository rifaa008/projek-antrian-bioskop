@extends('layouts.app')

@section('content')
<div style="display:flex; justify-content:center; margin-top:30px;">
    <div style="width:400px;">

        <h2>Edit Status Antrian</h2>

        <p><b>Nama:</b> {{ $antrian->nama }}</p>
        <p><b>Film:</b> {{ $antrian->jadwalFilm->film->judul }}</p>
        <p><b>Nomor:</b> {{ $antrian->nomor_antrian }}</p>

        <form action="/antrians/{{ $antrian->id }}" method="POST">
            @csrf
            @method('PUT')

            <label>Status</label>
            <select name="status" style="width:100%;">
                <option value="menunggu" {{ $antrian->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="dipanggil" {{ $antrian->status == 'dipanggil' ? 'selected' : '' }}>Dipanggil</option>
                <option value="selesai" {{ $antrian->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>

            <br><br>
            <button type="submit">Update</button>
        </form>

    </div>
</div>
@endsection