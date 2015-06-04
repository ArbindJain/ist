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
  <div class=" profile-main-block  col-md-offset-4 col-md-8">
    {{ HTML::image($userprofile->profileimage , 'profile picture', array('class' => 'img-circle pull-left','id' => 'size')) }}
    <span>
      <ul class="list-unstyled pull-left name-block text-capitalize">
        <li class="name-space "><h3>{{$userprofile->name}}</h3></li>
        <li class="title-space ">{{$userprofile->titlea}}&nbsp;{{$userprofile->titleb}}&nbsp;{{$userprofile->titlec}}</li>
        <li class="address-space">{{$userprofile->city}},{{ $userprofile->country}}</li>
      </ul>
    </span>
    
  </div>
          
         
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
      <div role="tabpanel" class="tab-pane fade in active" id="photo">
        <div class="col-md-8">
          <div class="row">
          @foreach($all_albums as $allalbum)
            <div class="col-md-4">
             <a href="{{ URL::to('userprofilepicture', array('id' => $allalbum->id)) }}">
              @if(isset($allalbum->picture))
              <figure>
                <img src="{{url()}}/{{$allalbum->picture->picturename}}-." class="">
                <figcaption>{{$allalbum->picture->picturetitle}}</figcaption>
              </figure>
              @endif
               </a>       
            </div>
             

          @endforeach
          </div>
         
          
        </div>
        <div class="col-md-4">

            <div class="review-block">
<h5> Audience review </h5>
</div>

@foreach($reviewaudis as $reviews)
<div class="review-body">

<p>
  <b>
  @foreach($reviews->username as $rev)
    <a href="{{url()}}/user/{{$rev->id}}?{{$rev->name}}">
      {{$rev->name}}
    </a>
  @endforeach
  </b> 
  <br>
  {{$reviews->review}}
</p>


<!--<span class="author">
<footer class="pull-right">{{$reviews->created_at->diffForHumans()}}</footer>
</span>-->
</div>

@endforeach
        </div>
        
               
      </div>
      <div role="tabpanel" class="tab-pane fade" id="video">
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
                
                <div class="feed-container light-container">
                  <div class="feeduser_avatar">
                  <a href="#">
                    <img src="{{url()}}/{{Sentry::findUserById($uservid->user_id)->profileimage}}" class="img-circle light-avatar pull-left">
                  </a>
                  </div>
                  <div class="feeduser_name light-name" >
                    <a href="#">
                      {{Sentry::findUSerById($uservid->user_id)->name}}
                    </a>
                  </div>
                  <div class="feeduser_postedon text-muted">
                    <p>
                      {{$uservid->created_at->diffForHumans()}}
                    </p>
                  </div>
                </div>
                <div class="img-title">{{$uservid->videotitle}}</div>
                <div class="img-description"><p>{{$uservid->videodescription}}</p></div>
                 <!-- // -->
                <!--- Video like button !-->
                  @include('partials._videolikebutton')
                <!--- End Video like button -!-->

                <span class="img-comment-wrapper">
                  @foreach($uservid->commented as $comments)
                  <div class="comment-block-{{$comments->id}} comment-wrapper">
                  <div class="lightcom-info pull-left">
                    <a href="#"><b>{{Sentry::findUserById($comments->user_id)->name}}&nbsp;&nbsp;&nbsp;</b></a>
                  </div>
                  @if(strlen($comments->comment) >= 30)
                  <br>
                  @else
                  @endif
                  <div class="lightcom-comment">
                    
                  <p class="comment-container" style="">{{$comments->comment}}</p>

                  <p class="text-muted"> {{ $comments->created_at->diffForHumans() }} </p>
                  </div>
                  
                </div>
                <div class="clearfix"></div>
                  @endforeach
                  <div class="comment-target"></div>
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
          <div class="review-block">
<h5> Audience review </h5>
</div>

@foreach($reviewaudis as $reviews)
<div class="review-body">

<p>
  <b>
  @foreach($reviews->username as $rev)
    <a href="{{url()}}/user/{{$rev->id}}?{{$rev->name}}">
      {{$rev->name}}
    </a>
  @endforeach
  </b> 
  <br>
  {{$reviews->review}}
</p>


<!--<span class="author">
<footer class="pull-right">{{$reviews->created_at->diffForHumans()}}</footer>
</span>-->
</div>

@endforeach
        </div>

      </div>
      <div role="tabpanel" class="tab-pane fade" id="audio">
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
                <div class="feed-container light-container">
                  <div class="feeduser_avatar">
                  <a href="#">
                    <img src="{{url()}}/{{Sentry::findUserById($useraud->user_id)->profileimage}}" class="img-circle light-avatar pull-left">
                  </a>
                  </div>
                  <div class="feeduser_name light-name" >
                    <a href="#">
                      {{Sentry::findUSerById($useraud->user_id)->name}}
                    </a>
                  </div>
                  <div class="feeduser_postedon text-muted">
                    <p>
                      {{$useraud->created_at->diffForHumans()}}
                    </p>
                  </div>
                </div>
                <div class="img-title">{{$useraud->videotitle}}</div>
                <div class="img-description">{{$useraud->videodescription}}</div>
                 <!-- // -->
                 <!--- Audio like button !-->
                  @include('partials._audiolikebutton')
                <!--- End Audio like button -!-->

                <span class="img-comment-wrapper">
                  @foreach($useraud->commented as $comments)
                  <div class="comment-block-{{$comments->id}} comment-wrapper">
                  <div class="lightcom-info pull-left">
                    <a href="#"><b>{{Sentry::findUserById($comments->user_id)->name}}&nbsp;&nbsp;&nbsp;</b></a>
                  </div>
                  @if(strlen($comments->comment) >= 30)
                  <br>
                  @else
                  @endif
                  <div class="lightcom-comment">
                    
                  <p class="comment-container" style="">{{$comments->comment}}</p>

                  <p class="text-muted"> {{ $comments->created_at->diffForHumans() }} </p>
                  </div>
                  
                </div>
                <div class="clearfix"></div>
                  @endforeach
                  <div class="comment-target"></div>
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
          <div class="review-block">
<h5> Audience review </h5>
</div>

@foreach($reviewaudis as $reviews)
<div class="review-body">

<p>
  <b>
  @foreach($reviews->username as $rev)
    <a href="{{url()}}/user/{{$rev->id}}?{{$rev->name}}">
      {{$rev->name}}
    </a>
  @endforeach
  </b> 
  <br>
  {{$reviews->review}}
</p>


<!--<span class="author">
<footer class="pull-right">{{$reviews->created_at->diffForHumans()}}</footer>
</span>-->
</div>

@endforeach
        </div>


      </div>
      <div role="tabpanel" class="tab-pane fade" id="recent">
        <!-- recent activity start -->
     <div class="col-md-8">
     @if($newarray == 'NULL')

     @else
        @foreach($newarray as $new)
    <div class="">
        <div class="col-md-6"> 
          <div class="feedbox gallery-image gallery-viewer-image" data-image-id="{{$new->postid}}" style="width: 100%; height: 100%; background-color:#fff; border-color:#f2f2f2;">
            <div class="feed-container" style="background-color: #515151; color:#fff;">
              <div class="feeduser_avatar">
                <a href="#">
                  {{ HTML::image($new->userpicture , 'profile picture', array('class' => 'img-circle pull-left','id' => 'feediconsize')) }}
                </a>
              </div>
            <div class="feeduser_name">
              <a href="#" style="color:#fff;">
                {{$new->username}}
              </a>
            </div>
            <div class="feeduser_postedon">
              <p>
                {{$new->postedon}}
              </p>
            </div>
          </div><!-- feed box -->
          <div class="gallery-image-overlay"></div>
          @if($new->model == 'Picture')
          <img src="{{url()}}/{{$new->postedimage}}-resiged.jpg" class="showcase-image img pull-left" id="postedimage">
          <div class="post-title">
            <span class="pull-left text-capitalize" style="padding-bottom: 0px;"><b>{{$new->postedtitle}}</b><p style="margin-bottom: 0px; font-size: 10px;">comments</p></span>
          </div>
          @elseif($new->model == 'Video')
          <img src="{{url()}}/Images/audio.jpg" class="showcase-image img pull-left" id="postedimage">
          <span class="gv-video" style="display:none">
          <div class="flowplayer videobackground" id="postedimage">
            <video>
                <source type="video/webm" src="{{url()}}/galleryvideo/webm/{{$new->postedimage}}.webm">
                <source type="video/mp4"   src="{{url()}}/galleryvideo/mp4/{{$new->postedimage}}.mp4">
                <source type="video/flash" src="{{url()}}/galleryvideo/flv/{{$new->postedimage}}.flv">
            </video>
          </div>
          </span>
          <div class="post-title">
            <span class="pull-left text-capitalize" style="padding-bottom: 0px;"><b>{{$new->postedtitle}}</b><p style="margin-bottom: 0px; font-size: 10px;">comments</p></span>
          </div>
          @elseif($new->model == 'Audio')
          <img src="{{url()}}/Images/audio.jpg" class="showcase-image img pull-left" id="postedimage">
          <span class="gv-audio" style="display:none">
            <div id="player" style="background-color:#000"  class="flowplayer postedaudio fixed-controls play-button is-splash is-audio" data-engine="audio" data-embed="false">
            <video preload="none">
              <source type="video/ogg" src="{{url()}}/galleryaudio/ogg/{{$new->postedimage}}.ogg">
            </video>
            </div>
          </span>
          <div class="post-title">
            <span class="pull-left text-capitalize" style="padding-bottom: 0px;"><b>{{$new->postedtitle}}</b><p style="margin-bottom: 0px; font-size: 10px;">comments</p></span>

          </div>
          @endif
          <div class="clearfix"></div>
          <div class ="comment-feedblk">
            <div class="comment-box"> 
                @foreach($new->commented as $comments)
                <div class="comment-block-{{$comments->id}}">
                  <a href="#">{{Sentry::findUserById($comments->user_id)->name}}&nbsp;&nbsp;&nbsp;</a>
                  <div class="time-wrapper text-muted"> {{ $comments->created_at->diffForHumans() }} </div>
                  <p class="comment-container" style="">{{$comments->comment}}</p>
                </div>
                <hr style="margin-bottom: 4px; margin-top: 4px;">
                @endforeach
                <div class="clearfix"></div>
                <p class="text-center text-muted" style="font-size: 11px; margin-bottom: 4px; cursor:pointer;"><a>see more</a> </p>
              
            </div><!--end of commnet box -->
          </div><!--end of feeblk box -->
          
                <div class="gallery-viewer-image-content-bottom" style="display: none;"> 
                  <div class="img-newcomment">
                    {{ Form::open(['data-remote' => $new->id,'route' => 'comments.store','class'=>'commentform' ]) }}
                    {{Form::hidden('blog_id',$new->postid)}}
                    {{Form::hidden('model',$new->model)}}
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
                
          <!-- temp -->
          <div class="gallery-viewer-image-content" style="display: none;">
                  <!-- inserted as is -->
                  
                  <div class="feed-container light-container" >
                  <div class="feeduser_avatar">
                  <a href="#">
                    <img src="{{$new->userpicture}}" class="img-circle light-avatar pull-left">
                  </a>
                  </div>
                  <div class="feeduser_name light-name" >
                    <a href="#">
                      {{$new->username}}
                    </a>
                  </div>
                  <div class="feeduser_postedon text-muted">
                    <p>
                      {{$new->postedon}}
                    </p>
                  </div>
                </div>
                  <div class="img-title text-capitalize">{{$new->postedtitle}}</div>
                  <div class="img-description text-muted">{{$new->posteddesc}}</div>
                 <!-- like button -->
                
                <div class="img-like">
  <a class="likebutton-{{$new->postid}}{{$new->model}} like-button" data-realclass="likebutton-{{$new->postid}}{{$new->model}}" data-model="{{$new->model}}" data-id="{{$new->postid}}" data-iconclass="{{isset($new->liked)?'fa fa-thumbs-down':'fa fa-thumbs-up'}}" data-action="{{isset($new->liked)?'unlike':'like'}}">
    <i class="{{isset($new->liked)?'fa fa-thumbs-down':'fa fa-thumbs-up'}}"></i>
    &nbsp;
    <span class="btntext">{{isset($new->liked)?'Unlike':'Like'}}</span>
  </a>
</div>
                 <!-- end like button --->
                 <!-- // -->


                   <span class="img-comment-wrapper">
                    @foreach($new->outcommented as $commentz)
                    <div class="comment-block-{{$commentz->id}} comment-wrapper">
                  <div class="lightcom-info pull-left">
                    <a href="#"><b>{{Sentry::findUserById($commentz->user_id)->name}}&nbsp;&nbsp;&nbsp;</b></a>
                  </div>
                  @if(strlen($commentz->comment) >= 30)
                  <br>
                  @else
                  @endif
                  <div class="lightcom-comment">
                    
                  <p class="comment-container" style="">{{$commentz->comment}}</p>

                  <p class="text-muted"> {{ $commentz->created_at->diffForHumans() }} </p>
                  </div>
                  
                </div>
                <div class="clearfix"></div>
                    @endforeach
                    <div class="comment-target" style="display:block; padding: 10px 15px 10px 15px;"></div>
                  </span>
                </div>
          <!-- temp -->
                
        </div><!-- end of feedbox -->
        </div><!-- end of well -->
    </div><!--end of item -->
    @endforeach
    

    @endif
     </div><!-- end col-md 8  -->
     <div class="col-md-4"></div><!-- end col-md 4  -->
     <!-- recent activity ends -->
      </div>
      <div role="tabpanel" class="tab-pane fade" id="blog">
        <div class="col-md-8">
          <div class="row">
            <a type="button" href="{{url()}}/blog/create" class=" btn btn-link text-capitalize">
         Create Post
           </a>

            <div id="content">

          @foreach($articles as $article) 
            
                <div class="col-lg-6 col-sm-6 col-md-6">
                        <aside>
                             <a href="{{url()}}/blog/{{$article->id}}"> <img src="{{url()}}/blogpostergallery/{{$article->blogposter}}" class="img-responsive"></a>
                              <span class="posted-date"><i class="fa fa-calendar"></i> {{$article->created_at->toFormattedDateString()}}</span>
                              <div class="content-title">
                                    <div class="text-left">
                                    <h3><a href="{{url()}}/blog/{{$article->id}}">{{ $article->title}}</a></h3>
                                    <h5>{{ substr(preg_replace('/(<.*?>)|(&.*?;)/', '', $article->body), 0, 100) }}...</h5>
                                    </div>
                              </div>
                              <div class="content-footer">
                                    <img src="{{url()}}/{{Sentry::findUserById($article->user_id)->profileimage}}">
                                    <a href="{{url()}}/user/{{$article->user_id}}"><span class="text-capitalize footer-username">{{Sentry::findUserById($article->user_id)->name}}</span></a>
                                    <span class="pull-right">
                                          <a href="#"><i class="fa fa-thumbs-o-up"></i> {{$article->counted}}</a>
                                    </span>
                              </div>
                        </aside>
                  </div>
                   
                  
            @endforeach 
            </div>
            </div>
        </div>
          
        <div class="col-md-4">
          <div class="review-block">
<h5> Audience review </h5>
</div>

@foreach($reviewaudis as $reviews)
<div class="review-body">

<p>
  <b>
  @foreach($reviews->username as $rev)
    <a href="{{url()}}/user/{{$rev->id}}?{{$rev->name}}">
      {{$rev->name}}
    </a>
  @endforeach
  </b> 
  <br>
  {{$reviews->review}}
</p>


<!--<span class="author">
<footer class="pull-right">{{$reviews->created_at->diffForHumans()}}</footer>
</span>-->
</div>

@endforeach
        </div>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="about">
        
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
          <div class="review-block">
<h5> Audience review </h5>
</div>

@foreach($reviewaudis as $reviews)
<div class="review-body">

<p>
  <b>
  @foreach($reviews->username as $rev)
    <a href="{{url()}}/user/{{$rev->id}}?{{$rev->name}}">
      {{$rev->name}}
    </a>
  @endforeach
  </b> 
  <br>
  {{$reviews->review}}
</p>


<!--<span class="author">
<footer class="pull-right">{{$reviews->created_at->diffForHumans()}}</footer>
</span>-->
</div>

@endforeach
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