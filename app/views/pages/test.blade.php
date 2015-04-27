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
        <span class="album-block">
          <h3 class="pull-left"> <i class="fa fa-file-image-o"></i> Photos</h3>
        </span>
        <div class="col-md-8">
          <div class="row">
            <!-- new -->
            <div class="gallery">
              @foreach($album_images as $albumimage)
              
              <div class="gallery-image gallery-viewer-image" data-image-id="{{$albumimage->id}}">
                <div class="gallery-image-overlay"></div>

                
                <img src="{{url()}}/{{$albumimage->picturename}}-resiged.jpg">
                <div class="gallery-viewer-image-content" style="display: none;">
                  <!-- inserted as is -->
                  <div class="img-title">{{$albumimage->picturetitle}}</div>
                  <div class="img-description">{{$albumimage->picturedescription}}</div>
                  <!-- like button -->
                  @include('partials._photolikebutton')
                  <!-- like button end -->
                  <!-- // -->

                   <span class="img-comment-wrapper comment-target">
                    @foreach($albumimage->commented as $comments)
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