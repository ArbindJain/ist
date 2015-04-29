@extends('master')

@section('title', 'Profile')

@section('content')

<!-- ****** Display profile image,name and other suff ***** -->




<div class="row">
  <div class="col-md-8">
    <div class="header-text text-center">
      <h4>Filter performances based on category</h4>
    </div>
    <div class="filter-block text-center">
        <div>

            <input id="checkbox-1" class="checkbox-custom" name="art" type="checkbox" value="1" >
            <label for="checkbox-1" class="checkbox-custom-label">Art</label>
            
            <input id="checkbox-3" class="checkbox-custom" name="cooking" type="checkbox" value="1" >
            <label for="checkbox-3" class="checkbox-custom-label">Cooking</label>
            
            <input id="checkbox-4" class="checkbox-custom" name="dance" type="checkbox" value="1" >
            <label for="checkbox-4" class="checkbox-custom-label">Dance</label>
            
            <input id="checkbox-5" class="checkbox-custom" name="fashion" type="checkbox" value="1" >
            <label for="checkbox-5" class="checkbox-custom-label">Fashion</label>
            
            <input id="checkbox-6" class="checkbox-custom" name="moviesandtheatre" type="checkbox" value="1" >
            <label for="checkbox-6" class="checkbox-custom-label">Movies & Theatre</label>
        </div>
        <div style="margin-top:5px;">    
            <input id="checkbox-7" class="checkbox-custom" name="music" type="checkbox" value="1" >
            <label for="checkbox-7" class="checkbox-custom-label">Music</label>
            
            <input id="checkbox-8" class="checkbox-custom" name="sports" type="checkbox" value="1" >
            <label for="checkbox-8" class="checkbox-custom-label">Sports</label>
            
            <input id="checkbox-9" class="checkbox-custom" name="unordinary" type="checkbox" value="1" >
            <label for="checkbox-9" class="checkbox-custom-label">Unordinary</label>
            
            <input id="checkbox-10" class="checkbox-custom" name="wanderer" type="checkbox" value="1" >
            <label for="checkbox-10" class="checkbox-custom-label">Wanderer</label>
        </div>
    </div>
    <hr>
    <div class="performancelist">
    @foreach($performances as $performance)
      <div class="feed-container" style="margin-bottom: 20px;">
            <div class="feeduser_avatar">
            <a href="#">
              {{ HTML::image(Sentry::findUserById($performance->user_id)->profileimage , 'profile picture', array('class' => 'img-circle pull-left','id' => 'feediconsize')) }}
            </a>
            </div>
            <div class="feeduser_name">
              <a href="#">
                {{Sentry::findUserById($performance->user_id)->name}}
              </a>
            </div>
            <div class="feeduser_postedon">
              <p class="text-muted">&nbsp;
                {{$performance->created_at->diffForHumans()}}
              </p>
            </div>
      
      <div class="feed-block">
        <div class="feedtimeadd-block">
        <div class="feedtimer">
        <i class="fa fa-clock-o"></i> {{Carbon\Carbon::parse($performance->performancedatetime)->toDayDateTimeString()}}
        </div>
        <div class="feedvenue">
        <p>
        <i class="fa fa-map-marker"></i> &nbsp; {{$performance->venue}}
        </p>  
        </div>
        </div>
        <div class="feeddesc" >{{$performance->performancetext}} Live at ocean indian Live at ocean indian Live at ocean indian</div>
      </div> 
      </div> 
      

    @endforeach 
      </div>
    </div>
  </div>
  <div class="col-md-4">
    
  </div>
</div>





@stop