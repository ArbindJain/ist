 @extends('master')

@section('title', 'PromoterEvents')

@section('content')
<style type="text/css">
.text-data {
	display: block;
	background-color: #e3f7f4;
	padding: 4px 4px;
}

	

</style>

<div class="row">
	<div class="col-md-12">

		{{HTML::link('events/create','Create a Event' , array('class' => 'btn btn-sm btn-primary'))}}
    </div>
</div>	
<br>
<div class="col-md-12">
@foreach($events as $event)
 <div class="col-md-3">
 	<a href="events/{{$event->id}}">{{ HTML::image($event->poster , 'profile picture', array('class' => 'img-responsive ')) }}
  <span class="text-data">
  	Event : <c class="text-muted">{{$event->eventname}}</c><br>
  	Location :  <c class="text-muted">{{$event->location}}</c><br>
  	<!-- use of carbon -->
  	Time : <c class="text-muted">{{Carbon\Carbon::parse($event->eventdatetime)->toDayDateTimeString()}}</c>

  </span>
  </a>
 </div>

@endforeach
	
</div>


@stop