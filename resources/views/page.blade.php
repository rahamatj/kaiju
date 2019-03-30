@extends('view::layout')

@section('title')
    @yield('title')
@endsection

@section('page')
    @yield('header')

    @include('kaiju::includes.nav')

    @yield('content')

    @include('kaiju::includes.footer')
@endsection