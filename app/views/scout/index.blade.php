 @extends('master')

@section('title', 'Profile')

@section('content')
<!-- ****** Display profile image,name and other suff ***** -->
<div class="row">
	<div class="col-md-8">
		@foreach($scouts as $scout)
                  <div class="col-md-4">
                  <span class="scoutevent">
                  <a href="/scoutpublished/{{$scout->id}}" class="scoutposterblock">
                    {{ HTML::image($scout->scoutposter , 'profile picture', array('class' => 'img-thumbnail pull-left')) }}
                    {{$scout->scouttitle}}
                  </a>
                  </span>
                    
                    
                  </div>

                  @endforeach	
	</div>
	<div class="col-md-4">
		
	</div>
</div>

@stop