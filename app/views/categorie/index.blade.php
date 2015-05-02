@extends('master')

@section('title', 'Home')

@section('content')
<div class="row">
	<div class="col-md-12">
		
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
						<div class="clearfix"></div>
						<p style=" margin-left: 59px; padding: 4px 5px; background-color:#515151; color:#fff; width: 470px;">{{$new->postedtitle}}</p>
						@elseif($new->model == 'Video')
						<div class="flowplayer videobackground" id="postedimage">
			               <video>
			                  <source type="video/webm" src="{{url()}}/galleryvideo/webm/{{$new->postedimage}}.webm">
			                  <source type="video/mp4"   src="{{url()}}/galleryvideo/mp4/{{$new->postedimage}}.mp4">
			                  <source type="video/flash" src="{{url()}}/galleryvideo/flv/{{$new->postedimage}}.flv">

			               </video>
			            </div>
			            <div class="clearfix"></div>
						<p style=" margin-left: 59px; margin-top:-10px; padding: 4px 5px; background-color:#515151; color:#fff; width: 470px;">{{$new->postedtitle}}</p>
						
			            
			            @elseif($new->model == 'Audio')
				              <div id="player" style="background-color:#000"  class="flowplayer postedaudio fixed-controls play-button is-splash is-audio" data-engine="audio" data-embed="false">
				              <video preload="none">
				                <source type="video/ogg" src="{{url()}}/galleryaudio/ogg/{{$new->postedimage}}.ogg">
				              </video>
				              </div>
				              <div class="clearfix"></div>
						<p style=" margin-left: 59px; margin-top:-10px; padding: 4px 5px; background-color:#515151; color:#fff; width: 470px;">{{$new->postedtitle}}</p>
						

			            @else

						@endif
					</div>
					<div class="likeandcomment">
					<div class="like-box" style="margin-bottom: 4px;">
              			<!-- Like and Unlike Button For Photo
						======================================-->
						<div class="img-like">
							<a class="likebutton-{{$new->postid}}{{$new->model}} like-button" data-realclass="likebutton-{{$new->postid}}{{$new->model}}" data-model="{{$new->model}}" data-id="{{$new->postid}}" data-iconclass="{{isset($new->liked)?'fa fa-thumbs-down':'fa fa-thumbs-up'}}" data-action="{{isset($new->liked)?'unlike':'like'}}">
								<i class="{{isset($new->liked)?'fa fa-thumbs-down':'fa fa-thumbs-up'}}"></i>
								&nbsp;
								<span class="btntext">{{isset($new->liked)?'Unlike':'Like'}}</span>
							</a>
						</div>
						<!-- EndLike and Unlike Button For Photo
						======================================-->
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
								</div><br>
							</div>
							@endforeach
						</div>
							{{ Form::open(['data-remote','route' => 'comments.store','class'=>'commentform' ]) }}
							{{Form::hidden('blog_id',$new->postid)}}
							{{Form::hidden('model',$new->model)}}
							<div class="form-group">
							{{ Form::textarea('commentbody', null, ['placeholder' => 'Write a comment... ','rows' => '1', 'class' => 'form-control text-shift', 'required' => 'required'])}}
							{{ errors_for('commentbody', $errors) }}

							{{ Form::submit('comment', ['class' => 'btn btn-md btn-default pull-right']) }}
							</div>
							{{ Form::close() }}
					</div>
					</div>

					
					<div class="clearfix"></div>
					@endforeach
					
				</div>
				<div class="col-md-4">

				</div> 
			</div>
			<div role="tabpanel" class="tab-pane" id="corporatefeed">
				<div class="col-md-8">
					
				</div>
				<div class="col-md-4">

				</div> 
			</div> 
		</div>


@stop