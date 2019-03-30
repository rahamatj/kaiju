@extends('kaiju::install.layout')

@section('title', 'Install')

@section('content')
<section class="post-body">
    <h1>Roar! Kaiju installed successfully!</h1>
    <h2>Enjoy!</h2>
    <p>Next: <a href="{{ route('kaiju.migrate') }}">Migrate database!</a></p>
</section>
@endsection