@extends('master')

@section('title', 'Home')

@section('content')
	
<div class="row">
	<div class="col-md-12">
		{{ HTML::image($user->profileimage , 'profile picture', array('class' => 'img-circle pull-right')) }}
	
		{{$user->name}}<br />
		<h3>Title</h3><p>{{$user->title}}</p>
	<h3>Joined Date</h3><p>{{$user->created_at->toFormattedDateString();}} </p>
	<h3>Address</h3><p>{{$user->city}},{{ $user->country}}</p>
	
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="helper-block text-center">Followers module</div>
	
	</div>
</div>

@stop