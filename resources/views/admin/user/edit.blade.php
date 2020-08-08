@extends('templates.home')
@section('sub-judul', 'Tambah User')
@section('content')
<div class="row">
  <div class="col-md-6">

    <form action="{{ route('user.update', $user->id) }}" method="POST">
      @csrf
      @method('PATCH')

      <div class="form-group">
        <label for="name">Nama User</label>
        <input type="text" name="name" value="{{ $user->name }}"
          class="form-control @error('name') is-invalid @enderror">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" value="{{ $user->email }}"
          class="form-control @error('email') is-invalid @enderror" readonly>
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="type_user">Type User</label>
        <select name="type_user" class="form-control" id="type_user">
          <option value="1" @if ($user->type_user === 1)
            selected
            @endif
            >Administrator</option>
          <option value="0" @if ($user->type_user === 0)
            selected
            @endif
            >Author</option>
        </select>
        @error('type_user')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="password">password</label>
        <input type="text" name="password" value=""
          class="form-control @error('password') is-invalid @enderror">
          <small class="text-info">Jika Password kosong, maka password tidak diubah</small>
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