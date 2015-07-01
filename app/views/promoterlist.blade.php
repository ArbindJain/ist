@extends('master')

@section('title', 'promoter')

@section('content')




<div class="col-md-12">

@foreach($users as $user)
@if(Sentry::findUserByID($user->id)->inGroup(Sentry::findGroupByName('Promoters')))
    <div class="col-md-3">
      <div class="personal-info center-block">
      <a href="{{url()}}/user/{{$user->id}}">
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
    </div><!-- end of md3-->
    @else
    
    @endif
@endforeach
</div>




@stop