@extends('master')

@section('title', 'Profile')

@section('content')

<script type="text/javascript">
            $(document).ready(function() {
              $('.performance-form').hide();
              $('.button').click(function(){
                  var target = '.'+$(this).data("target");
                  $(".performance-form").not(target).hide();
                  //$(target).css({opacity: 1 });
                  $(target).fadeIn();
                  
              });
            });
           
            </script>
            <script type="text/javascript">
 $(document).ready(function() {

              
              $('.closebutton').click(function(){
                  var target = '.'+$(this).data("target");
                  //$(".performance-form").not(target).hide();

                  
                 // $(target).animate({ height: 0, opacity: 0 }, 'slow');

                  $(target).animate({ height: 'toggle', opacity: 'toggle' }, 'slow');
                 $(target).fadeOut();

              });
            });
            </script>

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

         
            <ul class="centertab  nav">
              <li role="navigation" class="active"><a href="#performance" aria-controls="performance" role="tab" data-toggle="tab">Performance</a></li>
              <li role="navigation"><a href="#tutorial" aria-controls="tutorial" role="tab" data-toggle="tab">Tutorial</a></li>
              <li role="navigation"><a href="#findtalent" aria-controls="findtalent" role="tab" data-toggle="tab">Find-Talent</a></li>
            </ul> 

          <div class="tab-content" style="margin: 10px 0px;">
            <div role="tabpanel" class="tab-pane active" id="performance">
                <div class="col-md-8 perf">
                    <a href="#" style="text-decoration:none;" class="performance-button button text-capitalize" data-target = "performance-form">Performing some where?</a>
                    
                    <div class="performance-form">
                    <a href="#"  class="performance-closebutton pull-right closebutton" data-target = "performance-form">
                    <i class="fa fa-times"></i>
                    </a>
                    <div class="clearfix"></div>
                        {{ Form::open(['route' => 'userperformances.store']) }}
                            <fieldset>

                                @if (Session::has('flash_message'))
                                <div class="form-group">
                                <p>{{ Session::get('flash_message') }}</p>
                                </div>
                                @endif

                                <!-- performance text field -->
                                <div class="form-group">
                                {{ Form::text('performancetext', null, ['placeholder' => 'Where are you performing today', 'class' => 'form-control', 'required' => 'required'])}}
                                {{ errors_for('performancetext', $errors) }}
                                </div>

                                <!-- venue Description field -->
                                <div class="form-group">
                                {{ Form::text('venue', null, ['placeholder' => 'venue details', 'class' => 'form-control', 'required' => 'required'])}}
                                {{ errors_for('venue', $errors) }}
                                </div>

                                <!-- date and time Description field -->
                                <div class="form-group">
                                <input type='text' name="performancedatetime" placeholder="performance date and time" class="form-control" id='datetimepicker1' />
                                {{ errors_for('performancedatetime', $errors) }}
                                </div>

                                <!-- Submit field -->
                                <div class="form-group">
                                {{ Form::submit('performing soon!!', ['class' => 'btn btn-md btn-success btn-block videobutton']) }}
                                </div>

                            </fieldset>
                        {{ Form::close() }}
                    </div>
                    @foreach($performances as $performance)
                      <div class="performance-list">
                          <div class="feed-blocka">
                              <span class="feedtime">{{Carbon\Carbon::parse($performance->performancedatetime)->toDayDateTimeString()}}<br>{{$performance->venue}}</span>
                              <span class="feeddez">{{$performance->performancetext}} Live at ocean indian Live at ocean indian Live at ocean indian</span>
                              <!-- Delete the performance entry -->
                              {{ Form::model($performance, ['method' => 'DELETE', 'files' => true , 'route' => ['userperformances.destroy',$performance->id]]) }}
                              <a><button type="submit" style="border: 0; background: transparent; " class="pull-right">
                              <i class="fa fa-trash-o"></i>
                              </button></a>
                              {{ Form::close() }}
                          </div>
                      </div> 
                    @endforeach
                </div>
                  <div class="col-md-4">
                    @include('partials._audiencereview')
                  </div>
            </div>
            <div role="tabpanel" class="tab-pane " id="tutorial">
            No tutorial uploaded yet
            </div>
            <!-- button for scout generation -->
            <div role="tabpanel" class="tab-pane " id="findtalent">
              
              {{ HTML::linkRoute('scout.create','Scout') }}<br> 
              <div class="col-md-8">
                  @foreach($scouts as $scout)
                  <div class="col-md-4">
                  <span class="scoutevent">
                  <a href="/scout/{{$scout->id}}" class="scoutposterblock">
                    {{ HTML::image($scout->scoutposter , 'profile picture', array('class' => 'img-thumbnail pull-left')) }}
                    {{$scout->scouttitle}}
                  </a>
                  </span>

                  </div>

                  @endforeach
                  
                  <br><br>
                  <div class="clearfix"></div>
                  <div class="event-applied ">
                  <br><br>
                    <h4 class="pull-left"> <b>Applied Scout List </b></h4><br><br><br><br>
                 
                  @foreach($scoutadds as $amma)
                    @foreach($amma->scouted as $bhairu)
                   
                      <div class="col-md-4">
                  <span class="scoutevent">
                  <a href="/scoutpublished/{{$amma->scout_id}}" class="scoutposterblock">
                    {{ HTML::image($bhairu->scoutposter , 'profile picture', array('class' => 'img-thumbnail pull-left')) }}
                    {{$bhairu->scouttitle}}


                  </a>
                  </span>

                  </div>
                    @endforeach
                  @endforeach
                 

                  </div>


              </div>     
              <div class="col-md-4">
                
              </div>      
              
            </div>          
      </div>
    </div>
      <div role="tabpanel" class="tab-pane " id="photo">
        <span class="album-block">
          <h3 class="pull-left"> <i class="fa fa-file-image-o"></i> Photos</h3>

        </span>
        <div class="col-md-8">
        <div class="row pop">
            <!-- create album Button trigger modal -->
      <a type="button" class="pull-left" data-toggle="modal" data-target="#uploadimagemodal">
        upload image
      </a>

      <div class="clearfix"></div>
       <!-- retrive's album and first photo of album -->
      @foreach($all_albums as $allalbum)
            <div class="col-md-4">
              @if(isset($allalbum->picture))

             <a href="{{url()}}/userProtecte/{{$allalbum->id}}#photos">
              <figure>
                <img src="{{url()}}/{{$allalbum->picture->picturename}}-resiged.jpg" class="">
                <figcaption>{{$allalbum->picture->picturetitle}}</figcaption>
              </figure>

               </a>  
              @endif     
            </div>
             

          @endforeach
      <!-- end of retrival's  -->
      </div>

      <!-- Modal -->
      <div class="modal fade" id="uploadimagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
     

        </div>

        <div class="col-md-4">
        @include('partials._audiencereview')
          
        </div>

      
      
        
        
               
      </div><!-- photo tabpanel end !-->
      <div role="tabpanel" class="tab-pane" id="video">
        <span class="album-block">
          <h3 class="pull-left"> <i class="fa fa-file-video-o"></i> Video</h3>
        </span>
        <div class="col-md-8">
          <div class="row pop">
            <a type="button" class="" data-toggle="modal" data-target="#myModalvideo">
              upload Video
            </a>
            <div class="clearfix"></div>
            <div class ="gallery">
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
                <!-- video like button -->
                @include('partials._videolikebutton')
                <!-- End video like button -->
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
        </div>
        <div class="col-md-4">
          @include('partials._audiencereview')
        </div>
        
      </div><!-- video tabpanel end !-->
      <div role="tabpanel" class="tab-pane" id="audio">
       <span class="album-block">
          <h3 class="pull-left"> <i class="fa fa-file-image-o"></i> Audio</h3>
        </span>
        <div class="col-md-8">
          <div class="row pop">
            <a type="button" class="" data-toggle="modal" data-target="#myModalaudio">
            upload Audio
            </a> 
            <div class="gallery">
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

                <!-- Audio like button -->
                @include('partials._audiolikebutton')
                <!-- End Audio like button -->

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
            </div>
          </div>
            
            <!-- Modal Audio -->
      <div class="modal fade" id="myModalaudio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                 {{ Form::open(['route' => 'audiogallery.store','files' => 'true','class'=>'aud_form' ]) }}
                      <fieldset>

              <div class="form-group">
              {{ Form::file('audiosrc') }}
              </div>

              <!-- Image title field -->
              <div class="form-group">
                {{ Form::text('audiotitle', null, ['placeholder' => 'Audio Title', 'class' => 'form-control', 'required' => 'required'])}}
                {{ errors_for('audiotitle', $errors) }}
              </div>

              <!-- Image Description field -->
              <div class="form-group">
                {{ Form::text('audiodescription', null, ['placeholder' => 'Audio Description', 'class' => 'form-control', 'required' => 'required'])}}
                {{ errors_for('audiodescription', $errors) }}
              </div>



              <!-- Submit field -->
              <div class="form-group">
                {{ Form::submit('Upload Track', ['class' => 'btn btn-md btn-success btn-block']) }}
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
        </div>
        <div class="col-md-4">
          
          @include('partials._audiencereview')

        </div>
        



      </div>
      <div role="tabpanel" class="tab-pane" id="recent">
        <span class="album-block">
          <h3 class="pull-left"> <i class="fa fa-file-image-o"></i> Recent Activity</h3>
        </span>
      4...</div>
      <div role="tabpanel" class="tab-pane" id="blog">
      <span class="album-block">
          <h3 class="pull-left"> <i class="fa fa-file-image-o"></i> Blog</h3>
        </span>

        <div class="col-md-8 ">
          {{ HTML::linkRoute('blog.create','Create New Post') }}<br>
          @foreach($articles as $article)
            
            <div class="media">
              <div class="media-left">
                <a href="#">
                  <img class="media-object" src="{{url()}}/blogposter/{{$article->blogposter}}.jpg" style="width: 64px; height: 64px;">
                </a>
              </div>
              <div class="media-body text-left">
                <h4 class="media-heading" id="top-aligned-media">{{$article->title}}<a class="anchorjs-link" href="#top-aligned-media"><span class="anchorjs-icon"></span></a></h4>
                <p class="text-left">
                  {{ substr(preg_replace('/(<.*?>)|(&.*?;)/', '', $article->body), 0, 200) }}
                </p>
           {{ link_to_route('blog.show', 'Read More', $article->id, ['class' => 'btn btn-default']) }}
             
          {{ link_to_route('blog.edit', 'edit', $article->id, ['class' => 'btn btn-default pull-right']) }}
          {{ Form::model($article, ['method' => 'DELETE', 'files' => true , 'route' => ['blog.destroy',$article->id]]) }}
          {{ Form::submit('Delete', array('class' => 'btn btn-default  pull-right')) }}
          {{ Form::close() }}


              </div>

            </div>  

          @endforeach         
        </div>
        <div class="col-md-4">

          @include('partials._audiencereview')
          
        </div>
      
      </div>
      <div role="tabpanel" class="tab-pane" id="about">
        <div class="col-md-8">
          <div class="col-md-6">
            <div class="about-details-block" >
              <span class="about-title text-capitalize">Name</span>
              <span class="text-muted">{{Sentry::getUser($abouts->user_id)->name}}</span>
            </div>
            <div class="about-details-block" >
              <span class="about-title text-capitalize">date of birth</span>
              <span class="text-muted">{{Sentry::getUser($abouts->user_id)->dob}}</span>
            </div>
            <div class="about-details-block" >
              <span class="about-title text-capitalize">Email</span>
              <span class="text-muted">{{Sentry::getUser($abouts->user_id)->email}}</span>
            </div>
            <div class="about-details-block">
              <span class="about-title text-capitalize">Phone</span>
              <span class="text-muted">{{Sentry::getUser($abouts->user_id)->phone}}</span>
            </div>
            
          </div>

          <div class="col-md-6">
            <div class="flowplayer" style="background-color:#515151;">
               <video>
                  <source type="video/webm" src="{{url()}}/aboutvideo/webm/{{$abouts->video}}.webm">
                  <source type="video/mp4"   src="{{url()}}/aboutvideo/mp4/{{$abouts->video}}.mp4">
                  <source type="video/flash" src="{{url()}}/aboutvideo/flv/{{$abouts->video}}.flv">

               </video>
            </div>
          </div>
          <div class="col-md-12">
            <div class="profile-blocks">
              <div class="about-details-block" >
                <span class="profile-title text-capitalize">About me</span>
                <span class="text-muted">{{$abouts->about_us}}</span>
              </div>
              <div class="about-details-block" >
                <span class="profile-title text-capitalize">Awards or Achievements<span class="pull-right"><a type="button" data-toggle="modal" data-target="#myModalachievement">Add</a></span></span>
                <br>
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="myModalachievement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel  ">Add Achievement</h4>
                      </div>
                      <div class="modal-body">
                      {{ Form::open(['route' => 'achievements.store','files' => 'true','class'=>'award-form' ]) }}
                      <fieldset>
                      <!-- Achievements certificate -->
                      <div class="form-group">
                      {{ Form::file('achievement_certificate') }}
                      </div>  

                      <!-- Achievements title field -->
                      <div class="form-group">
                        {{ Form::text('achievements', null, ['placeholder' => 'Achievements', 'class' => 'form-control', 'required' => 'required'])}}
                        {{ errors_for('achievements', $errors) }}
                      </div>



                      </fieldset>
                      
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Achievement</button>
                        {{ Form::close() }}
                      </div>
                    </div>
                  </div>
                </div><!-- modal end here -->

                @foreach($rewards as $reward)
                <span class="text-muted">
                  {{$reward->achievements}}
                </span><br>
                @endforeach
                <ul class="list-inline reward-img">
                @foreach($rewards as $reward)
                  <li><img src="{{url()}}/achievementcertificate/{{$reward->achievement_certificate}}" class="sizeforcertificate responsive "><p>Mytext here for</p></li>
                
                @endforeach 
                </ul>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          
          @include('partials._audiencereview')

        </div>
      </div>
    </div>
  </div>
</div>

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
    request.onload = test;

    function test(var1) {
      var respObj = JSON.parse(this.response);
      console.log(respObj);
      window.location.hash = 'video';
            window.location.reload();
    }
    
     });
  
</script>
<script type="text/javascript">
  
    var audform = document.querySelector('.aud_form');
  var requestaud = new XMLHttpRequest();
  audform.addEventListener('submit',function(e){
    e.preventDefault();

    var formdata1 = new FormData(audform);
    requestaud.open('post','audiogallery');
    requestaud.send(formdata1);
    requestaud.onload = test;

    function test(var2) {
      var respObj = JSON.parse(this.response);
      console.log(respObj);
      window.location.hash = 'audio';
            window.location.reload();
    }
    
     });
  
</script>



@stop