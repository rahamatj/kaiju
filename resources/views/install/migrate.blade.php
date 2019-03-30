@extends('kaiju::install.layout')

@section('title', 'Migrate')

@section('content')
<section class="post-body">
    <h1>Database migrated successfully!</h1>
    <p>Next: <a href="{{ route('kaiju.roar') }}">Roar!</a></p>
</section>
@endsection