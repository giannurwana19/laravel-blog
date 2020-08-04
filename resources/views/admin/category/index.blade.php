@extends('templates.home')
@section('content')
    <h1>ini adalah kategori</h1>
    <table class="table table-sm table-bordered table-hover">
      <thead>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->name }}</td>
          <td>
            <a href="" class="btn btn-success btn-sm">Edit</a>
            <a href="" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection