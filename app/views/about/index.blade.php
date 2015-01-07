@extends('master')

@section('title', 'About')

@section('content')


	<div class="container">
	@foreach($abouts as $about)
	ID:              {{$about->id}}<br>
	user_iD:         {{$about->user_id}}<br>
	About:           {{$about->about_us}}
	<li><a href="/about/{{Sentry::getUser()->id}}/edit">edit</a></li>
	@endforeach

	</div>


@stop