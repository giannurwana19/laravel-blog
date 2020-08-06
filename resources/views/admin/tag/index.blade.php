@extends('templates.home')
@section('sub-judul', 'Tag')
@section('content')
@if (session('pesan'))
<div class="alert alert-success">
  Data berhasil <b>{{ session('pesan') }}</b>
</div>
@endif
<a href="{{ route('tag.create') }}" class="btn btn-primary btn-sm mb-3" title="Tambah tag">+ Tambah</a>
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
            <form action="{{ route('tag.destroy', $item->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{ route('tag.edit', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
              <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Yakin hapus kategori {{ $item->name }}?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

{{ $data->links() }}
@endsection