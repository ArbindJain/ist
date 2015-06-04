@extends('master')

@section('title', 'Profile')

@section('content')

<script type="text/javascript">
            $(document).ready(function() {
              $('.performance-form').hide();
              $('.button').click(function(){
                  var target = '.'+$(this).data("target");
                 // $(".performance-form").not(target).hide();
                  //$(target).css({opacity: 1 });
                  $(target).animate({ height: 'toggle' }, 'slow');
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

                  $(target).animate({ height: 'toggle' }, 'slow');
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
        <li class="title-space ">{{$active_user->titlea}}&nbsp;{{$active_user->titleb}}&nbsp;{{$active_user->titlec}}</li>
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
    @if(Sentry::findUserByID(Sentry::getUser()->id)->inGroup(Sentry::findGroupByName('Stars')))
      <li role="navigation" class="active"><a href="#yourfeedwall" aria-controls="wall" role="tab" data-toggle="tab">MyEvent(wall)</a></li>
      <li role="navigation"><a href="#photo" aria-controls="photo" role="tab" data-toggle="tab">Photos</a></li>
      <li role="navigation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a></li>
      <li role="navigation"><a href="#audio" aria-controls="audio" role="tab" data-toggle="tab">Audio</a></li>
      <li role="navigation"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">Recent Activity</a></li>
      <li role="navigation"><a href="#blog" aria-controls="blog" role="tab" data-toggle="tab">Blog</a></li>
      <li role="navigation"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
    @elseif(Sentry::findUserByID(Sentry::getUser()->id)->inGroup(Sentry::findGroupByName('Audiences')))

      <li role="navigation" class="active"><a href="#yourfeedwall" aria-controls="wall" role="tab" data-toggle="tab">MyEvent(wall)</a></li>
      <li role="navigation"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">Recent Activity</a></li>
      <li role="navigation"><a href="#blog" aria-controls="blog" role="tab" data-toggle="tab">Blog</a></li>
      <li role="navigation"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
    @else(Sentry::findUserByID(Sentry::getUser()->id)->inGroup(Sentry::findGroupByName('Promoters')))

      <li role="navigation" class="active"><a href="#yourfeedwall" aria-controls="wall" role="tab" data-toggle="tab">MyEvent(wall)</a></li>
      <li role="navigation"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">Recent Activity</a></li>
      <li role="navigation"><a href="#blog" aria-controls="blog" role="tab" data-toggle="tab">Blog</a></li>
      <li role="navigation"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
      <li role="navigation"><a href="#events" aria-controls="events" role="tab" data-toggle="tab">Events</a></li>
          
    @endif
    </ul>
    </div>
    <div class="tab-content">
      <div class="clearfix"></div>
      <div role="tabpanel" class="tab-pane fade in active" id="yourfeedwall">

         
            <ul class="centertab  nav nav-pills">
            @if(Sentry::findUserByID(Sentry::getUser()->id)->inGroup(Sentry::findGroupByName('Stars')))
              <li role="navigation" class="active"><a href="#performance" aria-controls="performance" role="tab" data-toggle="tab">Performance</a></li>
              <li role="navigation"><a href="#tutorial" aria-controls="tutorial" role="tab" data-toggle="tab">Tutorial</a></li>
              <li role="navigation"><a href="#findtalent" aria-controls="findtalent" role="tab" data-toggle="tab">Find-Talent</a></li>
            @elseif(Sentry::findUserByID(Sentry::getUser()->id)->inGroup(Sentry::findGroupByName('Audiences')))
              <li role="navigation" class="active"><a href="#performance" aria-controls="performance" role="tab" data-toggle="tab">Performance</a></li>
              <li role="navigation"><a href="#tutorial" aria-controls="tutorial" role="tab" data-toggle="tab">Tutorial</a></li>
              <li role="navigation"><a href="#findtalent" aria-controls="findtalent" role="tab" data-toggle="tab">Find-Talent</a></li>
     
            @else(Sentry::findUserByID(Sentry::getUser()->id)->inGroup(Sentry::findGroupByName('Promoters')))

              <li role="navigation"><a href="#tutorial" aria-controls="tutorial" role="tab" data-toggle="tab">Tutorial</a></li>
              <li role="navigation"><a href="#findtalent" aria-controls="findtalent" role="tab" data-toggle="tab">Find-Talent</a></li>
     
            @endif
              
            </ul> 

          <div class="tab-content" style="margin: 10px 0px;">

            <div role="tabpanel" class="tab-pane fade in active" id="performance">
                <div class="col-md-8 perf">
                <div class="row">
                    <a href="#" style="text-decoration:none;" class="button btn bnt-md btn-link text-capitalize" data-target = "performance-form">Performing</a>
                    <div class="clearfix"></div>
                    <div class="performance-form">
                    
                    <div class="clearfix"></div>
                    <div class="form-box">
                    <a href="#"  class="performance-closebutton pull-right closebutton" data-target = "performance-form">
                    <i class="fa fa-times"></i>
                    </a>
                        {{ Form::open(['route' => 'userperformances.store']) }}
                            <fieldset>

                                @if (Session::has('flash_message'))
                                <div class="form-group">
                                <p>{{ Session::get('flash_message') }}</p>
                                </div>
                                @endif

                                <!-- performance text field -->
                                <div class="form-group">
                                {{ Form::label('performancetext', 'performance title',['class' => 'text-capitalize text-muted']) }}
                                {{ Form::text('performancetext', null, ['placeholder' => 'Where are you performing today', 'class' => 'form-control', 'required' => 'required'])}}
                                {{ errors_for('performancetext', $errors) }}
                                </div>

                                <!-- venue Description field -->
                                <div class="form-group">
                                {{ Form::label('venue', 'venue',['class' => 'text-capitalize text-muted']) }}
                                {{ Form::text('venue', null, ['placeholder' => 'venue details', 'class' => 'form-control', 'required' => 'required'])}}
                                {{ errors_for('venue', $errors) }}
                                </div>

                                <!-- date and time Description field -->
                                <div class="form-group">
                                {{ Form::label('performancedatetime', 'performance date & time',['class' => 'text-capitalize text-muted']) }}
                                <input type='text' name="performancedatetime" placeholder="performance date and time" class="form-control" id='datetimepicker1' />
                                {{ errors_for('performancedatetime', $errors) }}
                                </div>

                                <!-- Submit field -->
                                <div class="form-group">
                                {{ Form::submit('performing soon!!', ['class' => 'btn btn-md btn-default videobutton']) }}
                                </div>

                            </fieldset>
                        {{ Form::close() }}
                        </div>
                    </div>
                    @foreach($performances as $performance)
                      <div class="col-md-4">
                        <div class="performance-wrapper">

                          <div class="performance-date"> <i class="fa fa-clock-o"></i> {{Carbon\Carbon::parse($performance->performancedatetime)->toDayDateTimeString()}}</div>

                          <div class="performance-input">{{$performance->performancetext}}</div>
                          <div class="performance-venue">
                          <div class="map-icon pull-left"><i class="fa fa-map-marker"></i></div>
                           <div class="venue-data pull-right">{{$performance->venue}}</div>
                          </div>
                        </div>
                      </div>

                    @endforeach
                    </div>
                </div><!-- end of col md -->
                  <div class="col-md-4">
                    @include('partials._audiencereview')
                  </div>
            </div>

            <div role="tabpanel" class="tab-pane fade " id="tutorial">
            No tutorial uploaded yet
            <!-- temp demo -->

            </div>
            
            <!-- button for scout generation -->
            <div role="tabpanel" class="tab-pane fade" id="findtalent">
              <div class="col-md-8">
                <div class="row">

              <a type="button" href="{{url()}}/scout/create" class="btn btn-md btn-link">Create</a>
              <a type="button" href="#" class="btn btn-md btn-link sbutton">Scout</a>
              <a type="button" href="#" class="btn btn-md btn-link abutton">Applied Scout</a>
              <div id="content-scout" class="alls">
            @foreach($scouts as $scout)
             @if(Sentry::findUserByID($scout->user_id)->inGroup(Sentry::findGroupByName('Promoters')))
                        {{--*/ $usergroupe = 'Chide'; /*--}}
                        {{--*/ $usergroup = 'Corporate'; /*--}}
                        @elseif(Sentry::findUserByID($scout->user_id)->inGroup(Sentry::findGroupByName('Stars')))
                        {{--*/ $usergroupe = 'Phide'; /*--}}
                        {{--*/ $usergroup = 'Private'; /*--}}
                        @endif

                  <div class="col-lg-6 col-md-6 {{$usergroupe}} {{$scout->city}}">
                        
                        <aside>
                              <div class="headerscout-block {{$usergroup}}">
                                <span class="posted-date">
                                  {{--*/ $created = new Carbon\Carbon($scout->applydatetime); /*--}}
                                  {{--*/ $now = Carbon\Carbon::now(); /*--}}
                                  {{--*/$difference = ($created->diff($now)->days < 1)
                                  ? 'today'
                                  : $created->diffInDays($now); /*--}} 

                                  
                                  @if($difference == 'today')
                                   <b class= "timeleft"> Last day to apply! </b>
                                  @else
                                   <b class="timeleft">{{$difference}} days to go!</b>
                                  @endif
                                  
                                </span>

                                <span class="posted-type pull-right"> {{$usergroup}} Event</span> 
                              </div>
                              <a href="{{url()}}/scout/{{$scout->id}}">
                              <img src="{{url()}}/{{$scout->scoutposter}}" class="img-responsive">
                              </a>
                              <div class="content-title">
                                    <div class="">
                                    <h3><a href="{{url()}}/scoutpublished/{{$scout->id}}">{{ substr($scout->scouttitle, 0, 25) }}</a></h3>
                                    @if($scout->renumerationmin == null && $scout->renumerationmax != null)
                                    <h5><b>Renumeration:</b> <i class="fa fa-inr"></i>&nbsp;{{$scout->renumerationmax}}</h5>
                                    @else
                                    <h5><b>Renumeration:</b> <i class="fa fa-inr"></i>&nbsp;{{$scout->renumerationmin}} - <i class="fa fa-inr"></i>&nbsp;{{$scout->renumerationmax}}</h5>
                                    @endif
                                    <h5><b>Venue :</b> {{$scout->city}}&nbsp;,{{$scout->country}}</h5>
                                    <h5><b>Category: </b>
                                    @if(isset($scout->art))
                                    <span>Arts</span>

                                    @else
                                     
                                    @endif
                                    @if(isset($scout->collection))
                                    <span>Collection</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($scout->cooking))
                                    <span>Cooking</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($scout->dance))
                                    <span>Dance</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($scout->fashion))
                                    <span>Fashion</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($scout->moviesandtheatre))
                                    <span>Movies&Theatre</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($scout->music))

                                    @else
                                     
                                    @endif
                                    @if(isset($scout->sports))
                                    <span>Sports</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($scout->unordinary))
                                    <span>Unordinary</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($scout->wanderer))
                                    <span>Wanderer</span>
                                    @else
                                     
                                    @endif
                                    </h5>

                                    </div>
                              </div>
                              <div class="content-footer">
                                    <img src="{{url()}}/{{Sentry::findUserById($scout->user_id)->profileimage}}">
                                    <span class="text-capitalize footer-username">{{Sentry::findUserById($scout->user_id)->name}}</span>
                                    <span class="pull-right">
                                         <a href="#"><i class="fa fa-thumbs-o-up"></i> {{$scout->counted}}</a>
                                    </span>
                              </div>
                        </aside>
                  </div>   
            @endforeach  
            </div> 
            <!-- temp -->
                
<div id="content-scout" class="applieds" style="display:none;">
            @foreach($scoutadds as $scoutadd)
              @foreach($scoutadd->scouted as $scoutinfo)
             @if(Sentry::findUserByID($scoutinfo->user_id)->inGroup(Sentry::findGroupByName('Promoters')))
                        {{--*/ $usergroupe = 'Chide'; /*--}}
                        {{--*/ $usergroup = 'Corporate'; /*--}}
                        @elseif(Sentry::findUserByID($scoutinfo->user_id)->inGroup(Sentry::findGroupByName('Stars')))
                        {{--*/ $usergroupe = 'Phide'; /*--}}
                        {{--*/ $usergroup = 'Private'; /*--}}
                        @endif

                  <div class="col-lg-6 col-md-6 {{$usergroupe}} {{$scoutinfo->city}}">
                        
                        <aside>
                              <div class="headerscout-block {{$usergroup}}">
                                <span class="posted-date">
                                  {{--*/ $created = new Carbon\Carbon($scoutinfo->applydatetime); /*--}}
                                  {{--*/ $now = Carbon\Carbon::now(); /*--}}
                                  {{--*/$difference = ($created->diff($now)->days < 1)
                                  ? 'today'
                                  : $created->diffInDays($now); /*--}} 

                                  
                                  @if($difference == 'today')
                                   <b class= "timeleft"> Last day to apply! </b>
                                  @else
                                   <b class="timeleft">{{$difference}} days to go!</b>
                                  @endif
                                  
                                </span>

                                <span class="posted-type pull-right"> {{$usergroup}} Event</span> 
                              </div>
                              <a href="{{url()}}/scoutresult/{{$scoutinfo->id}}">
                              <img src="{{url()}}/{{$scoutinfo->scoutposter}}" class="img-responsive">
                              </a>
                              <div class="content-title">
                                    <div class="">
                                    <h3><a href="{{url()}}/scoutresult/{{$scoutinfo->id}}">{{ substr($scoutinfo->scouttitle, 0, 25) }}</a></h3>
                                    @if($scoutinfo->renumerationmin == null && $scoutinfo->renumerationmax != null)
                                    <h5><b>Renumeration:</b> <i class="fa fa-inr"></i>&nbsp;{{$scoutinfo->renumerationmax}}</h5>
                                    @else
                                    <h5><b>Renumeration:</b> <i class="fa fa-inr"></i>&nbsp;{{$scoutinfo->renumerationmin}} - <i class="fa fa-inr"></i>&nbsp;{{$scoutinfo->renumerationmax}}</h5>
                                    @endif
                                    <h5><b>Venue :</b> {{$scoutinfo->city}}&nbsp;,{{$scoutinfo->country}}</h5>
                                    <h5><b>Category: </b>
                                    @if(isset($scoutinfo->art))
                                    <span>Arts</span>

                                    @else
                                     
                                    @endif
                                    @if(isset($scoutinfo->collection))
                                    <span>Collection</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($scoutinfo->cooking))
                                    <span>Cooking</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($scoutinfo->dance))
                                    <span>Dance</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($scoutinfo->fashion))
                                    <span>Fashion</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($scoutinfo->moviesandtheatre))
                                    <span>Movies&Theatre</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($scoutinfo->music))

                                    @else
                                     
                                    @endif
                                    @if(isset($scoutinfo->sports))
                                    <span>Sports</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($scoutinfo->unordinary))
                                    <span>Unordinary</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($scoutinfo->wanderer))
                                    <span>Wanderer</span>
                                    @else
                                     
                                    @endif
                                    </h5>

                                    </div>
                              </div>
                              <div class="content-footer">
                                    <img src="{{url()}}/{{Sentry::findUserById($scoutinfo->user_id)->profileimage}}">
                                    <span class="text-capitalize footer-username">{{Sentry::findUserById($scoutinfo->user_id)->name}}</span>
                                    <span class="pull-right">
                                         <a href="#"><i class="fa fa-thumbs-o-up"></i> {{$scoutinfo->counted}}</a>
                                    </span>
                              </div>
                        </aside>
                  </div>   
            @endforeach  
            @endforeach
            
            </div>
            <!-- end of temp -->   
                </div>
                 
                  
                 


              </div>     
              <div class="col-md-4">
                
              </div>      
              
            </div>          
      </div>
    </div>
      <div role="tabpanel" class="tab-pane fade " id="photo">
        <div class="col-md-8">
        <div class="row">
            <!-- create album Button trigger modal -->
      <a type="button" class=" btn btn-link text-capitalize" data-toggle="modal" data-target="#createalbummodal">
        create album
      </a>
       <a type="button" class="btn btn-link text-capitalize" data-toggle="modal" data-target=".bs-example-modal-lg">
        upload Picture
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
      <div class="modal fade" id="createalbummodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Create Album</h4>
            </div>
            <div class="modal-body">
                  {{ Form::open(['route' => 'album.store']) }}
                      <fieldset>

                        @if (Session::has('flash_message'))
                <div class="form-group">
                  <p>{{ Session::get('flash_message') }}</p>
                </div>
              @endif


              <!-- Album name field -->
              <div class="form-group">
                {{ Form::label('albumname', 'Album title',['class' => 'text-capitalize text-muted']) }}
                {{ Form::text('albumname', null, ['placeholder' => 'Album Name', 'class' => 'form-control', 'required' => 'required'])}}
                {{ errors_for('albumname', $errors) }}
              </div>
              <div class="form-group">
                {{ Form::label('albumtag', 'Tags',['class' => 'text-capitalize text-muted']) }}<br>
                <input type="text" name="albumtag" value="" class="form-control" data-role="tagsinput"> 
                {{ errors_for('albumtag', $errors) }}
              </div>

              




              </fieldset>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-default">Create Album</button>
            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div><!-- album modal end !-->  
      <!-- image modal start -->
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
              <div class="form-group">
                {{ Form::label('picturetag', 'Tags',['class' => 'text-capitalize text-muted']) }}<br>
                <input type="text" name="picturetag" value="" data-role="tagsinput"> 
                {{ errors_for('picturetag',$errors)}}
              </div>
              
            
              
 
              <!-- Submit field -->
              <div class="form-group">
                
      <button type="submit" class="btn  btn-default">Upload Image</button>
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
              <button type="button" class="btn btn-default">uplaod image</button>
            </div>
          </div>
        </div>
      </div><!-- video modal end !-->  
      <!-- end of image modal -->
     

        </div>

        <div class="col-md-4">
        @include('partials._audiencereview')
          
        </div>

      
      
        
        
               
      </div><!-- photo tabpanel end !-->
      <div role="tabpanel" class="tab-pane fade" id="video">
        <div class="col-md-8">
          <div class="row">
            <a type="button" class=" btn btn-link text-capitalize" data-toggle="modal" data-target="#myModalvideo">
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
                <div class="img-description">{{$uservid->videodescription}}</div>
                <!-- // -->
                <!-- video like button -->
                @include('partials._videolikebutton')
                <!-- End video like button -->
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
          
          <!-- Modal -->
      <div class="modal fade" id="myModalvideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add Video</h4>
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
                {{ Form::label('videotitle', 'Video title',['class' => 'text-capitalize text-muted']) }}
                {{ Form::text('videotitle', null, ['placeholder' => 'Video Title', 'class' => 'form-control','id'=>'vidtitle', 'required' => 'required'])}}
                {{ errors_for('videotitle', $errors) }}
              </div>
              <!-- Image Description field -->
              <div class="form-group">
                {{ Form::label('videodescription', 'Video Description',['class' => 'text-capitalize text-muted']) }}
                {{ Form::text('videodescription', null, ['placeholder' => 'Video Description', 'class' => 'form-control', 'required' => 'required'])}}
                {{ errors_for('videodescription', $errors) }}
              </div>
              <div class ="form-group">
                {{ Form::label('videotag', 'Tags',['class' => 'text-capitalize text-muted']) }}<br>
                <input type="text" name="videotag" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput"> 
                {{errors_for('videotag',$errors)}}
              </div>

              <div class="form-group">
              
              {{ Form::label('videosrc', 'upload Video',['class' => 'text-capitalize text-muted']) }}
              {{ Form::file('videosrc') }}
              </div>

              



              




              </fieldset>

            </div><!-- modal boxy end !-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-default">Upload Video</button>
            </div>

                {{ Form::close() }}
          </div>
        </div>
      </div><!-- video modal end !-->  
        </div>
        <div class="col-md-4">
          @include('partials._audiencereview')
        </div>
        
      </div><!-- video tabpanel end !-->
      <div role="tabpanel" class="tab-pane fade" id="audio">
        <div class="col-md-8">
          <div class="row ">
            <a type="button" class="btn btn-link text-capitalize" data-toggle="modal" data-target="#myModalaudio">
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

                <!-- Audio like button -->
                @include('partials._audiolikebutton')
                <!-- End Audio like button -->

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

                  <div class="comment-target"></div>
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

              

              <!-- Image title field -->
              <div class="form-group">
                {{ Form::label('audiotitle', 'Audio title',['class' => 'text-capitalize text-muted']) }}
                {{ Form::text('audiotitle', null, ['placeholder' => 'Audio Title', 'class' => 'form-control', 'required' => 'required'])}}
                {{ errors_for('audiotitle', $errors) }}
              </div>

              <!-- Image Description field -->
              <div class="form-group">
                {{ Form::label('audiodescription', 'Audio Description',['class' => 'text-capitalize text-muted']) }}
                {{ Form::text('audiodescription', null, ['placeholder' => 'Audio Description', 'class' => 'form-control', 'required' => 'required'])}}
                {{ errors_for('audiodescription', $errors) }}
              </div>
              <div class ="form-group">
                {{ Form::label('audiotag', 'Tags',['class' => 'text-capitalize text-muted']) }}<br>
                <input type="text" name="audiotag" value="" data-role="tagsinput"> 
                {{errors_for('audiotag',$errors)}}
              </div>

              <div class="form-group">
              {{ Form::file('audiosrc') }}
              </div>

              



              </fieldset>

            </div><!-- modal boxy end !-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-default">Uplaod Audio</button>
            </div>

                {{ Form::close() }}
          </div>
        </div>
      </div><!-- video modal end !--> 
        </div>
        <div class="col-md-4">
          
          @include('partials._audiencereview')

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

          @include('partials._audiencereview')
          
        </div>
      
      </div>
      <div role="tabpanel" class="tab-pane fade" id="about">
        <div class="col-md-8">
          <div class="col-md-6">
            <div class="about-details-block" >
              <span class="about-title text-capitalize text-muted">Name</span>
              <span class="">{{Sentry::findUserById($abouts->user_id)->name}}</span>
            </div>
            <div class="about-details-block" >
              <span class="about-title text-capitalize text-muted">DOB</span>
              <span class="">{{Sentry::findUserById($abouts->user_id)->dob}}</span>
            </div>
            <div class="about-details-block" >
              <span class="about-title text-capitalize text-muted">Gender</span>
              <span class="">{{Sentry::findUserById($abouts->user_id)->gender}}</span>
            </div>
            <div class="about-details-block" >
              <span class="about-title text-capitalize text-muted">Email</span>
              <span class="">{{Sentry::findUserById($abouts->user_id)->email}}</span>
            </div>
            <div class="about-details-block">
              <span class="about-title text-capitalize text-muted">Title</span>
              <span class=" text-title text-capitalize">{{Sentry::findUserById($abouts->user_id)->title}}</span>
            </div>
            <div class="about-details-block">
              <span class="about-title text-capitalize text-muted">Phone</span>
              <span class="">{{Sentry::findUserById($abouts->user_id)->phone}}</span>
            </div>
            
            <div class="about-details-block">
              <span class="about-title text-capitalize text-muted">talent fields</span><br>
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
                <span class="profile-title text-capitalize text-muted">About me</span><br>
                <span class="">{{$abouts->about_us}}</span>
              </div>
              <div class="about-details-block" >
                <span class="profile-title text-capitalize text-muted">Awards or Achievements<span class="pull-right"><a type="button" data-toggle="modal" data-target="#myModalachievement">Add</a></span></span><br>
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
                        <button type="submit" class="btn btn-default">Add Achievement</button>
                        {{ Form::close() }}
                      </div>
                    </div>
                  </div>
                </div><!-- modal end here -->
                @foreach($rewards as $reward)
                <span class="">
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
          
          @include('partials._audiencereview')

        </div>
      </div>
       @if(Sentry::findUserByID(Sentry::getUser()->id)->inGroup(Sentry::findGroupByName('Promoters')))
           <div role="tabpanel" class="tab-pane fade " id="events">
              <div class="col-md-8">
                <div class="row">

              <a type="button" href="{{url()}}/events/create" class="btn btn-md btn-link">Create</a>
                  <div id="content-scout">
            @foreach($events as $event)
             @if(Sentry::findUserByID($event->user_id)->inGroup(Sentry::findGroupByName('Promoters')))
                        {{--*/ $usergroupe = 'Chide'; /*--}}
                        {{--*/ $usergroup = 'Corporate'; /*--}}
                        @elseif(Sentry::findUserByID($event->user_id)->inGroup(Sentry::findGroupByName('Stars')))
                        {{--*/ $usergroupe = 'Phide'; /*--}}
                        {{--*/ $usergroup = 'Private'; /*--}}
                        @endif

                  <div class="col-lg-6 col-md-6 {{$usergroupe}} {{$event->city}}">
                        
                        <aside>
                              <div class="headerscout-block {{$usergroup}}">
                                <span class="posted-date">
                                  {{--*/ $created = new Carbon\Carbon($event->applydatetime); /*--}}
                                  {{--*/ $now = Carbon\Carbon::now(); /*--}}
                                  {{--*/$difference = ($created->diff($now)->days < 1)
                                  ? 'today'
                                  : $created->diffInDays($now); /*--}} 

                                  
                                  @if($difference == 'today')
                                   <b class= "timeleft"> Last day to apply! </b>
                                  @else
                                   <b class="timeleft">{{$difference}} days to go!</b>
                                  @endif
                                  
                                </span>

                                <span class="posted-type pull-right"> {{$usergroup}} Event</span> 
                              </div>
                              <a href="{{url()}}/events/{{$event->id}}">
                              <img src="{{url()}}/{{$event->poster}}" class="img-responsive"></a>
                              
                              <div class="content-title">
                                    <div class="">
                                    <h3><a href="{{url()}}/events/{{$event->id}}">{{ substr($event->eventname, 0, 25) }}</a></h3>
                                    @if($event->renumerationmin == null && $event->renumerationmax != null)
                                    <h5><b>Renumeration:</b> <i class="fa fa-inr"></i>&nbsp;{{$event->renumerationmax}}</h5>
                                    @else
                                    <h5><b>Renumeration:</b> <i class="fa fa-inr"></i>&nbsp;{{$event->renumerationmin}} - <i class="fa fa-inr"></i>&nbsp;{{$event->renumerationmax}}</h5>
                                    @endif
                                    <h5><b>Venue :</b> {{$event->city}}&nbsp;,{{$event->country}}</h5>
                                    <h5><b>Category: </b>
                                    @if(isset($event->art))
                                    <span>Arts</span>

                                    @else
                                     
                                    @endif
                                    @if(isset($event->collection))
                                    <span>Collection</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($event->cooking))
                                    <span>Cooking</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($event->dance))
                                    <span>Dance</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($event->fashion))
                                    <span>Fashion</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($event->moviesandtheatre))
                                    <span>Movies&Theatre</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($event->music))

                                    @else
                                     
                                    @endif
                                    @if(isset($event->sports))
                                    <span>Sports</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($event->unordinary))
                                    <span>Unordinary</span>
                                    @else
                                     
                                    @endif
                                    @if(isset($event->wanderer))
                                    <span>Wanderer</span>
                                    @else
                                     
                                    @endif
                                    </h5>

                                    </div>
                              </div>
                              <div class="content-footer">
                                    <img src="{{url()}}/{{Sentry::findUserById($event->user_id)->profileimage}}">
                                    <span class="text-capitalize footer-username">{{Sentry::findUserById($event->user_id)->name}}</span>
                                    <span class="pull-right">
                                         <a href="#"><i class="fa fa-thumbs-o-up"></i> {{$event->counted}}</a>
                                    </span>
                              </div>
                        </aside>
                  </div>   
            @endforeach  
            </div>     
                </div>
                 
                  
                 


              </div>     
              <div class="col-md-4">
                
              </div>     
            </div><!-- end of events -->
          @endif
    </div>

  </div>
</div>
</div>
<script type="text/javascript">
  $.getScript('http://timschlechter.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.js',function(){

 
  
});
</script>
<style type="text/css">
  @import url('http://timschlechter.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css');

.input-group .bootstrap-tagsinput {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    width: 100%;
    margin-bottom: 1px;
}

</style>
<script type="text/javascript">
   
   
  $(document).ready( function(){
   $('.abutton').click(function(e){
        e.preventDefault();
        $('.applieds').fadeIn('slow');
        $('.alls').fadeOut('slow');
       
    
      });
   $('.sbutton').click(function(e){
        e.preventDefault();
        $('.alls').fadeIn('slow');
        $('.applieds').fadeOut('slow');
       
    
      });
  


  });
  

 
</script>
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