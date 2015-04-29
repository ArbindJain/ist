@extends('master')

@section('title', 'Profile')

@section('content')

                                  


<div class="col-md-4">
  <div class="singlescout-poster">
    {{ HTML::image($scoutview->scoutposter , 'profile picture', array('class' => 'imgscout pull-left','id'=>'largepostersize')) }}  
    
  </div><!-- end of singlescout-poster -->
  <div class="content-footerscout">
    <img src="{{url()}}/{{Sentry::findUserById($scoutview->user_id)->profileimage}}">
    <span class="text-capitalize footer-username">{{Sentry::findUserById($scoutview->user_id)->name}}</span>
    <span class="pull-right">
          <a href="#"><i class="fa fa-thumbs-o-up" data-toggle="tooltip" data-placement="top" title="" data-original-title="Loved"></i> 20</a>
    </span>
  </div>
  <div class="addressmap-block">
    <div class="s-address"><c class="text-muted">Venue</c><br><i class="fa fa-map-marker"></i>&nbsp; {{$scoutview->venue}},&nbsp;{{$scoutview->city}},&nbsp;{{$scoutview->country}}</div>
    <div class="s-map"><img width="348px" height="348px" src="https://www.sheffield.ac.uk/polopoly_fs/1.108478!/image/staticmap.gif"></div>
  </div>
  <div class="rights-block">
  <h3>Disclaimer</h3>
    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
  </div>
</div><!-- end of col-8 -->

<div class="col-md-8">


  <div class="scout-sidebar">
    <!-- titlebar -->
    <div class="title-bar ">
      <div class="text-capitalize tit-scout"><p>{{$scoutview->scouttitle}}</p>
       
      </div>
      <div class="text-capitalize text-center butt-scout">
        <div class="button-block">
      <button type="button" class="btn btn-default btn-md pull-right text-uppercase" data-toggle="modal" data-target="#myModalapply">
          <i class="fa fa-plus"></i> Participate
        </button>
    </div>
        </div>
      
    </div>

    <p class="lastdate-on"> <i class="fa fa-clock-o"></i> Submission</p>
    <!-- end of titlebar -->
    {{--*/ $created = new Carbon\Carbon($scoutview->applydatetime); /*--}}
  {{--*/ $now = Carbon\Carbon::now(); /*--}}

    <div id="CountDownTimer" data-timer="{{$created->diffInSeconds($now)}}" style="background-color:#ffffff;" ></div>
    <!-- below timer --> 
    <div class="prize-block">
      <span class="p-title">remuneration</span>
      @if($scoutview->renumerationmin == null && $scoutview->renumerationmax != null)
      <span class="p-value"><i class="fa fa-inr"></i>&nbsp;{{$scoutview->renumerationmax}}</span>
      @else
      <span class="p-value"><i class="fa fa-inr"></i>&nbsp;{{$scoutview->renumerationmin}} - <i class="fa fa-inr"></i>&nbsp;{{$scoutview->renumerationmax}}</span>
      @endif
    </div>  
    <!-- end of belowtimer -->

  </div><!-- end of scout sidebar-->
  <!-- tabs temp -->
    <div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#event" aria-controls="home" role="tab" data-toggle="tab">Event Details</a></li>
    <li role="presentation"><a href="#artist" aria-controls="profile" role="tab" data-toggle="tab">Artist Details</a></li>
    <li role="presentation"><a href="#key" aria-controls="messages" role="tab" data-toggle="tab">Key Dates</a></li>
    <li role="presentation"><a href="#agree" aria-controls="settings" role="tab" data-toggle="tab">Agreements</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content scout-contenttab">
    <div role="tabpanel" class="tab-pane fade in active" id="event">
   
      <p class="p-desc">{{$scoutview->scoutdescription}}</p>
      
      <ul class="ul-type-a">
      @if($scoutview->audiencesizemin == null && $scoutview->audiencesizemax != null)
        <li><span class="x-label">Audience Size</span><span class="x-content"><i class="fa fa-users"></i><span class="x-content-inner"> {{$scoutview->audiencesizemax}} &nbsp;&nbsp;<span class="text-muted">People</span></span></span></li>
      @else
      <li><span class="x-label">Audience Size</span><span class="x-content"><i class="fa fa-users"></i><span class="x-content-inner">{{$scoutview->audiencesizemin}} - {{$scoutview->audiencesizemax}} &nbsp;&nbsp;<span class="text-muted">People</span></span></span></li>
      @endif    
          
      </ul>
      <hr style="margin:0px;">

    </div>
    <div role="tabpanel" class="tab-pane fade" id="artist">
    
      <p class="p-desc">{{$scoutview->artistdescription}}</p>
      <ul class="ul-type-a">
    <li><span class="x-label">Skills</span><span class="x-content"><i class="fa fa-wrench"></i><span class="x-content-inner">{{$scoutview->skills}} &nbsp;&nbsp;</span></span></li>
    @if($scoutview->agerangemin == null && $scoutview->agerangemax != null)
    <li><span class="x-label">Age-Group</span><span class="x-content"><i class="fa fa-child"></i><span class="x-content-inner"> {{$scoutview->agerangemax}} &nbsp;&nbsp;<span class="text-muted">(years)</span></span></span></li>
    @else
    <li><span class="x-label">Age-Group</span><span class="x-content"><i class="fa fa-child"></i><span class="x-content-inner"> {{$scoutview->agerangemin}} - {{$scoutview->agerangemax}} &nbsp;&nbsp;<span class="text-muted">(years)</span></span></span></li>
    @endif
    @if($scoutview->gender == 'NULL')
    <li><span class="x-label">Gender</span><span class="x-content"><i class="fa fa-venus-mars"></i><span class="x-content-inner">Not Specified</span></span></li>
    @else
    <li><span class="x-label">Gender</span><span class="x-content"><i class="fa fa-venus-mars"></i><span class="x-content-inner">{{$scoutview->gender}}</span></span></li>
    
    @endif
   <li>
        <span class="x-label">Category</span>
        <span class="x-content">
            <i class="fa fa-tags"></i>
            <span class="x-content-inner">
                @if(isset(Sentry::findUserById($scoutview->user_id)->art))
                <span>Arts,&nbsp;</span>

                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->collection))
                <span>Collection,&nbsp;</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->cooking))
                <span>Cooking,&nbsp;</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->dance))
                <span>Dance,&nbsp;</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->fashion))
                <span>Fashion,&nbsp;</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->moviesandtheatre))
                <span>Movies&Theatre,&nbsp;</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->music))
                <span>Music,&nbsp;</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->sports))
                <span>Sports,&nbsp;</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->unordinary))
                <span>Unordinary,&nbsp;</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->wanderer))
                <span>Wanderer,&nbsp;</span>
                @else
                 
                @endif
            </span>
        </span>
    </li>
</ul>
      
    </div>
    <div role="tabpanel" class="tab-pane fade" id="key"><ul class="ul-type-a">
    <li><span class="x-label">Submission</span><span class="x-content"><i class="fa fa-calendar-o"></i><span class="x-content-inner">{{Carbon\Carbon::parse($scoutview->applydatetime)->toDayDateTimeString()}} &nbsp;&nbsp;</span></span></li>
    <li><span class="x-label">Event</span><span class="x-content"><i class="fa fa-calendar-o"></i><span class="x-content-inner">{{Carbon\Carbon::parse($scoutview->scoutdatetime)->toDayDateTimeString()}}</span></span></li>
    <li><span class="x-label">Posted On</span><span class="x-content"><i class="fa fa-calendar-o"></i><span class="x-content-inner">{{Carbon\Carbon::parse($scoutview->created_at)->toDayDateTimeString()}}</span></span></li>
    
</ul>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="agree">
      

    
     <i class="fa fa-download"></i> Download Documents
      
    </div><!-- agree tab -->
  </div>

</div>
    <!-- end tabs -->
  
   

   
    
    </div>
 
		
     <script type="text/javascript">
            $("#CountDownTimer").TimeCircles
            ({ 

              time: 
              { 
                Days: 
                { 
                  show: false 
                }, 
                Hours: 
                { 
                  show: false 
                } 
              },
              circle_bg_color: "#f2f2f2",
              use_background: true,
            });
            
        </script> 
@stop