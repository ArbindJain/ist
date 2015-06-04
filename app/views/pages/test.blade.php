 @extends('master')

@section('title', 'Profile')

@section('content')
<!-- ****** Display profile image,name and other suff ***** -->
<div class="row">
  @include('partials._profiledisplay')
</div>
<div class="row">
  <div class="col-md-12">
    <div class="sub-nav-block">
      <ul class="nav nav-pills centertab">
        <li role="navigation" class="active"><a href="#">Photo</a></li>
        <li role="navigation"><a href="{{url()}}/user/{{$userprofile->id}}?{{$userprofile->name}}#video">Video</a></li>
        <li role="navigation"><a href="{{url()}}/user/{{$userprofile->id}}?{{$userprofile->name}}/profile#audio">Audio</a></li>
        <li role="navigation"><a href="{{url()}}/user/{{$userprofile->id}}?{{$userprofile->name}}/profile#recent">Recent Activity</a></li>
        <li role="navigation"><a href="{{url()}}/user/{{$userprofile->id}}?{{$userprofile->name}}/profile#blog">Blog</a></li>
        <li role="navigation"><a href="{{url()}}/user/{{$userprofile->id}}?{{$userprofile->name}}/profile#about">About</a></li>
      </ul>
    </div>
    <div class="tab-content">
    <div class="clearfix"></div>
      <div role="tabpanel" class="tab-pane active" id="photo" >
        <div class="col-md-8">
          <div class="row">
            <!-- new -->
            <div class="gallery">
              @foreach($album_images as $albumimage)
              
              <div class="gallery-image gallery-viewer-image" data-image-id="{{$albumimage->id}}">
                <div class="gallery-image-overlay"></div>

                
                <img src="{{url()}}/{{$albumimage->picturename}}-resiged.jpg" class="showcase-image">
                <div class="gallery-viewer-image-content" style="display: none;">
                  <!-- inserted as is -->
                  <div class="feed-container light-container">
                  <div class="feeduser_avatar">
                  <a href="#">
                    <img src="{{url()}}/{{Sentry::findUserById($albumimage->user_id)->profileimage}}" class="img-circle light-avatar pull-left">
                  </a>
                  </div>
                  <div class="feeduser_name light-name" >
                    <a href="#">
                      {{Sentry::findUSerById($albumimage->user_id)->name}}
                    </a>
                  </div>
                  <div class="feeduser_postedon text-muted">
                    <p>
                      {{$albumimage->created_at->diffForHumans()}}
                    </p>
                  </div>
                </div>
                  <div class="img-title">{{$albumimage->picturetitle}}</div>
                  <div class="img-description">{{$albumimage->picturedescription}}</div>
                  <!-- like button -->
                  @include('partials._photolikebutton')
                  <!-- like button end -->
                  <!-- // -->

                   <span class="img-comment-wrapper">
                    @foreach($albumimage->commented as $comments)
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
                    {{ Form::open(['data-remote' => $albumimage->id,'route' => 'comments.store','class'=>'commentform' ]) }}
                    {{Form::hidden('blog_id',$albumimage->id)}}
                    {{Form::hidden('model','Picture')}}
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
            <!-- /new -->


            {{ HTML::script('/js/gallery-viewer.js')}}
            <script>
              window.GalleryViewer.settings.resource_path = "{{url('Images')}}";
            </script>
            {{ HTML::script('/js/remote-comment.js')}}
            <script>
              window.RemoteComment.settings.comment_url = "{{url('comments')}}";
            </script>



          </div> 
        </div>
        <div class="col-md-4">
          User review block ----------------------
        </div>       
      </div>
      div class="col-md-12">
		 




	</div>
</div>

<script type="text/javascript">
/*
  $(document).ready(function(){
    $("body").on("keydown",".commentform", function(e){
      
      if (e.keyCode == 13)
        if (!e.shiftKey) $(this).submit();     

    });
    

  }); */
</script>




@stop