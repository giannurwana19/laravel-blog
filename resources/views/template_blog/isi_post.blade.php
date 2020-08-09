@extends('template_blog.temp_post')
@section('content')
    @foreach ($data as $item)
    <h1>{{ $item->judul }}</h1>
    <p>{!! $item->content !!}</p>
    @endforeach
@endsection