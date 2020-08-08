@extends('templates.home')
@section('sub-judul', 'User')
@section('content')
@if (session('pesan'))
<div class="alert alert-success">
  Data berhasil <b>{{ session('pesan') }}</b>
</div>
@endif
<a href="{{ route('user.create') }}" class="btn btn-primary btn-sm mb-3" title="Tambah Kategori">+ Tambah</a>
<div class="row">
  <div class="col-md-8">
    <table class="table table-sm table-bordered table-hover">
      <thead class="bg-info text-white">
        <th>No</th>
        <th>Nama User</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
      </thead>
      <tbody>
        @foreach ($users as $key => $user)
        <tr>
          <td>{{ $key + $users->firstItem() }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          @if ($user->type_user)
          <td><h6><span class="badge badge-primary">Administrator</span></td></h6>
          @else
          <td><h6><span class="badge badge-warning">Author</span></td></h6>
          @endif
          <td>
            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success btn-sm">Edit</a>
              <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Yakin hapus User {{ $user->name }}?')">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

{{ $users->links() }}
@endsection