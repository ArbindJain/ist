@extends('master')

@section('title', 'Profile')

@section('content')

<!-- ****** Display profile image,name and other suff ***** -->




<div class="row">
  <div class="col-md-4 ">
    
             <div id="content-scout" class="alls">
             @if(Sentry::findUserByID($scout->user_id)->inGroup(Sentry::findGroupByName('Promoters')))
                        {{--*/ $usergroupe = 'Chide'; /*--}}
                        {{--*/ $usergroup = 'Corporate'; /*--}}
                        @elseif(Sentry::findUserByID($scout->user_id)->inGroup(Sentry::findGroupByName('Stars')))
                        {{--*/ $usergroupe = 'Phide'; /*--}}
                        {{--*/ $usergroup = 'Private'; /*--}}
                        @endif

                  <div class=" {{$usergroupe}} {{$scout->city}}">
                        
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
                              <a href="{{url()}}/scoutpublished/{{$scout->id}}">
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
            </div> 
  </div><!-- end col 4 -->
  <div class="col-md-8 ">
    <div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-pills" role="tablist">
    <li role="presentation" class="active"><a href="#applied" aria-controls="applied" role="tab" data-toggle="tab">Applicants</a></li>
    <li role="presentation"><a href="#shortlisted" aria-controls="shortlisted" role="tab" data-toggle="tab">Shortlisted</a></li>
    <li role="presentation"><a href="#selected" aria-controls="selected" role="tab" data-toggle="tab">Selected</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content" style="margin-left: 0px; margin-right: 30px;">
    <div role="tabpanel" class="tab-pane fade in active" id="applied">
      @foreach($applicantscout as $applicants)
               
<div class="col-md-6">

  <a href="" data-toggle="modal" data-target="#myModal-{{$applicants->id}}" class="scoutposterblock">
                <div class="connect-block">
                    <div class="connect-header">
                      <img src ="{{url()}}/{{Sentry::findUserById($applicants->user_id)->profileimage}}" class="img-circle ">
                      <div class="connect-info-block"> 
                        <div class="connect-name text-capitalize">{{Sentry::findUserById($applicants->user_id)->name}}</div>
                        <div class="connect-title text-muted">
                            {{Sentry::findUserById($applicants->user_id)->titlea}}&nbsp;
                            {{Sentry::findUserById($applicants->user_id)->titleb}}&nbsp;
                            {{Sentry::findUserById($applicants->user_id)->titlec}}&nbsp;
                        </div>
                      </div>
                      <div class="connect-date text-muted">{{$applicants->created_at->diffForHumans()}}</div>
                      <div class="connect-footer" style="width: 100%;">

                      <div class="connect-text  pull-right" style="font-size: 14px; width:100%; padding-left: 5px;">
                      @if(isset($check_shorlisted))
                       <c class="pull-left" style="padding-right: 0px;"> status: <c class="" style="color:#D91E18; font-size: 12px;">review</c></c>
                      @elseif(isset($check_selected))
                       <c class="pull-left" style="padding-right: 0px;"> status: <c class="" style="color:#00B16A; font-size: 12px;">selcted</c></c>
                      @else
                       <c class="pull-left" style="padding-right: 0px;"> status: <c class="" style="color:#f18c1c; font-size: 12px;">shortlisted</c></c>
                      @endif
                       <c class="pull-right" style="padding-right: 8px;"> Applicants <i class="fa fa-check-circle-o" style="color:#D91E18;"></i></c>
                      </div>

                    </div> <!-- connect footer block -->  
                    </div><!-- connect header block --> 
                </div> 
                </a>
            </div><!-- md- 6 -->
<!-- Modal -->
<div class="modal fade" id="myModal-{{$applicants->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       
      <div class="modal-body" style="height: 300px; background-color: #e5e5e5;">
      <div class="col-md-2">
        <div class="pop-img">{{ HTML::image(Sentry::findUserById($applicants->user_id)->profileimage , 'profile picture', array('class' => 'img-circle pull-left scoutuserimg-size')) }}
     </div>
     <div class="pop-username text-capitalize">{{Sentry::findUserById($applicants->user_id)->name}}</div>
      <div class="pop-title text-capitalize">
      {{Sentry::findUserById($applicants->user_id)->titlea}}
      {{Sentry::findUserById($applicants->user_id)->titleb}}
      {{Sentry::findUserById($applicants->user_id)->titlec}}
      </div>
      </div>
      <div class="col-md-10">
        <ul class="pop-button nav nav-pills ">
        <li class="pull-right">

        @if(!isset($check_shortlisted))
          {{ Form::model($applicants, ['method' => 'PUT', 'route' => ['scoutpublishedapply.update',$applicants->id]]) }}         
          {{ Form::hidden('shortlist', '1') }}
          {{ Form::hidden('selected', 'NULL') }}
          {{ Form::submit('shortlist', ['class' => 'btn']) }}
          {{ Form::close() }}</li>
        @endif
        @if(!isset($check_selected))
        <li class="pull-right">  
        {{ Form::model($applicants, ['method' => 'PUT', 'route' => ['scoutpublishedapply.update',$applicants->id]]) }}         
          {{ Form::hidden('shortlist', 'NULL') }}
          {{ Form::hidden('selected', '1') }}
          {{ Form::submit('select', ['class' => 'btn ']) }}
          {{ Form::close() }}</li>
       @endif 

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
    <div role="tabpanel" class="tab-pane fade" id="shortlisted">
    @foreach($shortlistscout as $shota)
      @foreach($shota->shlisted as $shotalist)
        <div class="col-md-6">
        <div class="connect-block">
                    <div class="connect-header">
                      <img src ="{{url()}}/{{Sentry::findUserById($shotalist->user_id)->profileimage}}" class="img-circle ">
                      <div class="connect-info-block"> 
                        <div class="connect-name text-capitalize">{{Sentry::findUserById($shotalist->user_id)->name}}</div>
                        <div class="connect-title text-muted">
                            {{Sentry::findUserById($shotalist->user_id)->titlea}}&nbsp;
                            {{Sentry::findUserById($shotalist->user_id)->titleb}}&nbsp;
                            {{Sentry::findUserById($shotalist->user_id)->titlec}}&nbsp;
                        </div>
                      </div>
                      <div class="connect-date text-muted">{{$shotalist->created_at->diffForHumans()}}</div>
                      <div class="connect-footer" style="width: 100%;">

                      <div class="connect-text  pull-right" style="font-size: 14px;">


                       <c class="pull-right" style="padding-right: 8px;"> Shortlisted <i class="fa fa-check-circle-o" style="color:#f18c1c;"></i></c>
                      </div>

                    </div> <!-- connect footer block --> 
                    </div><!-- connect header block --> 
                </div>

        </div>
        
      @endforeach
    @endforeach

    </div>
    <div role="tabpanel" class="tab-pane fade" id="selected">
       @foreach($selectedscout as $selecteduser)
                  @foreach($selecteduser->selectlist as $selectedmr)
                    <div class="col-md-6">
        <div class="connect-block">
                    <div class="connect-header">
                      <img src ="{{url()}}/{{Sentry::findUserById($selectedmr->user_id)->profileimage}}" class="img-circle ">
                      <div class="connect-info-block"> 
                        <div class="connect-name text-capitalize">{{Sentry::findUserById($selectedmr->user_id)->name}}</div>
                        <div class="connect-title text-muted">
                            {{Sentry::findUserById($selectedmr->user_id)->titlea}}&nbsp;
                            {{Sentry::findUserById($selectedmr->user_id)->titleb}}&nbsp;
                            {{Sentry::findUserById($selectedmr->user_id)->titlec}}&nbsp;
                        </div>
                      </div>
                      <div class="connect-date text-muted">{{$selectedmr->created_at->diffForHumans()}}</div>
                      <div class="connect-footer" style="width: 100%;">

                      <div class="connect-text  pull-right" style="font-size: 14px;">


                       <c class="pull-right" style="padding-right: 8px;"> Selected <i class="fa fa-check-circle-o" style="color:#00B16A;"></i></c>
                      </div>

                    </div> <!-- connect footer block --> 
                    </div><!-- connect header block --> 
                </div>

        </div> 
                  @endforeach
                @endforeach
    </div>
  </div>

</div>
  </div><!-- end col 8 -->
</div><!-- end row -->



            
@stop