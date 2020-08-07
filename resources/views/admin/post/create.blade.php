@extends('templates.home')
@section('sub-judul', 'Tambah Post')
@section('content')
<div class="row">
  <div class="col-md-12">
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" name="judul" value="{{ old('judul') }}"
          class="form-control @error('judul') is-invalid @enderror" id="judul">
        @error('judul')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="judul">Kategori</label>
        <select name="category_id" class="form-control" id="category_id">
          @foreach ($category as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
        @error('judul')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="tag">Pilih Tag</label>
        <select name="tags[]" class="form-control select2" id="tag" multiple="">
          @foreach ($tags as $item)
              <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
        @error('judul')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="content">Konten</label>
        <textarea name="content" class="form-control" id="content"></textarea>
        @error('content')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="gambar">Thumbnail</label>
        <input type="file" name="gambar" value="{{ old('gambar') }}"
          class="form-control @error('gambar') is-invalid @enderror" id="gambar">
        @error('gambar')
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