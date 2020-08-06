@extends('templates.home')
@section('sub-judul', 'Tambah Tag')
@section('content')
<div class="row">
  <div class="col-md-6">
    <form action="{{ route('tag.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Nama Tag</label>
        <input type="text" name="name" value="{{ old('name') }}"
          class="form-control @error('name') is-invalid @enderror">
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