@extends('templates.home')
@section('sub-judul', 'Edit Tag')
@section('content')
<div class="row">
  <div class="col-md-6">
    <form action="{{ route('tag.update', $data->id) }}" method="POST">
      @csrf
      @method('PATCH')
      <div class="form-group">
        <label for="name">Nama Tag</label>
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