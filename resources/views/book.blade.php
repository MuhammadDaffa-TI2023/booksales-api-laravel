@extends('layout')

@section('content')
<h2 class="mb-4 text-center">📚 Daftar Buku</h2>

<table class="table table-bordered table-striped table-hover shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Author</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $b)
        <tr>
            <td>{{ $b->id }}</td>
            <td>{{ $b->judul }}</td>
            <td>{{ $b->genre }}</td>
            <td>{{ $b->author->nama }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
