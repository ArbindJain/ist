@extends('master')

@section('title', 'Home')

@section('content')
<div class="row">
	<div class="col-md-12">
		<ul class="nav nav-pills centertab">
              <li role="navigation" class="active"><a href="#newsfeed" aria-controls="newsfeed" role="tab" data-toggle="tab">News Feed</a></li>
              <li role="navigation"><a href="#corporatefeed" aria-controls="corporatefeed" role="tab" data-toggle="tab">Corporate Feed</a></li>
        </ul>
        <hr>
        <div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="newsfeed">
				<div class="col-md-8">
					@foreach($newarray as $new)
					<div class="feed-container">
						<div class="feeduser_avatar">
						<a href="#">
							{{ HTML::image($new->userpicture , 'profile picture', array('class' => 'img-circle pull-left','id' => 'feediconsize')) }}
						</a>
						</div>
						<div class="feeduser_name">
							<a href="#">
								{{$new->username}}
							</a>
						</div>
						<div class="feeduser_postedon">
							<p>
								{{$new->postedon}}
							</p>
						</div>
						@if($new->model == 'Picture')

						<img src="{{url()}}/{{$new->postedimage}}-resiged.jpg" class="img pull-left" id="postedimage">
						{{$new->postedtitle}}
						@elseif($new->model == 'Video')
						<div class="flowplayer videobackground" id="postedimage">
			               <video>
			                  <source type="video/webm" src="{{url()}}/galleryvideo/webm/{{$new->postedimage}}.webm">
			                  <source type="video/mp4"   src="{{url()}}/galleryvideo/mp4/{{$new->postedimage}}.mp4">
			                  <source type="video/flash" src="{{url()}}/galleryvideo/flv/{{$new->postedimage}}.flv">

			               </video>
			            </div>
			            {{$new->postedtitle}}
			            @elseif($new->model == 'Audio')
				              <div id="player" style="background-color:#000"  class="flowplayer postedaudio fixed-controls play-button is-splash is-audio" data-engine="audio" data-embed="false">
				              <video preload="none">
				                <source type="video/ogg" src="{{url()}}/galleryaudio/ogg/{{$new->postedimage}}.ogg">
				              </video>
				              </div>
				              {{var_dump($new->postedtitle)}}

			            @else

						@endif
					</div>
					<div class="like-box">
              		<a class="likebutton" data-model="{{$new->model}}" data-id="{{$new->postid}}" data-action="{{isset($new->liked)?'unlike':'like'}}"><i class="fa fa-star-o"></i>&nbsp;<span class="btntext">{{isset($new->liked)?'Unlike':'Like'}}</span></a>
					</div>
					<div class="comment-box">
						<div class="comment-view-{{$new->postid}} comment-feed refresh"  >

							{{-- */ $i = 0; /* --}}
							@foreach($new->commented as $comments)

							<div class="comment-block-{{$comments->id}}">
								<a href="#"> <b>{{Sentry::findUserById($comments->user_id)->name}}&nbsp;&nbsp;&nbsp;</b></a>
								<span>{{$comments->comment}}<br></span>
								<div class="com-details">
								<div class="com-time-container">
									{{ $comments->created_at->diffForHumans() }} ·
								</div>
								</div>
							</div>
							@endforeach
						</div>
							{{ Form::open(['data-remote','route' => 'comments.store','class'=>'commentform' ]) }}
							{{Form::hidden('blog_id',$new->postid)}}
							{{Form::hidden('model',$new->model)}}
							<div class="form-group">
							{{ Form::textarea('commentbody', null, ['placeholder' => 'Write a comment... ','rows' => '1', 'class' => 'form-control text-shift', 'required' => 'required'])}}
							{{ errors_for('commentbody', $errors) }}
							</div>
							<!-- Submit field -->
							<div class="form-group">
							{{ Form::submit('comment', ['class' => 'btn btn-md btn-default btn-block']) }}
							</div>
							{{ Form::close() }}
					</div>

					
					<div class="clearfix"></div>
					@endforeach
				</div>
				<div class="col-md-4">

				</div> 
			</div>
			<div role="tabpanel" class="tab-pane" id="corporatefeed">
				<div class="col-md-8">
					vnewsfeednewsfeed
				</div>
				<div class="col-md-4">

				</div> 
			</div> 
		</div>
	</div>
</div>


@stop