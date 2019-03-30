@extends('kaiju::layout')

@section('title', $post->title)

@section('content')
<h1 class="title">{{ $post->title }}</h1>

<span class="date">
    <time datetime="{{ $post->date()->format('d-m-Y') }}">{{ $post->date()->format('l. M d, Y') }}</time>
</span>

<section class="post-body">
    {!! $post->body !!}
</section>
@endsection