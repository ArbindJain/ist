@extends('master')

@section('title', 'Profile')

@section('content')
<!-- ****** Display profile image,name and other suff ***** -->


<div class="row">
  <div class="col-md-9 profile-main-block col-md-offset-3">
    {{ HTML::image($active_user->profileimage , 'profile picture', array('class' => 'img-circle pull-left','id' => 'size')) }}
    <span>
      <ul class="list-unstyled pull-left name-block text-capitalize">
        <li class="name-space "><h3>{{$active_user->name}}</h3></li>
        <li class="title-space ">{{$active_user->title}}</li>
        <li class="address-space">{{$active_user->city}},{{ $active_user->country}}</li>
      </ul>
    </span>
    
  </div>
</div>

<div class="row">
<div class="form-group">
  <div class="col-md-12">
    <div class="sub-nav-block">
    <ul class="nav nav-pills centertab">
      <li role="navigation"><a href="{{url()}}/userProtected#yourfeedwall">MyEvent(wall)</a></li>
      <li role="navigation" class="active"><a href="#photo" >Photos</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#video">Video</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#audio">Audio</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#recent">Recent Activity</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#blog">Blog</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#about">About</a></li>
    </ul>
    </div>
    <div class="tab-content">
        <div class="col-md-8">
        <div class="row pop">
            <!-- create album Button trigger modal -->
      <a type="button" class="btn btn-link" data-toggle="modal" data-target=".bs-example-modal-lg">
        upload image
      </a>

      <div class="clearfix"></div>
       <!-- retrive's album and first photo of album -->
       <!-- new -->
            <div class="gallery">
              @foreach($album_images as $albumimage)
              
              <div class="gallery-image gallery-viewer-image" data-image-id="{{$albumimage->id}}">
                <div class="gallery-image-overlay"></div>

                
                <img src="{{url()}}/{{$albumimage->picturename}}-." class="showcase-image">
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
                 <!-- end like button --->
                 <!-- // -->

                   <span class="img-comment-wrapper comment-target">
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
      <!-- end of retrival's  -->
      </div>

      <!-- Modal -->
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body">
           <div id='drop_zone'>
   <!-- <form action="#" class='dropzone' id='mydropzone'>
      
       
      <input type="text" name="title">
      <input type="text" name ="description">
      <button type="submit">Submit data and files!</button>
    </form>-->
    {{ Form::open(['route' => 'imagegallery.store','files' => 'true','role'=>'form','class'=>'dropzone','id'=>'mydropzone' ]) }}
                      <fieldset>

                        @if (Session::has('flash_message'))
                <div class="form-group">
                  <p>{{ Session::get('flash_message') }}</p>
                </div>
              @endif
              <div class="dropzone-previews">
              </div>
              
              
              <!-- Album name field -->
              <div class="form-group">
                Select any Album
                {{Form::select('album', $albums)}}
              </div>

              

              <!-- Image title field -->
              <div class="form-group">
                {{ Form::text('picturetitle', null, ['placeholder' => 'Picture Title', 'class' => 'form-control', 'required' => 'required'])}}
                {{ errors_for('picturetitle', $errors) }}
              </div>

              <!-- Image Description field -->
              <div class="form-group">
                {{ Form::text('picturedescription', null, ['placeholder' => 'Picture Description', 'class' => 'form-control', 'required' => 'required'])}}
                {{ errors_for('picturedescription', $errors) }}
              </div>



              <!-- Submit field -->
              <div class="form-group">
                
      <button type="submit" class="btn btn-md btn-success btn-block">Upload Image</button>
              </div>



              </fieldset>
                {{ Form::close() }}
</div>
            <!--
            <div id='drop_zone'>

              {{ Form::open(['route' => 'imagegallery.store','files' => 'true','role'=>'form','class'=>'dropzone','id'=>'mydropzone' ]) }}
                  <fieldset>
                      @if (Session::has('flash_message'))
                        <div class="form-group">
                          <p>{{ Session::get('flash_message') }}</p>
                        </div>
                      @endif
                      <div class="dropzone-previews" id="template">
                        <div class="dz-preview dz-file-preview">
                          <div class="dz-details">
                            <div class="dz-filename"><span data-dz-name></span></div>
                            <div class="dz-size" data-dz-size></div>
                            <img data-dz-thumbnail />
                          </div>
                          <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                          <div class="dz-success-mark"><span>✔</span></div>
                          <div class="dz-error-mark"><span>✘</span></div>
                          <div class="dz-error-message"><span data-dz-errormessage></span></div>
                        </div>
                      </div>
                      <div id ="meex"></div>
                      <div class="form-group">
                        Select any Album
                        {{Form::select('album', $albums)}}
                      </div>
                      <button type="submit" class="btn btn-md btn-success">Upload Image</button>
                  </fieldset>
              {{ Form::close() }}
            </div>-->
                  
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div><!-- video modal end !-->  
     

        </div>

        <div class="col-md-4">
        @include('partials._audiencereview')
          
        </div>

      
      
        
        
               
      
    </div><!-- tab content -->
  </div>
</div>
</div>
<script type="text/javascript">
  Dropzone.autoDiscover = true;
Dropzone.options.mydropzone = {
  previewsContainer: ".dropzone-previews",
    addRemoveLinks: true,
    paramName: "file",
    maxFilesize: 5,
    maxFiles: 5,
    autoProcessQueue: false,
      init: function () {
     /* this.on("addedfile", function() {
      if (this.files[1]!=null){
        this.removeFile(this.files[0]);
      }
    });*/
        var myDropzone = this;
    // First change the button to actually tell Dropzone to process the queue.
    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
      // Make sure that the form isn't actually being sent.
      e.preventDefault();
      e.stopPropagation();
      myDropzone.processQueue();
    });
    this.on("success", function(file, responseText) {
            console.log(responseText);
            window.location.hash = 'photo';
            window.location.reload();
        });
     
    },
    
};
</script>
<!--
<script type="text/javascript">
var previewNode = document.querySelector("#template");
previewNode.id = "";
var previewTemplate = previewNode.parentNode.innerHTML;
previewNode.parentNode.removeChild(previewNode);
  Dropzone.autoDiscover = true;
Dropzone.options.mydropzone = {
  previewTemplate: previewTemplate,
  autoQueue: false, // Make sure the files aren't queued until manually added
  previewsContainer: ".dropzone-previews",
    paramName: "file",
    maxFilesize: 5,
    maxFiles: 2,
    addRemoveLinks: true,
    autoProcessQueue: false,
    init: function () {
       
    /*   this.on("addedfile", function() {
      if (this.files[1]!=null){
        this.removeFile(this.files[0]);
      }
    });*/
        var myDropzone = this;
     
    // First change the button to actually tell Dropzone to process the queue.
    this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
      // Make sure that the form isn't actually being sent.
      e.preventDefault();
      e.stopPropagation();
      myDropzone.processQueue();
    });
    
    this.on("success", function(file, responseText) {
            console.log(responseText);
            window.location.hash = 'photo';
            window.location.reload();
        });
     
    },
    
};
</script>-->
{{ HTML::script('/js/gallery-viewer.js')}}
            <script>
              window.GalleryViewer.settings.resource_path = "{{url('Images')}}";
            </script>
            {{ HTML::script('/js/remote-comment.js')}}
            <script>
              window.RemoteComment.settings.comment_url = "{{url('comments')}}";
            </script>
<script>
// autoload tabs
$(document).ready(function() {
  if (window.location.hash) {
    $("a[href='" + window.location.hash + "']").tab("show");
  }
});
</script>




@stop