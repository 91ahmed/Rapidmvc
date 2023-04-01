@extends('layout/main')
@section('title', 'RapidMvc')

@section('content')
	
	<a href="/home" class="route-link" data-params="?page=1">Home</a>
	<a href="/about" class="route-link" data-params="?page=2">About</a>
	<a href="/contact" class="route-link" data-params="?page=3">Contact</a>

	<div id="demo"></div>

@endsection