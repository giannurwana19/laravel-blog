@extends('template_blog.content')
@section('content')
<div class="col-md-8 hot-post-left">
  <!-- post -->
  @foreach ($posts as $post)
  <div class="post post-row">
    <a class="post-img" href="{{ route('blog.isi', $post->slug) }}"><img src="{{ asset("storage/posts/$post->gambar") }}" alt=""></a>
    <div class="post-body">
      <div class="post-category">
        <a href="">{{ $post->category->name }}</a>
      </div>
      <h3 class="post-title"><a href="blog-post.html">{{ $post->judul }}</a></h3>
      <ul class="post-meta">
        <li><a href="author.html">{{ $post->user->name }}</a></li>
        <li>{{ $post->created_at }}</li>
      </ul>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam...</p>
    </div>
  </div>
  @endforeach
  {{ $posts->links() }}
  <!-- /post -->
</div>
@endsection