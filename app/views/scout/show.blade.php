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
  <div class="col-md-12 ">
    <div class="sub-nav-block">
    <ul class="nav nav-pills centertab ">
      <li role="navigation" class="active"><a href="{{url()}}/userProtected#yourfeedwall">MyEvent(wall)</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#photo">Photos</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#video">Video</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#audio">Audio</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#recent">Recent Activity</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#blog">Blog</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#about" >About</a></li>
    </ul>
    </div>
    <div class="tab-content">
      <div class="clearfix"></div>
      <div role="tabpanel" class="tab-pane active" id="yourfeedwall">
        <div class="col-md-8">
            <ul class=" tabnav centertab">
              <li role="navigation" class="active"><a href="#performance" aria-controls="performance" role="tab" data-toggle="tab">Performance</a></li>
              <li role="navigation"><a href="#tutorial" aria-controls="tutorial" role="tab" data-toggle="tab">Tutorial</a></li>
              <li role="navigation"><a href="#findtalent" aria-controls="findtalent" role="tab" data-toggle="tab">Find-Talent</a></li>
            </ul> 
          </div>

          <div class="tab-content">
            <div class="clearfix"></div>
            <div role="tabpanel" class="tab-pane" id="performance">
            Performance
            </div>
            <div role="tabpanel" class="tab-pane " id="tutorial">
            tutorial
            </div>
            <!-- button for scout generation -->
            <div role="tabpanel" class="tab-pane active" id="findtalent">
             <!-- <div class="scout-wrapper">
              	{{ HTML::image($scout->scoutposter , 'profile picture', array('class' => 'img-thumbnail pull-left','id'=>'postersize')) }}
                  <span>Title : {{$scout->scouttitle}}</span><br>
                  <span>Date and Time : {{Carbon\Carbon::parse($scout->scoutdatetime)->toDayDateTimeString()}}</span><br>
                  <span>duration : {{$scout->scoutduration}}</span><br>
                  <span>renumeration : {{$scout->renumeration}}</span><br>
                  <span>venue : {{$scout->venue}}</span><br>
                  <span>skills : {{$scout->skills}}</span><br>
                  <span>scoutdescription : {{$scout->scoutdescription}}</span><br>
                  <span>artistdescription : {{$scout->artistdescription}}</span><br>
                  <span>posted around - {{$scout->created_at->diffForHumans()}}</span><br>
              </div>  -->
              <div class="clearfix"></div>
              <div class="selected-sc">
                <h3>Selected</h3>
                @foreach($selectedscout as $selecteduser)

                  @foreach($selecteduser->selectlist as $selectedmr)

                    <div class="col-md-4">
                    <span class="scoutevent">
                    <a href="#" class="scoutposterblock">
                      {{ HTML::image(Sentry::findUserById($selecteduser->user_id)->profileimage , 'profile picture', array('class' => 'img-circle pull-left scoutuserimg-size')) }}
                      <div class="scoutusername"><p>{{Sentry::findUserById($selecteduser->user_id)->name}}</p></div>
                      <div class="scoutusertitle"><p>{{Sentry::findUserById($selecteduser->user_id)->title}}</p></div>
                    </a>
                    </span>

                    </div>  
                  @endforeach
                @endforeach
              </div>
              <div class="clearfix"></div>
              <div class="shortlisted-sc">
                <h3>Short-listed</h3>
                @foreach($shortlistscout as $shota)
                  @foreach($shota->shlisted as $shotalist)
                    <div class="col-md-4">
                    <span class="scoutevent">
                    
                    <a href="#" class="scoutposterblock">
                      {{ HTML::image(Sentry::findUserById($shota->user_id)->profileimage , 'profile picture', array('class' => 'img-circle pull-left scoutuserimg-size')) }}
                      <div class="scoutusername"><p>{{Sentry::findUserById($shota->user_id)->name}}</p></div>
                      <div class="scoutusertitle"><p>{{Sentry::findUserById($shota->user_id)->title}}</p></div>
                    </a>
                    </span>

                    </div>
                  @endforeach
                @endforeach
              </div>
              <div class="clearfix"></div>
              <div class="applicants-sc">
                <h3>Applicants</h3>

                @foreach($applicantscout as $applicants)
               

                  <!-- Button trigger modal -->
<div class="col-md-4">
                  <span class="scoutevent">
  <a href="" data-toggle="modal" data-target="#myModal-{{$applicants->id}}" class="scoutposterblock">
                      {{ HTML::image(Sentry::findUserById($applicants->user_id)->profileimage , 'profile picture', array('class' => 'img-circle pull-left scoutuserimg-size')) }}
                      <div class="scoutusername"><p>{{Sentry::findUserById($applicants->user_id)->name}}</p></div>
                      <div class="scoutusertitle"><p>{{Sentry::findUserById($applicants->user_id)->title}}</p></div>
  </a>


</span>

                  </div>

<!-- Modal -->
<div class="modal fade" id="myModal-{{$applicants->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       
      <div class="modal-body" style="height: 300px; background-color: #e5e5e5;">
      <div class="col-md-2">
        <div class="pop-img">{{ HTML::image(Sentry::findUserById($applicants->user_id)->profileimage , 'profile picture', array('class' => 'img-circle pull-left scoutuserimg-size')) }}
     </div>
     <div class="pop-username text-capitalize">{{Sentry::findUserById($applicants->user_id)->name}}</div>
      <div class="pop-title text-capitalize">{{Sentry::findUserById($applicants->user_id)->title}}</div>
      </div>
      <div class="col-md-10">
        <ul class="pop-button nav nav-pills ">
        <li class="pull-right">
          {{ Form::model($applicants, ['method' => 'PUT', 'route' => ['scoutpublishedapply.update',$applicants->id]]) }}         
          {{ Form::hidden('shortlist', '1') }}
          {{ Form::hidden('selected', 'NULL') }}
          {{ Form::submit('shortlist', ['class' => 'btn']) }}
          {{ Form::close() }}</li>
        
        <li class="pull-right">  
        {{ Form::model($applicants, ['method' => 'PUT', 'route' => ['scoutpublishedapply.update',$applicants->id]]) }}         
          {{ Form::hidden('shortlist', 'NULL') }}
          {{ Form::hidden('selected', '1') }}
          {{ Form::submit('selected', ['class' => 'btn ']) }}
          {{ Form::close() }}</li>
        

      </ul>
      <div class="attachedfile-block">
      <img src="{{url()}}/{{$applicants->image}}-resiged.jpg" class="img-thumb imgsize-insidemodal">
      <div class="flowplayer videosize-modal ">
        <video>
          <source type="video/webm" src="{{url()}}/galleryvideo/webm/{{$applicants->video}}.webm">
          <source type="video/mp4"   src="{{url()}}/galleryvideo/mp4/{{$applicants->video}}.mp4">
          <source type="video/flash" src="{{url()}}/galleryvideo/flv/{{$applicants->video}}.flv">
        </video>
      </div>
      </div>
      </div>
      
      

      
      </div>
    </div>
  </div>
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



            
@stop