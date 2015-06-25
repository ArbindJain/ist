 @extends('master')

@section('title', 'Profile')

@section('content')

{{HTML::style('css/jquery.nstSlider.css')}}
{{HTML::style('css/bootstrap-switch.css')}}
<style type="text/css">
  .hid {
    display: none;
  }
</style>





                      
<div class="row">
            <div class="col-md-12">
                <div class="scout-search-block">
                <div class="block pull-left">
                  <a class="btn btn-md btn-default event">Event Type</a>
                <div class="hid eventhid" style="cursor:pointer";>
                  <input type="checkbox" id="mycheckbox" name="my-checkbox" selected>
                    <i class="fa fa-times close_event"></i>
                </div>
                </div>
                
                  <div class="search-button pull-right">
                    
                    {{ Form::open(['route' => 'scoutsearch','class'=>'form-inline' ]) }}
                    <!-- Album name field -->
                       <a class="filters text-capitalize pull-left "><i class="fa fa-filter"></i> &nbsp; Filter</a>
                     
                      {{ Form::text('term', null, ['placeholder' => 'search', 'class' => 'form-control', 'required' => 'required'])}}
                      {{ errors_for('term', $errors) }}
                    <!-- Submit field -->
                      {{ Form::submit('search ', ['class' => 'btn btn-md btn-default ']) }}
                    {{Form::close()}}
                  </div>
                </div><!-- search block end -->
                <div class="filter-scout-block hid" id="myContent">
                  {{ Form::open(['route' => 'scoutfilters','name'=>'filterform' ]) }}
                    <div class="col-sm-3 margin-left15 form-group " id="shape">
                      <label for="cate" class="control-label text-muted">Category</label>
                      <select class="form-control" name="category" id="cate">
                      <option value=""></option>
                        <option  value="dance">Dance</option>
                        <option  value="art">Art</option>
                        <option  value="music">Music</option>
                        <option  value="sports">Sports</option>
                        <option  value="fashion">Fashion</option>
                        <option  value="wanderer">Wanderer</option>
                        <option  value="cooking">Cooking</option>
                        <option  value="unordinary">Unordinary</option>
                        <option  value="moviesandtheatre">Movies & Theatre</option>
                      </select>
                    </div>

                    <div class="col-sm-3 margin-left15 form-group">
                      <label for="date" class="control-label text-muted">Date</label>
                      <select class="form-control" name="date" id="date">
                        <option value=""></option>
                        <option  value="thisweek">This Week</option>
                        <option  value="thismonth">This Month</option>
                      </select>
                    </div>
                    <div class="col-md-3 form-group">

                      <label  class="control-label text-muted">Budget -</label>&nbsp;&nbsp;<i class="fa fa-inr text-muted"></i>
                      <div class="leftLabel text-muted " style=" display:inline-block;" id="leftlb"></div>&nbsp; - &nbsp;<i class="fa fa-inr text-muted"></i>
                      <div class="rightLabel text-muted" style=" display:inline-block;" id="rightlb"></div>
                    
                      <div class="nstSlider" data-range_min="2000" data-range_max="12000" 
                       data-cur_min="10"    data-cur_max="40">
                        <div class="bar"></div>
                        <div class="leftGrip"></div>
                        <div class="rightGrip"></div>

                      </div>

                      </div><!-- search ranger bar  -->
                    
                    <div class="col-sm-2 margin-left15 form-group">
                      <label for="venue" class="control-label text-muted">Venue</label>
                      <select class="form-control" name="event" id="venue">
                        <option value=""></option>
                        <option  value="Bangalore">Bangalore</option>
                        <option  value="Kathmandu">Kathmandu</option>
                          </select>
                    </div>
                    <div class="col-sm-1  ">
                      {{ Form::submit('Filter ', ['class' => 'btn btn-default btn-block filterbutton ']) }}
                    </div>
                    {{Form::close()}}
                </div><!-- filter scout end --> 
                
            </div><!-- end of search and filter -->

<!-- start of temp data -->
            <div class ="col-md-12">
            <div id="content-scout">
            @foreach($scouts as $scout)
             @if(Sentry::findUserByID($scout->user_id)->inGroup(Sentry::findGroupByName('Promoters')))
                        {{--*/ $usergroupe = 'Chide'; /*--}}
                        {{--*/ $usergroup = 'Corporate'; /*--}}
                        @elseif(Sentry::findUserByID($scout->user_id)->inGroup(Sentry::findGroupByName('Stars')))
                        {{--*/ $usergroupe = 'Phide'; /*--}}
                        {{--*/ $usergroup = 'Private'; /*--}}
                        @endif

                  <div class="col-lg-4 col-md-4 {{$usergroupe}} {{$scout->city}}">
                        
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
                                    <h3><a href="{{url()}}/scoutpublished/{{$scout->id}}">{{ substr($scout->scouttitle, 0, 35) }}</a></h3>
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
            </div><!-- col-12 end -->
           
</div><!-- end of row  -->  
<script type="text/javascript">
$value = $( "#venue option:selected" ).text();
console.log('value');
</script>
<script type="text/javascript">
  $('.event').click(function(){
    $('.event').hide();
    $('.eventhid').show();

    return false;

  });
   $('.close_event').click(function(){
    $('.eventhid').hide();

    $('.event').show();
    $('.Phide').show();
    $('.Chide').show();
    
    return false;

  });
</script>

<script type="text/javascript">
 $('.filters').click(function() {
    $('#myContent').slideToggle(600,"linear");
    return false;
});
</script>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
{{HTML::script('js/jquery.nstSlider.min.js')}}
{{HTML::script('js/bootstrap-switch.js')}}
<script type="text/javascript">
$('.nstSlider').nstSlider({
    "crossable_handles": false,
    "left_grip_selector": ".leftGrip",
    "right_grip_selector": ".rightGrip",
    "value_bar_selector": ".bar",
    "value_changed_callback": function(cause, leftValue, rightValue) {
        $(this).parent().find('.leftLabel').text(leftValue);
        $(this).parent().find('.rightLabel').text(rightValue);
    }
});
</script>
<script type="text/javascript">
 // $("[name='my-checkbox']").bootstrapSwitch();
 // $("[name='my-checkbox']").on('switchChange.bootstrapSwitch', function(event, state) {
  //console.log(this); // DOM element
//  console.log(event); // jQuery event
 // console.log(state); // true | false
//});
/* $("[name='my-checkbox']").bootstrapSwitch();
if ($("[name='my-checkbox']").bootstrapSwitch('state')){
//event triggered on state true
console.log('on');
} else {
//event triggered on state false
console.log('off');
}*/
   $("#mycheckbox").bootstrapSwitch();

$("#mycheckbox").on("switchChange.bootstrapSwitch", function(event, state) {
    
    if(state == true){
      $('.Phide').hide();
      $('.Chide').show();
    }
    else{

      $('.Chide').hide();
      $('.Phide').show();
    }
});
</script>
 <script type="text/javascript">
   
   
  $(document).ready( function(){
  
  $('.filterbutton').click(function(e){

        e.preventDefault();
        var left = $('#leftlb').text();
        var right = $('#rightlb').text();
        // $('#shape').append('<input type="hidden" name="rightlabel" value="'+left+'">');
         //$('#shape').prepend('<input type="hidden" name="leftlabel" value="'+right+'">');
        $("form[name='filterform']").submit();
      });

        
    
  


  });
  

 
</script>   

@stop
