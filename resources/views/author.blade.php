@extends('layout')

@section('content')
<h2 class="mb-4 text-center">👤 Daftar Author</h2>

<table class="table table-bordered table-striped table-hover shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Negara</th>
            <th>Jumlah Buku</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $a)
        <tr>
            <td>{{ $a->id }}</td>
            <td>{{ $a->nama }}</td>
            <td>{{ $a->negara }}</td>
            <td>{{ $a->books->count() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
