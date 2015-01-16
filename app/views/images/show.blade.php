@extends('master')

@section('title', 'imagegallery')

@section('content')
<div>
@foreach($pictures as $picture)

		
		{{ HTML::image($picture->picturename , 'profile picture', array('class' => 'img-thumbnail pull-left')) }}
	
		{{$picture->id}}<br>
		{{$picture->picturetitle}}<br>
		{{$picture->picturedescription}}
		
		{{ Form::model($picture, ['method' => 'DELETE', 'files' => true , 'route' => ['imagegallery.destroy',$picture->id]]) }}
		{{ Form::submit('delete it', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}

	
@endforeach
</div>

@stop