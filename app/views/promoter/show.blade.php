@extends('master')

@section('title', 'Edit Profile')

@section('content')
<div class="row">
	<div class="col-md-12">
  
    
    <div class="">
      @if (Session::has('flash_message'))
      <p>{{ Session::get('flash_message') }}</p>
  @endif

  @if (Sentry::check())
    <p>{{ "Welcome, " . $user->name }}</p>
  @endif
  {{ HTML::image($user->profileimage , 'profile picture', array('class' => 'img-circle pull-right')) }}
  <h3>Joined Date</h3><p class="text-muted">{{$user->created_at->toFormattedDateString();}} </p>
  <h3>Address</h3><p class="text-muted">{{$user->city}},{{ $user->country}}</p>
  <h3>About</h3><p class="text-muted">{{$about->about_us}}</p><br>

      <!--Cant use link_to_route because  I didnt name it....-->

      @if(Sentry::check())

    {{ link_to_route('promoter.edit', 'Edit Your Profile', $user->id, ['class' => 'btn btn-primary']) }}

  @endif
      </div>
      

    </div>
	</div>

@stop