 @extends('master')

@section('title', 'Profile')

@section('content')

<!-- start of temp data -->

<div class="row">
  <div class="col-md-12">
            <div class ="col-md-8">
            <div id="content-scout">
            <div class="row">
            @foreach($scouts as $scout)
                  <div class="col-lg-6 col-md-6">
                        @if(Sentry::findUserByID($scout->user_id)->inGroup(Sentry::findGroupByName('Promoters')))
                        {{--*/ $usergroup = 'Corporate'; /*--}}
                        @elseif(Sentry::findUserByID($scout->user_id)->inGroup(Sentry::findGroupByName('Stars')))
                        {{--*/ $usergroup = 'Private'; /*--}}

                        @endif
                        <aside>
                              <div class="headerscout-block {{$usergroup}}">
                                <span class="posted-date">
                                  {{--*/ $created = new Carbon\Carbon($scout->scoutdatetime); /*--}}
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
                              <img src="{{url()}}/{{$scout->scoutposter}}" class="img-responsive">
                              
                              <div class="content-title">
                                    <div class="">
                                    <h3><a href="{{url()}}/scoutpublished/{{$scout->id}}">{{ $scout->scouttitle}}</a></h3>
                                    <h5><b>Renumeration:</b> {{$scout->renumeration}}</h5>
                                    <h5><b>Venue :</b> {{$scout->venue}}</h5>
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
                                          <a href="#"><i class="fa fa-comments" data-toggle="tooltip" data-placement="top" title="" data-original-title="Comments"></i> 30</a>
                                          <a href="#"><i class="fa fa-thumbs-o-up" data-toggle="tooltip" data-placement="top" title="" data-original-title="Loved"></i> 20</a>
                                    </span>
                              </div>
                        </aside>
                  </div>   
            @endforeach      
            </div>
            </div>     
            </div><!-- col-8 end -->
            <div class ="col-md-4">
                  <!-- start:sidebar -->
                              <div id="sidebar">
                                    <!-- start:widget recent post -->
                                    <div class="widget-sidebar">
                                          <h3 class="title-widget-sidebar text-uppercase">
                                                 Promoted Scout
                                          </h3>
                                          <div class="content-widget-sidebar">
                                                <ul>
                                                      
                                                </ul>
                                          </div>
                                    </div>
                                    <!-- end:widget recent post -->
                                    
                                    <!-- start:categories -->
                                    <div class="widget-sidebar">
                                          <h3 class="title-widget-sidebar">
                                                CATEGORIES
                                          </h3>
                                          <div class="content-widget-sidebar">
                                                <ul>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Dance</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Art</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Music</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Sports</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Fashion</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Wanderer</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Cooking</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Unordinary</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Movies and Theatre</h5>
                                                            </a>
                                                      </li>
                                                </ul>
                                          </div>
                                    </div>
                                    <!-- end:categories -->
                                   
                                    
                              </div>
                              <!-- end:sidebar -->
            </div>
      </div>
</div>
    



@stop
<!-- end of data

@stop