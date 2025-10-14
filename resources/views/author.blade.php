@extends('layout')

@section('content')
<h2 class="mb-4 text-center">👤 Daftar Author</h2>

<table class="table table-bordered table-striped shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Author</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <td>{{ $row['id'] }}</td>
            <td>{{ $row['nama'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
