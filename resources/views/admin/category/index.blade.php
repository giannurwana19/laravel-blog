@extends('templates.home')
@section('sub-judul', 'Kategori')
@section('content')
@if (session('pesan'))
    <div class="alert alert-success">
      {{ session('pesan') }}
    </div>
@endif
<a href="{{ route('category.create') }}" class="btn btn-primary btn-sm mb-3" title="Tambah Kategori">+ Tambah</a>
<div class="row">
  <div class="col-md-8">
    <table class="table table-sm table-bordered table-hover">
      <thead class="bg-info text-white">
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach ($data as $key => $item)
        <tr>
          <td>{{ $key + $data->firstItem()  }}</td>
          <td>{{ $item->name }}</td>
          <td>
            <a href="{{ route('category.edit', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
            <a href="" class="btn btn-danger btn-sm">Hapus</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

{{ $data->links() }}
@endsection