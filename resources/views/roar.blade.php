@extends('kaiju::layout')

@section('title', 'Roared')

@section('content')
<section class="post-body">
    <h1>Roared!</h1>
    <h2>Number of posts saved: {{ $posts->count() }}</h2>
    @foreach ($posts as $post)
        <p>Post: {{ $post->title }}</p>
    @endforeach
    <p><a href="{{ route('/') }}">Bring me home!</a></p>
</section>
@endsection