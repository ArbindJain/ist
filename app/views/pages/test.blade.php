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
                {{HTML::image($albumimage->picturename)}}
                <div class="gallery-viewer-image-content" style="display: none;">
                  <!-- inserted as is -->
                  <div class="img-title">{{$albumimage->picturetitle}}</div>
                  <div class="img-description">{{$albumimage->picturedescription}}</div>
                  <div class="img-like"><a class="likebutton" data-model="Picture" data-id="{{$albumimage->id}}" data-action="{{isset($albumimage->liked)?'unlike':'like'}}"><i class="fa fa-star-o"></i>&nbsp;<span class="btntext">{{isset($albumimage->liked)?'Unlike':'Like'}}</span></a></div>
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


          @foreach($album_images as $albumimage)
            <li id="gallery-img-{{$albumimage->id}}" class="gallery-img col-md-4">
              {{HTML::image($albumimage->picturename)}}
              <span data-title = "{{$albumimage->picturetitle}}"></span>
              <div data-desc = "{{$albumimage->picturedescription}}"></div>
              <a class="likebutton" data-model="Picture" data-id="{{$albumimage->id}}" data-action="{{isset($albumimage->liked)?'unlike':'like'}}"><i class="fa fa-star-o"></i>&nbsp;<span class="btntext">{{isset($albumimage->liked)?'Unlike':'Like'}}</span></a>
              <div class="l-module" data-likemodule = "{{isset($albumimage->liked)?'Unlike':'Like'}}"></div>
              <div class="l-id" data-likeid ="{{$albumimage->id}}"></div> 
              <div class="l-action" data-likeaction ="{{isset($albumimage->liked)?'unlike':'like'}}"></div>
              <div class="com-box" data-boxid = "comment-{{$albumimage->id}}"></div>
              <div class="com-viewbox" data-viewbox ="comment-view-{{$albumimage->id}} refresh"></div>

              <div class="comment-box" id="comment-{{$albumimage->id}}">
              <div class="comment-view-{{$albumimage->id}} refresh" id ="iamgoing" >
                {{-- */ $i = 0; /* --}}
              @foreach($albumimage->commented as $comments)
              
              <div data-coblock{{$i++;}}="comment-block-{{$comments->id}}" id="com-block-{{$i++;}}"></div>
                <div class="comment-block-{{$comments->id}}">
                  <a href="#"> <b>{{Sentry::findUserById($comments->user_id)->name}}&nbsp;&nbsp;&nbsp;</b></a>
                  <span>{{$comments->comment}}<br></span><br>
                  <div class="com-details">
                  <div class="com-time-container">
                  {{ $comments->created_at->diffForHumans() }} ·
                  </div>
                  </div>
                </div>
              @endforeach
                
              </div>
              

              {{ Form::open(['data-remote','route' => 'comments.store','class'=>'commentform' ]) }}
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
                </div>
              </li>
              
                @endforeach

          </div> 
        </div>
        <div class="col-md-4">
          User review block ----------------------
        </div>       
      </div>
      <div role="tabpanel" class="tab-pane" id="video">
          <!-- video uploaded by the user display -->
          


      </div>
      <div role="tabpanel" class="tab-pane" id="audio">
        
        
      </div>
      <div role="tabpanel" class="tab-pane" id="recent">4...</div>
      <div role="tabpanel" class="tab-pane" id="blog">2...</div>
      <div role="tabpanel" class="tab-pane" id="about">3...</div>
    </div>
  </div>
</div>
<div class="row">
	<div class="col-md-12">
		 




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
<script type="text/javascript">
/*
$(document).ready(function(){
  $("body").on('submit', 'form[data-remote]', function(e){
    e.preventDefault();
    //  setInterval(function () {
     //  $(".comment-box").each(function() {
     //     $(this).load(location.href + " #" + $(this).prop("id"));

       // });
      
     // }, 5000);

    
    var form = $(this);
    var target = form.closest('div.comment-box');
        $.ajax({
          url: '{{url()}}/comments',
          type: 'POST',
          cache: false,
          data: form.serialize(),
          dataType: 'json',
          beforeSend: function(){

          },
          success: function(commentdata) { 
            //$(".comment-block").html(user);
            //alert(users);
            console.log(commentdata);
            var mar= commentdata.comment;
            var username = commentdata.user_id;
            var time = commentdata.created_at;
            var marid = commentdata.comment_id;
            var viewid = commentdata.view_id;
            var target_id = ".comment-view-"+viewid;
            //alert(time);
            $(target_id).append("<div class= \'comment-box-"+marid+"\'><a href=\'#\'><b>"+username+" </b>&nbsp;&nbsp;&nbsp;</a><span>"+mar+"<br></span><br><div class=\'com-details\'><div class=\'com-time-container\'>"+time+"</div></div></div>");
            $('.text-shift').val('');
              
            
          },
          error: function(xhr, textStatus, thrownError) {
              alert('ops Errore');
          }
       });
        
    });
}); */
</script>
 



@stop