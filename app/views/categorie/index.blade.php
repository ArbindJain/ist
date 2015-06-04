@extends('master')

@section('title', 'Home')

@section('content')
<style type="text/css">


.row {
 -moz-column-width: 330px;
 -webkit-column-width: 330px;
 -moz-column-gap: 0px;
 -webkit-column-gap:0px; 
  
}

.item {
 display: inline-block;
 padding:  .25rem;
 width:  100%; 
}

.well {
 display: block;
 margin-bottom: 0px;
 background-color: #ffffff;
 border: 0px;
 padding-bottom: 8px;
 min-height: 20px;
  padding: 19px;
  border: 0px;
  border-radius: 0px;
  -webkit-box-shadow: none;
  box-shadow: none;
}
.img-title, .img-description, .img-like {
position: relative;
float: none;
padding: 6px 15px 0px 15px;
word-break: break-all;
}
.img-title {
  font-size: 16px;

}
.img-description {http://localhost:8000/newsfeeds
  font-size: 14px;
}
.hid {
  display: none!important;
}
.color {
  color: #f18c1c;
}


</style>

<div class="col-md-12">
  <div class="feed-changer centertab">
    <a href="" class="btn btn-link userfeed" id="user" >Category Feed</a>
    <a href="" class="btn btn-link corporatefeed" id="corporate" >Category User</a>
  </div>
</div>
<div class="col-md-12" id="userdiv" class="udiv">
<div class="col-md-8">
  <div class='row'>
  @foreach($newarray as $new)
    <div class="item">
        <div class="well"> 
          <div class="feedbox gallery-image gallery-viewer-image" data-image-id="{{$new->postid}}">
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
                {{Carbon\Carbon::parse($new->postedon)->diffForHumans()}}
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
                    <img src="{{url()}}/{{$new->userpicture}}" class="img-circle light-avatar pull-left">
                  </a>
                  </div>
                  <div class="feeduser_name light-name" >
                    <a href="#">
                      {{$new->username}}
                    </a>
                  </div>
                  <div class="feeduser_postedon text-muted">
                    <p>
                      {{Carbon\Carbon::parse($new->postedon)->diffForHumans()}}
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
                    <div class="comment-block-{{$comments->id}} comment-wrapper">
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
   
  </div><!-- end of row -->
</div><!-- end of md 8 -->

<div class="col-md-4"></div>

 
</div><!--end of md 12-->

<div class="col-md-12" id="corporatediv" class="cdiv" style="display:none; padding-top: 24px;">
  <div class="col-md-8">
   @foreach($users as $user)
    <div class="col-md-6">
      <div class="personal-info center-block">
      <a href="{{url()}}/user/{{$user->id}}">
          {{HTML::image($user->profileimage,'avatar',array('class'=>'center img-circle search-avatar'))}}
         
          <p class="text-muted cityinfo text-center text-capitalize heff">
              @if(isset($user->city))
                {{$user->city}} &nbsp;
                  @if(isset($user->country))
                  {{$user->country}}
                  @endif
              @else
                &nbsp;
              @endif
          </p>

          <h3 class="text-center usernametext text-capitalize heff">{{$user->name}}</h3>
          <p class="text-center text-muted text-capitalize heff">
            @if(isset($user->title))
              {{$user->title}}
            @else
              &nbsp;
            @endif
           </p>

      </a>
       
      </div><!-- end of personalinfo -->
      <div class="personal-footer">
        <div class="footertext-btn">
          <h3>{{$user->rccount}}</h3>
          <p class="text-muted">Review</p>
        </div>
        <div class="footertext-btn">
          <h3>{{$user->frcount}}</h3>
          <p class="text-muted">Followers</p>
        </div>
        <div class="footertext-btn">
          <h3>{{$user->fgcount}}</h3>
          <p class="text-muted">Following</p>
        </div>
      </div>
    </div><!-- end of md3-->
@endforeach
  </div>
  <div class="col-md-4"></div>
</div><!-- 3rd md 12 -->

{{ HTML::script('/js/gallery-viewer.js')}}
            <script>
              window.GalleryViewer.settings.resource_path = "{{url('Images')}}";
            </script>
            {{ HTML::script('/js/remote-comment.js')}}
            <script>
              window.RemoteComment.settings.comment_url = "{{url('comments')}}";
            </script>
<script type="text/javascript">
  $( "#user" ).click(function() {

  $("#user").addClass('color');
  $("#corporate").removeClass('color');
  $( "#userdiv" ).fadeIn("slow");
  $( "#corporatediv" ).fadeOut("slow");
  return false;
});
   $( "#corporate" ).click(function() {

  $("#corporate").addClass('color');
  $("#user").removeClass('color');
  $( "#corporatediv" ).fadeIn("slow");
  $( "#userdiv" ).fadeOut("slow");
  return false;
});
</script>




@stop