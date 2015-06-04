@extends('master')

@section('title', 'Profile')

@section('content')
<div class="col-md-12" id="corporatediv" class="cdiv" style=" padding-top: 24px;">
   @foreach($users as $user)
    <div class="col-md-3">
      <div class="personal-info center-block">
      <a href="{{url()}}/userprofile/{{$user->id}}?{{$user->name}}">
          {{HTML::image($user->profileimage,'avatar',array('class'=>'center img-circle search-avatar'))}}
         
          <p class="text-muted cityinfo text-center text-capitalize heff">
              @if(isset($user->city))
                {{$user->city}} &nbsp;
                  @if(isset($user->country))
                  {{$user->country}}
                  @endif
              @else
                &nbsp;
              @endif
          </p>

          <h3 class="text-center usernametext text-capitalize heff">{{$user->name}}</h3>
          <p class="text-center text-muted text-capitalize heff">
            @if(isset($user->title))
              {{$user->title}}
            @else
              &nbsp;
            @endif
           </p>

      </a>
       
      </div><!-- end of personalinfo -->
      <div class="personal-footer">
        <div class="footertext-btn">
          <h3>{{$user->rccount}}</h3>
          <p class="text-muted">Review</p>
        </div>
        <div class="footertext-btn">
          <h3>{{$user->frcount}}</h3>
          <p class="text-muted">Followers</p>
        </div>
        <div class="footertext-btn">
          <h3>{{$user->fgcount}}</h3>
          <p class="text-muted">Following</p>
        </div>
      </div>
    </div><!-- end of md3-->
@endforeach
</div>
@stop