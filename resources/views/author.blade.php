@extends('layout')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-success text-white text-center fw-bold">
        👤 Daftar Penulis & Buku
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Author</th>
                    <th>Judul Buku</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <td>{{ $row['id'] }}</td>
                    <td>{{ $row['name'] }}</td>
                    <td>{{ $row['book'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
