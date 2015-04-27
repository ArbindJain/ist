@extends('master')

@section('title', 'Profile')

@section('content')
<!-- ****** Display profile image,name and other suff ***** -->
<script>
// autoload tabs
$(document).ready(function() {
  if (window.location.hash) {
    $("a[href='" + window.location.hash + "']").tab("show");
  }
});
</script>

<div class="row">
  @include('partials._profiledisplay')
</div>
<div class="row">
  <div class="col-md-12 ">
    <div class="sub-nav-block">
    <ul class="nav nav-pills centertab">
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
        <div class="col-md-8">
          <div class="row">
          @foreach($all_albums as $allalbum)
            <div class="col-md-4">
             <a href="{{ URL::to('real', array('id' => $allalbum->id)) }}">
              @if(isset($allalbum->picture))
              <figure>
                <img src="{{url()}}/{{$allalbum->picture->picturename}}-resiged.jpg" class="">
                <figcaption>{{$allalbum->picture->picturetitle}}</figcaption>
              </figure>
              @endif
               </a>       
            </div>
             

          @endforeach
          </div>
         
          
        </div>
        <div class="col-md-4">

        @include('partials._audienceentry')

        </div>
        
               
      </div>
      <div role="tabpanel" class="tab-pane" id="video">
         <!-- video uploaded by the user display -->
        
        <div class="col-md-8">
          <div class="row gallery">
            @foreach($user_videos as $uservid)
            <div class="col-md-6 gallery-image gallery-viewer-image" data-image-id="{{$uservid->id}}">
              <div class="gallery-image-overlay"></div>
              <img>
              <span class="gv-video">
                <div class="flowplayer">
                  <video>
                    <source type="video/webm" src="{{url()}}/galleryvideo/webm/{{$uservid->videosrc}}.webm">
                    <source type="video/mp4"   src="{{url()}}/galleryvideo/mp4/{{$uservid->videosrc}}.mp4">
                    <source type="video/flash" src="{{url()}}/galleryvideo/flv/{{$uservid->videosrc}}.flv">

                  </video>
                </div>
              </span>
              <div class="gallery-viewer-image-content" style="display: none;">
                <!-- inserted as is -->
                <div class="img-title">{{$uservid->videotitle}}</div>
                <div class="img-description">{{$uservid->videodescription}}</div>
                 <!-- // -->
                <!--- Video like button !-->
                  @include('partials._videolikebutton')
                <!--- End Video like button -!-->

                <span class="img-comment-wrapper comment-target">
                  @foreach($uservid->commented as $comments)
                  <div class="img-comment comment-block-{{$comments->id}}">
                    <a href="#"> <b>{{Sentry::findUserById($comments->user_id)->name}}&nbsp;&nbsp;&nbsp;</b></a>
                    <span>{{$comments->comment}}<br></span><br>
                      <div class="com-details">
                        <div class="com-time-container">
                          {{ $comments->created_at->diffForHumans() }} ·
                          
                        </div>
                      </div>
                    </div>
                  </span>
                  @endforeach
                </span>
                </div>
                <div class="gallery-viewer-image-content-bottom" style="display: none;"> 
                  <div class="img-newcomment">
                    {{ Form::open(['data-remote' => $uservid->id,'route' => 'comments.store','class'=>'commentform' ]) }}
                    {{Form::hidden('blog_id',$uservid->id)}}
                    {{Form::hidden('model','Video')}}
                    <div class="form-group">
                      {{ Form::textarea('commentbody', null, ['placeholder' => 'Write a comment... ','rows' => '4', 'class' => 'form-control text-shift', 'required' => 'required'])}}
                      {{ errors_for('commentbody', $errors) }}
                    </div>
                    <!-- Submit field -->
                    <div class="form-group">
                      {{ Form::submit('comment', ['class' => 'btn btn-md btn-default btn-block']) }}

                    </div>
                    {{ Form::close() }}
                  </div><!-- /img-newcomment -->
                </div>
            </div>
            @endforeach   

          </div>
        </div>
        <div class="col-md-4">
          @include('partials._audienceentry')
        </div>

      </div>
      <div role="tabpanel" class="tab-pane" id="audio">
       <!-- video uploaded by the user display -->
        
        <div class="col-md-8">

          <div class="row gallery">
          @foreach($user_audios as $useraud)
            <div class="col-md-6 gallery-image gallery-viewer-image" data-image-id="{{$useraud->id}}">
              <div class="gallery-image-overlay"></div>
              <img>
              <span class="gv-audio">
                <div id="player" style="background-color:#000" class="flowplayer fixed-controls play-button is-splash is-audio" data-engine="audio" data-embed="false">
              <video preload="none">
                <source type="video/ogg" src="{{url()}}/galleryaudio/ogg/{{$useraud->audiosrc}}.ogg">
              </video>
              </div>
              </span>
              <div class="gallery-viewer-image-content" style="display: none;">
                <!-- inserted as is -->
                <div class="img-title">{{$useraud->videotitle}}</div>
                <div class="img-description">{{$useraud->videodescription}}</div>
                 <!-- // -->
                 <!--- Audio like button !-->
                  @include('partials._audiolikebutton')
                <!--- End Audio like button -!-->

                <span class="img-comment-wrapper comment-target">
                  @foreach($useraud->commented as $comments)
                  <div class="img-comment comment-block-{{$comments->id}}">
                    <a href="#"> <b>{{Sentry::findUserById($comments->user_id)->name}}&nbsp;&nbsp;&nbsp;</b></a>
                    <span>{{$comments->comment}}<br></span><br>
                      <div class="com-details">
                        <div class="com-time-container">
                          {{ $comments->created_at->diffForHumans() }} ·
                          
                        </div>
                      </div>
                    </div>
                  </span>
                  @endforeach
                </span>
                </div>
                <div class="gallery-viewer-image-content-bottom" style="display: none;"> 
                  <div class="img-newcomment">
                    {{ Form::open(['data-remote' => $useraud->id,'route' => 'comments.store','class'=>'commentform' ]) }}
                    {{Form::hidden('blog_id',$useraud->id)}}
                    {{Form::hidden('model','Audio')}}
                    <div class="form-group">
                      {{ Form::textarea('commentbody', null, ['placeholder' => 'Write a comment... ','rows' => '4', 'class' => 'form-control text-shift', 'required' => 'required'])}}
                      {{ errors_for('commentbody', $errors) }}
                    </div>
                    <!-- Submit field -->
                    <div class="form-group">
                      {{ Form::submit('comment', ['class' => 'btn btn-md btn-default btn-block']) }}

                    </div>
                    {{ Form::close() }}
                  </div><!-- /img-newcomment -->
                </div>
            </div>
          @endforeach
          <!-- temp data-->
          <div class="row gallery">
            @foreach($user_videos as $uservid)
            
            @endforeach   

          </div>

          <!-- end if temp data -->
   
          </div>

        </div>
        <div class="col-md-4">
          @include('partials._audienceentry')
        </div>


      </div>
      <div role="tabpanel" class="tab-pane" id="recent">4...</div>
      <div role="tabpanel" class="tab-pane" id="blog">
        

        <div class="col-md-8">
          @foreach($articles as $article)
            
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="https://secure.gravatar.com/avatar/8a8bf3a2c952984defbd6bb48304b38e?s=80&d=retro&r=G" style="width: 64px; height: 64px;">
                </a>
              </div>
              <div class="media-body text-left">
                <h4 class="media-heading" id="top-aligned-media">{{$article->title}}<a class="anchorjs-link" href="#top-aligned-media"><span class="anchorjs-icon"></span></a></h4>
                <p class="text-left">
                  {{ substr(preg_replace('/(<.*?>)|(&.*?;)/', '', $article->body), 0, 200) }}
                </p>
           {{ link_to_route('blog.show', 'Read More', $article->id, ['class' => 'btn btn-default']) }}
             
          


              </div>

            </div>  

          @endforeach         
        </div>
        <div class="col-md-4">
          @include('partials._audienceentry')
        </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="about">
        
        <div class="col-md-8">
          <div class="col-md-6">
            <div class="about-details-block" >
              <span class="about-title text-capitalize">Name</span>
              <span class="text-muted">{{Sentry::findUserById($abouts->user_id)->name}}</span>
            </div>
            <div class="about-details-block" >
              <span class="about-title text-capitalize">DOB</span>
              <span class="text-muted">{{Sentry::findUserById($abouts->user_id)->dob}}</span>
            </div>
            <div class="about-details-block" >
              <span class="about-title text-capitalize">Gender</span>
              <span class="text-muted">{{Sentry::findUserById($abouts->user_id)->gender}}</span>
            </div>
            <div class="about-details-block" >
              <span class="about-title text-capitalize">Email</span>
              <span class="text-muted">{{Sentry::findUserById($abouts->user_id)->email}}</span>
            </div>
            <div class="about-details-block">
              <span class="about-title text-capitalize">Title</span>
              <span class="text-muted text-title text-capitalize">{{Sentry::findUserById($abouts->user_id)->title}}</span>
            </div>
            <div class="about-details-block">
              <span class="about-title text-capitalize">Phone</span>
              <span class="text-muted">{{Sentry::findUserById($abouts->user_id)->phone}}</span>
            </div>
            
            <div class="about-details-block">
              <span class="about-title text-capitalize">talent fields</span><br>
              <div class="about-talent-field">
                @if(isset(Sentry::findUserById($abouts->user_id)->art))
                <span>Arts</span>

                @else
                 
                @endif
                @if(isset(Sentry::findUserById($abouts->user_id)->collection))
                <span>Collection</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($abouts->user_id)->cooking))
                <span>Cooking</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($abouts->user_id)->dance))
                <span>Dance</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($abouts->user_id)->fashion))
                <span>Fashion</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($abouts->user_id)->moviesandtheatre))
                <span>Movies&Theatre</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($abouts->user_id)->music))

                @else
                 
                @endif
                @if(isset(Sentry::findUserById($abouts->user_id)->sports))
                <span>Sports</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($abouts->user_id)->unordinary))
                <span>Unordinary</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($abouts->user_id)->wanderer))
                <span>Wanderer</span>
                @else
                 
                @endif
              </div>
            </div>
            


            
          </div>

          <div class="col-md-6">
          @if(!is_null($abouts->video))
            <div class="flowplayer" style="background-color:#000;">
               <video>
                  <source type="video/webm" src="{{url()}}/aboutvideo/webm/{{$abouts->video}}.webm">
                  <source type="video/mp4"   src="{{url()}}/aboutvideo/mp4/{{$abouts->video}}.mp4">
                  <source type="video/flash" src="{{url()}}/aboutvideo/flv/{{$abouts->video}}.flv">
               </video>
            </div>
          @endif
          </div>
          <div class="col-md-12">
            <div class="profile-blocks">
              <div class="about-details-block" >
                <span class="profile-title text-capitalize">About me</span><br>
                <span class="text-muted">{{$abouts->about_us}}</span>
              </div>
              <div class="about-details-block" >
                <span class="profile-title text-capitalize">Awards or Achievements</span><br>
                @foreach($rewards as $reward)
                <span class="text-muted">
                  {{$reward->achievements}}
                </span><br>
                @endforeach
                <ul class="list-inline reward-img">
                @foreach($rewards as $reward)
                  <li><img src="{{url()}}/achievementcertificate/{{$reward->achievement_certificate}}" class="sizeforcertificate responsive "><p>{{substr($reward->achievements,0,30)}}...</p></li>
                @endforeach 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          @include('partials._audienceentry')
        </div>
      </div>
    </div>
  </div>
      </div>
    </div>
  </div>
</div>
<!--
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
-->

            {{ HTML::script('/js/gallery-viewer.js')}}
            <script>
              window.GalleryViewer.settings.resource_path = "{{url('Images')}}";
            </script>
            {{ HTML::script('/js/remote-comment.js')}}
            <script>
              window.RemoteComment.settings.comment_url = "{{url('comments')}}";
            </script>
@stop