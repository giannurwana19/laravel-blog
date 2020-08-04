@extends('templates.home')
@section('sub-judul', 'Tambah Kategori')
@section('content')
<div class="row">
  <div class="col-md-6">
    <form action="{{ route('category.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Nama Kategori</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
      </div>
      <button type="submit" class="btn btn-primary btn-block">Simpan</button>
    </form>
  </div>
</div>
@endsection