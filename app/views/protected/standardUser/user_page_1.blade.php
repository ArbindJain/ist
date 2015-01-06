@extends('master')

@section('title', 'Registered Users')

@section('content')

	@if (Session::has('flash_message'))
			<p>{{ Session::get('flash_message') }}</p>
	@endif

	@if (Sentry::check())
		<p>{{ "Welcome, " . Sentry::getUser()->name }}</p>
	@endif

	<p>This is for stars-users only!</p>
	{{ HTML::image(Sentry::getUser()->profileimage , 'profile picture', array('class' => 'img-circle pull-right')) }}
	<h3>Title</h3><p>{{Sentry::getUser()->title}}</p>
	<h3>Joined Date</h3><p>{{Sentry::getUser()->created_at->toFormattedDateString();}} </p>
	<h3>Address</h3><p>{{Sentry::getUser()->city}},{{ Sentry::getUser()->country}}</p>
	
@if(Sentry::check())

		{{ link_to_route('profiles.edit', 'Edit Your userProfile', Sentry::getUser()->id, ['class' => 'btn btn-primary']) }}
		
	@endif
@stop