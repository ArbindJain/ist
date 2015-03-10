@extends('master')

@section('title', 'Profile')

@section('content')
<!-- ****** Display profile image,name and other suff ***** -->
<div class="row">
  @include('partials._profiledisplay')
</div>
<div class="row">
  <div class="col-md-12 centered-pills">
    <div class="sub-nav-block">
    <ul class="nav nav-pills">
      <li role="navigation" class="active"><a href="#photo" aria-controls="photo" role="tab" data-toggle="tab">Photo</a></li>
      <li role="navigation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a></li>
      <li role="navigation"><a href="#audio" aria-controls="audio" role="tab" data-toggle="tab">Audio</a></li>
      <li role="navigation"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">Recent Activity</a></li>
      <li role="navigation"><a href="#blog" aria-controls="blog" role="tab" data-toggle="tab">Blog</a></li>
      <li role="navigation"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
    </ul>
    </div>
    <div class="tab-content">
    <div class="clearfix"></div>
      <div role="tabpanel" class="tab-pane active" id="photo">
        <span class="album-block">
        <h3 class="pull-left"> <i class="fa fa-file-image-o"></i> Photos</h3>
        </span>
        <div class="col-md-8">
          <div class="row">
          @foreach($pics as $pic)
            <div class="col-md-4">
              {{$pic->albumname}}
            </div>
          @endforeach
            
            
          </div>
          
        </div>
        <div class="col-md-4">
          User review block ----------------------
        </div>
        <div class="pull-left" >
        
        </div>
               
      </div>
      <div role="tabpanel" class="tab-pane" id="video">2...</div>
      <div role="tabpanel" class="tab-pane" id="audio">3...</div>
      <div role="tabpanel" class="tab-pane" id="recent">4...</div>
      <div role="tabpanel" class="tab-pane" id="blog">2...</div>
      <div role="tabpanel" class="tab-pane" id="about">3...</div>
    </div>
  </div>
</div>
<div class="row">
	<div class="col-md-12">
		
		
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
  <div class="col-md-6">
 
      {{ Form::open(array('route' => 'connec.store', 'class' => 'form'))}}
          {{Form::hidden('connect_id',$userprofile->id)}}  
      {{ Form::submit('Connect '.$userprofile->name, ['class' => 'btn btn-md btn-danger btn-block']) }}



@stop