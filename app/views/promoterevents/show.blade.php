  @extends('master')

@section('title', '')

@section('content')
	<style>
.users-block{
	display: block;
	padding: 20px;
	background-color: #eae8e8;
	margin:5px;
}
	

</style>
<div class="row">
	<div class="col-md-12">
	Event Name : <c class="text-muted">{{$eventdata->eventname}}</c><br><br>
	{{ HTML::image($eventdata->poster , 'Event Poster', array('class' => 'img-responsive ')) }}<br>
	Event Location : <c class="text-muted">{{$eventdata->location}}</c><br>
	Event date : <c class="text-muted">{{Carbon\Carbon::parse($eventdata->eventdatetime)->toDayDateTimeString()}}</c><br>
	Event Duration : <c class="text-muted">{{$eventdata->eventduration}}</c><br>
	Event Details : <c class="text-muted">{{$eventdata->details}}</c><br>
	Hosted By :<c class="text-muted"> {{$eventdata->user->name}}</c><br>

	<a href="/events/{{$eventdata->id}}/edit" class="btn btn-success">edit</a>

	{{ Form::open(['route' => ['events.destroy', $eventdata->id], 'method' => 'delete']) }}
	  <button type="submit" class="btn btn-danger">Delete</button>
	{{ Form::close() }}
	</div>
		
</div>	

@stop