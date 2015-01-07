@extends('master')

@section('title', 'About')

@section('content')


	<div class="container">
	@foreach($abouts as $about)
	<h3>ID        </h3>   {{$about->id}} <br>
	<h3>USER ID    </h3>   {{$about->user_id}}<br>
	<h3>ABOUT      </h3>    {{$about->about_us}}<br><br>
	<a href="/about/{{Sentry::getUser()->id}}/edit" class="btn btn-primary">edit Profile</a>
	@endforeach

	</div>


@stop