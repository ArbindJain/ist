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
          <a href="#"><i class="fa fa-comments" data-toggle="tooltip" data-placement="top" title="" data-original-title="Comments"></i> 30</a>
          <a href="#"><i class="fa fa-thumbs-o-up" data-toggle="tooltip" data-placement="top" title="" data-original-title="Loved"></i> 20</a>
    </span>
  </div>

  <div class="rights-block">
  <h3>Header</h3>
    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
  </div>
</div><!-- end of col-8 -->

<div class="col-md-8">


  <div class="scout-sidebar">
    <!-- titlebar -->
    <div class="title-bar ">
      <div class="text-capitalize tit-scout"><p>{{$scoutview->scouttitle}} Design a Limited Edition </p>
       
      </div>
      <div class="text-capitalize butt-scout">
         <button type="button" class="btn btn-default btn-lg pull-right text-uppercase" data-toggle="modal" data-target="#myModalapply">
          <i class="fa fa-plus"></i> Participate
        </button>
      </div>
      
    </div>

    <p class="lastdate-on"> <i class="fa fa-clock-o"></i> Submission</p>
    <!-- end of titlebar -->
    {{--*/ $created = new Carbon\Carbon($scoutview->scoutdatetime); /*--}}
  {{--*/ $now = Carbon\Carbon::now(); /*--}}

    <div id="CountDownTimer" data-timer="{{$created->diffInSeconds($now)}}" style="background-color:#fff;" ></div>
    <!-- below timer -->
    <div class="venue-block">
      <div class="address-scout">
      <p>  <i class="fa fa-map-marker"></i> {{$scoutview->venue}} 
      <b class="pull-right"><i class="fa fa-inr"></i> {{$scoutview->renumeration}}</b></p>
      </div>
    </div>
    <!-- end of belowtimer -->
    
  </div><!-- end of scout sidebar-->
  <!-- desc-bar -->
    <div class="desc-bar">
      <p>Event Details</p>
      <span>{{$scoutview->scoutdescription}}</span>
    </div>
    <!-- end if desc bar -->
     <!-- artist desc-bar -->
    <div class="desc-bar">
      <p> Artist Details</p>
      <span>{{$scoutview->artistdescription}}</span>
    </div>
    <!-- artist end desc bar -->
     <!-- artist desc-bar -->
    <div class="desc-bar">
      <p> Key Dates</p>
      <span class="eventdate"><c class="text-muted datee text-uppercase">Event Date <i class="fa fa-arrow-right"></i> </c> <b>{{Carbon\Carbon::parse($scoutview->scoutdatetime)->toDayDateTimeString()}}</b></span>
      <span class="eventdate1"><c class="text-muted datee text-uppercase">Last Submission Date <i class="fa fa-arrow-right"></i> </c> <b>{{Carbon\Carbon::parse($scoutview->scoutdatetime)->toDayDateTimeString()}}</b></span>
      <span class="eventdate1"><c class="text-muted datee text-uppercase">Posted Date <i class="fa fa-arrow-right"></i> </c> <b>{{Carbon\Carbon::parse($scoutview->created_at)->toDayDateTimeString()}}</b></span>
    
    </div>
    <!-- artist end desc bar -->
     <!-- cate desc-bar -->
    <div class="cate-bar">
      <p> Categories & Tags</p>
      <div class="tags">
      @if(isset(Sentry::findUserById($scoutview->user_id)->art))
                <span>Arts</span>

                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->collection))
                <span>Collection</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->cooking))
                <span>Cooking</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->dance))
                <span>Dance</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->fashion))
                <span>Fashion</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->moviesandtheatre))
                <span>Movies&Theatre</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->music))

                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->sports))
                <span>Sports</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->unordinary))
                <span>Unordinary</span>
                @else
                 
                @endif
                @if(isset(Sentry::findUserById($scoutview->user_id)->wanderer))
                <span>Wanderer</span>
                @else
                 
                @endif
        </div>
    </div>
    <!-- cate end desc bar -->
    <!-- agreement desc-bar -->
    <div class="cate-bar">
      <p> Agreements</p>
      <div class="tags">
     <i class="fa fa-download"></i> Download Documents
        </div>
    </div>
    <!-- cate end desc bar -->
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
              circle_bg_color: "#ffffff",
              use_background: true,
            });
            
        </script> 
@stop