@extends('user.layout')

@section('content')

<style>
.table-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

table {
    border-collapse: collapse;
    width: 80%;
    text-align: center;
    background: white;
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
}

th {
    background-color: #333;
    color: white;
}
</style>

<h2 style="text-align:center;">Jadwal Film</h2>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Judul Film</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Studio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jadwals as $j)
            <tr>
                <td>{{ $j->film->judul }}</td>
                <td>{{ $j->tanggal }}</td>
                <td>{{ $j->jam_tayang }}</td>
                <td>{{ $j->studio }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection