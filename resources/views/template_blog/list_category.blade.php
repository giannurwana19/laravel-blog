@extends('template_blog.content')
@section('content')
<div class="col-md-8 hot-post-left">
    <!-- post -->
    @foreach ($data as $item)
    <div class="post post-row">
        <a class="post-img" href="{{ route('blog.isi', $item->slug) }}"><img
                src="{{ asset("storage/posts/$item->gambar") }}" alt=""></a>
        <div class="post-body">
            <div class="post-category">
                <a href="">{{ $item->category->name }}</a>
            </div>
            <h3 class="post-title"><a href="blog-post.html">{{ $item->judul }}</a></h3>
            <ul class="post-meta">
                <li><a href="author.html">{{ $item->user->name }}</a></li>
                <li>{{ $item->created_at }}</li>
            </ul>
            <p>{{ $item->content }}</p>
        </div>
    </div>
    @endforeach
    {{ $data->links() }}
    <!-- /post -->
</div>
@endsection