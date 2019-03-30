@extends('kaiju::layout')

@section('title', $type)

@section('header')
    @include('kaiju::includes.header')
@endsection

@section('content')
<section class="list">
    @foreach ($posts as $post)
    <div class="item">
        <a class="url" href="{{ route(\Str::slug($type) . '.show', [
            'post' => $post
        ]) }}">
            <aside class="date"><time datetime="{{ $post->date()->format('d-m-Y') }}">{{ $post->date()->format('M d Y') }}</time></aside>
            <h3 class="title">{{ $post->title }}</h3>
        </a>
    </div>
    @endforeach
</section>
{{ $posts->links('kaiju::includes.pagination') }}
@endsection