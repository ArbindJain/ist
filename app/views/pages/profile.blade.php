@extends('master')

@section('title', 'Home')

@section('content')
	
<div class="row">
	<div class="col-md-12">
		{{ HTML::image($userprofile->profileimage , 'profile picture', array('class' => 'img-circle pull-right')) }}
	
		{{$userprofile->name}}<br />
		<h3>Title</h3><p>{{$userprofile->title}}</p>
	<h3>Joined Date</h3><p>{{$userprofile->created_at->toFormattedDateString();}} </p>
	<h3>Address</h3><p>{{$userprofile->city}},{{ $userprofile->country}}</p>
	




	</div>
</div>

<div class="row">
	<div class="col-md-3">
			You are Following {{$followingcount}} {{str_plural('user',$followingcount)}} <br />
			You have {{$followedbycount}} {{str_plural('Follower',$followedbycount)}} <br />
		@if(Sentry::check())

        @if(is_null($followings))
          @if($userprofile->id != Sentry::getuser()->id)

          {{ Form::open(array('action' => 'FollowersController@follow', 'method' => 'post')) }}
          {{ Form::token(); }}
          {{Form::hidden('follow_id',$userprofile->id)}}
         
          <div class="form-group">
			{{ Form::submit('Follow '.$userprofile->name, ['class' => 'btn btn-md btn-success btn-block']) }}
			</div>
          {{ Form::close();}}
          @endif
          
          @else
           @if($userprofile->id != Sentry::getuser()->id)
          {{ Form::open(array('action' => 'FollowersController@unfollow', 'method' => 'delete')) }}
          {{ Form::token(); }}

          {{Form::hidden('userfollow_id',$userprofile->id)}}
          <div class="form-group">
			{{ Form::submit('unFollow '.$userprofile->name, ['class' => 'btn btn-md btn-danger btn-block']) }}
			</div>
          {{ Form::close();}} 
          @endif
          
        @endif
        @else 
        {
        Login to follow
        }

        @endif


		

	
	</div>
</div>

@stop