@extends('master')

@section('title', 'Home')

@section('content')
<style>
.users-block{
	display: block;
	padding: 20px;
	background-color: #eae8e8;
	margin:5px;
}
	

</style>
<div class="row">
	<div class="col-md-12">
<!--	<ul class="nav navbar-nav"><ul class="nav navbar-nav navbar-right">
		      @if (Sentry::check())
		      	 @if (Sentry::findUserByID(Sentry::getUser()->id)->inGroup(Sentry::findGroupByName('Stars')))


		        <li class="{{ set_active('/') }}"><a href="/">Home</a></li>
		       <li class="{{ set_active('userProtected') }}"><a href="/userProtected">User Signup</a></li>
		       <li class="{{ set_active('about') }}"><a href="/about">User About</a></li>
		       <li class="{{ set_active('imagegallery') }}"><a href="/imagegallery">Image Gallery</a></li>
			   <li class="{{ set_active('videogallery') }}"><a href="/videogallery">Video Gallery</a></li>
			   <li class="{{ set_active('audiogallery') }}"><a href="/audiogallery">Audio Gallery</a></li>
			   <li class="{{ set_active('blog') }}"><a href="/blog">Blog</a></li>
				
				@elseif (Sentry::findUserByID(Sentry::getUser()->id)->inGroup(Sentry::findGroupByName('Audiences')))
					<li class="{{ set_active('audiogallery') }}"><a href="/audiogallery">Audio Gallery</a></li>
				
			   <li class="{{ set_active('blog') }}"><a href="/blog">Blog</a></li>
				@elseif (Sentry::findUserByID(Sentry::getUser()->id)->inGroup(Sentry::findGroupByName('Promoters')))
					  <li class="{{ set_active('promoter') }}"><a href="/promoter/{{Sentry::getUser()->id}}">Profile</a></li>
					  <li class="{{ set_active('events') }}"><a href="/events">Events</a></li>

				@endif
				@else
				<li class="{{ set_active('/') }}"><a href="/">Home</a></li>
		       <li class="{{ set_active('userProtected') }}"><a href="/userProtected">User Signup</a></li>
		       <li class="{{ set_active('about') }}"><a href="/about">User About</a></li>
		       <li class="{{ set_active('imagegallery') }}"><a href="/imagegallery">Image Gallery</a></li>
			   <li class="{{ set_active('videogallery') }}"><a href="/videogallery">Video Gallery</a></li>
			   <li class="{{ set_active('audiogallery') }}"><a href="/audiogallery">Audio Gallery</a></li>
			   <li class="{{ set_active('blog') }}"><a href="/blog">Blog</a></li>
				@endif
		      </ul>
		     
					
		      </ul>

		      <ul class="nav navbar-nav navbar-right">
		      	@if (!Sentry::check())
					<li class="{{ set_active('register') }}"><a href="/register">Register</a></li>
					<li class="{{ set_active('login') }}"><a href="/login">Login</a></li>
				@else
					<li class="{{ set_active('profiles') }}"><a href="/profiles/{{Sentry::getUser()->id}}">My Profile</a></li>
					<li><a href="/logout">Logout</a></li>
				@endif
		      </ul>-->
	@foreach($users as $user)
	
		
		<div class="pull-left users-block">
			{{ HTML::image($user->profileimage , 'profile picture', array('class' => 'img-circle pull-right')) }}
	
			<p>{{$user->name}}</p>
			<!--direct route referncing name should be first param of a route...-->
			{{ link_to_route('user', 'show', array($user->id,$user->name), array('class' => 'btn btn-info')) }}
		</div>
			
		
			
		
	
		
	@endforeach
	</div>
</div>

@stop