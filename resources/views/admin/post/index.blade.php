@extends('templates.home')
@section('sub-judul', 'Post')
@section('content')
@if (session('pesan'))
<div class="alert alert-success">
  Data berhasil <b>{{ session('pesan') }}</b>
</div>
@endif
<a href="{{ route('post.create') }}" class="btn btn-primary btn-sm mb-3" title="Tambah Post">+ Tambah</a>
<div class="row">
  <div class="col-md-12">
    <table class="table table-sm table-bordered table-hover">
      <thead class="bg-info text-white">
        <th>No</th>
        <th>Judul</th>
        <th>Isi konten</th>
        <th>Kategori</th>
        <th>Gambar</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach ($data as $key => $item)
        <tr>
          <td>{{ $key + $data->firstItem() }}</td>
          <td>{{ $item->judul }}</td>
          <td>{{ $item->content }}</td>
          <td>
            @foreach ($item->tags as $tag)
            <ul>
              <li>{{ $tag->name }}</li>
            </ul>
            @endforeach
          </td>
          <td>{{ $item->category->name }}</td>
          <td><img src="{{ asset("/storage/posts/$item->gambar") }}" style="width: 100px" alt=""></td>
          <td>
            <form action="{{ route('post.destroy', $item->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{ route('post.edit', $item->id) }}" class="btn btn-success btn-sm">Edit</a>
              <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Yakin hapus Post {{ $item->judul }}?')">Hapus</button>
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