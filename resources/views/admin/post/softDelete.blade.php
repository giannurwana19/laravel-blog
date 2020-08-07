@extends('templates.home')
@section('sub-judul', 'History Post yang dihapus')
@section('content')
@if (session('pesan'))
<div class="alert alert-success">
  Data berhasil <b>{{ session('pesan') }}</b>
</div>
@endif
<div class="row">
  <div class="col-md-12">
    <table class="table table-sm table-bordered table-hover">
      <thead class="bg-info text-white">
        <th>No</th>
        <th>Judul Post</th>
        <th>Isi konten</th>
        <th>Tag</th>
        <th>Kategori</th>
        <th>Gambar Thumbnail</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach ($post as $key => $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
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
            <form action="{{ route('post.force_delete', $item->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{ route('post.restore', $item->id) }}" class="btn btn-success btn-sm" onclick="return confirm('Yakin restore {{ $item->judul }}?')">Restore</a>
              <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Yakin hapus Post {{ $item->judul }} secara permanen?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection