          @if(Sentry::check())<!--- check wether loggged in or not  -->
          @if(is_null($followings))<!-- check wether is user is alreqady following or not -->
          @if($userprofile->id != Sentry::getuser()->id)<!-- check if logged user reaches to his own page-->
          
          {{ Form::open(array('route'=>'followuser' ,'id' => 'follow' ,'class'=>'add')) }} 
          {{Form::hidden('follow_id',$userprofile->id)}}
          <a class="attach"><i class="fa fa-star-o"></i> Follow </a>
          {{ Form::close()}}

          {{ Form::open(array('route' => 'unfollowuser','id'=> 'unfollow-mirror','class'=>'sub')) }}
          {{Form::hidden('userfollow_id',$userprofile->id)}}
          <a class="detach" ><i class="fa fa-star-o"></i> unFollow</a>
          {{ Form::close()}}
          @endif


         

          @else
           @if($userprofile->id != Sentry::getuser()->id)
          {{ Form::open(array('route' => 'unfollowuser','id'=> 'unfollow','class'=>'sub')) }}
          {{Form::hidden('userfollow_id',$userprofile->id)}}
          <a class="detach" ><i class="fa fa-star-o"></i> unFollow</a>
          {{ Form::close()}}

          {{ Form::open(array('route'=>'followuser' ,'id' => 'follow-mirror','class'=>'add')) }} 
          {{Form::hidden('follow_id',$userprofile->id)}}
          <a class="attach"><i class="fa fa-star-o"></i> Follow </a>
          {{ Form::close()}}
          
          @endif
          
        @endif
        @else 
        {
        Login to follow
        }

        @endif