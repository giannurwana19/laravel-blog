@extends('templates.home')
@section('sub-judul', 'Edit Kategori')
@section('content')
<div class="row">
  <div class="col-md-6">
    <form action="{{ route('category.update', $data->id) }}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="name">Nama Kategori</label>
        <input type="text" name="name" value="{{ $data->name }}"
          class="form-control @error('name') is-invalid @enderror">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary btn-block">Ubah</button>
    </form>
  </div>
</div>
@endsection