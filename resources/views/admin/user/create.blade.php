@extends('templates.home')
@section('sub-judul', 'Tambah User')
@section('content')
<div class="row">
  <div class="col-md-6">

    <form action="{{ route('user.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="name">Nama User</label>
        <input type="text" name="name" value="{{ old('name') }}"
          class="form-control @error('name') is-invalid @enderror">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" value="{{ old('email') }}"
          class="form-control @error('email') is-invalid @enderror">
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="type_user">Type User</label>
        <select name="type_user" class="form-control" id="type_user">
          <option value="1">Administrator</option>
          <option value="0">Author</option>
        </select>
        @error('type_user')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="text" name="password" value="{{ old('password') }}"
          class="form-control @error('password') is-invalid @enderror">
        @error('password')
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