@extends('kaiju::layout')

@section('title', 'Roared')

@section('content')
<section class="post-body">
    <h1>Roared!</h1>
    <h2>Number of posts: {{ $posts->count() }}</h2>
    @foreach ($posts as $post)
        <p>Post: {{ $post->title }}</p>
    @endforeach
</section>
@endsection