@extends('master')

@section('title', 'Profile')

@section('content')
<!-- ****** Display profile image,name and other suff ***** -->
<style>
  #size1{
    display: block;
    width: 40px;
    height: 40px;
  }
  .user-details{
    display: block;
    margin-left: 10px;

  }
  .article-image {
    display: block;
    margin-left: 50px;

  }
  .comment-method{
    display: block;
    margin-left: 60px;
    margin-top: 5px;
  }
  .text-width{
    display: block;
    width: 70%;
    margin-left: 60px;
  }
  
</style>
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
  <div class="col-md-12 centered-pills">
    <div class="sub-nav-block">
    <ul class="nav nav-pills">
      <li role="navigation" class="active"><a href="#yourfeedwall" aria-controls="wall" role="tab" data-toggle="tab">MyEvent(wall)</a></li>
      <li role="navigation"><a href="#photo" aria-controls="photo" role="tab" data-toggle="tab">Photos</a></li>
      <li role="navigation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a></li>
      <li role="navigation"><a href="#audio" aria-controls="audio" role="tab" data-toggle="tab">Audio</a></li>
      <li role="navigation"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">Recent Activity</a></li>
      <li role="navigation"><a href="#blog" aria-controls="blog" role="tab" data-toggle="tab">Blog</a></li>
      <li role="navigation"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
    </ul>
    </div>
    <div class="tab-content">
      <div class="clearfix"></div>
      <div role="tabpanel" class="tab-pane active" id="yourfeedwall">
        <div class="col-md-8">
          <ul class="nav nav-pills pull-left">
            <li role="navigation" class="active"><a href="#performance" aria-controls="performance" role="tab" data-toggle="tab">Performance</a></li>
            <li role="navigation"><a href="#tutorial" aria-controls="tutorial" role="tab" data-toggle="tab">Tutorial</a></li>
            <li role="navigation"><a href="#findtalent" aria-controls="findtalent" role="tab" data-toggle="tab">Find-Talent</a></li>
          </ul> 
          <div class="tab-content">
            <div class="clearfix"></div>
            <div role="tabpanel" class="tab-pane active" id="performance">
            Performance
            </div>
            <div role="tabpanel" class="tab-pane " id="tutorial">
            tutorial
            </div>
            <div role="tabpanel" class="tab-pane " id="findtalent">
            Find-talent
            </div>
          </div>          
      </div>
    </div>
      <div role="tabpanel" class="tab-pane " id="photo">
        <span class="album-block">
          <h3 class="pull-left"> <i class="fa fa-file-image-o"></i> Photos</h3>
        </span>

        <!-- create album Button trigger modal -->
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
        upload an image
      </button>

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
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
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div><!-- video modal end !-->
      
        
        
               
      </div><!-- photo tabpanel end !-->
      <div role="tabpanel" class="tab-pane" id="video">
        <span class="album-block">
          <h3 class="pull-left"> <i class="fa fa-file-image-o"></i> Photos</h3>
        </span>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalvideo">
          upload Video
        </button>
<!-- Modal -->
      <div class="modal fade" id="myModalvideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                 {{ Form::open(['route' => 'videogallery.store','files' => 'true' ,'class'=>'vid_form']) }}
                      <fieldset>

                        @if (Session::has('flash_message'))
                <div class="form-group">
                  <p>{{ Session::get('flash_message') }}</p>
                </div>
              @endif
              
              
              

              

              <!-- Image title field -->
              <div class="form-group">
                {{ Form::text('videotitle', null, ['placeholder' => 'Video Title', 'class' => 'form-control','id'=>'vidtitle', 'required' => 'required'])}}
                {{ errors_for('videotitle', $errors) }}
              </div>
              <div class="form-group">
              {{ Form::file('videosrc') }}
              </div>

              <!-- Image Description field -->
              <div class="form-group">
                {{ Form::text('videodescription', null, ['placeholder' => 'Video Description', 'class' => 'form-control', 'required' => 'required'])}}
                {{ errors_for('videodescription', $errors) }}
              </div>



              <!-- Submit field -->
              <div class="form-group">
                {{ Form::submit('Upload Video', ['class' => 'btn btn-md btn-success btn-block videobutton']) }}
              </div>



              </fieldset>
                {{ Form::close() }}

            </div><!-- modal boxy end !-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div><!-- video modal end !-->                

      </div><!-- video tabpanel end !-->
      <div role="tabpanel" class="tab-pane" id="audio">
       


      </div>
      <div role="tabpanel" class="tab-pane" id="recent">4...</div>
      <div role="tabpanel" class="tab-pane" id="blog">2...</div>
      <div role="tabpanel" class="tab-pane" id="about">3...</div>
    </div>
  </div>
</div>


<script>
// autoload tabs
$(document).ready(function() {
  if (window.location.hash) {
    $("a[href='" + window.location.hash + "']").tab("show");
  }
});
</script>


<script type="text/javascript">
  Dropzone.autoDiscover = true;
Dropzone.options.mydropzone = {
  previewsContainer: ".dropzone-previews",
    paramName: "file",
    maxFilesize: 5,
    maxFiles: 1,
    autoProcessQueue: false,

    init: function () {
        this.on("addedfile", function() {
      if (this.files[1]!=null){
        this.removeFile(this.files[0]);
      }
    });
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
<script type="text/javascript">
  
  var form = document.querySelector('.vid_form');
  var request = new XMLHttpRequest();
  form.addEventListener('submit',function(e){
    e.preventDefault();

    var formdata = new FormData(form);
    request.open('post','videogallery');
    request.send(formdata);
  });
</script>

@stop