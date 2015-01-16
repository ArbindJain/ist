@extends('master')

@section('title', 'imagegallery')

@section('content')

@foreach($pictures as $picture)
<div class="pull-left">
		
		{{ HTML::image($picture->picturename , 'profile picture', array('class' => 'img-thumbnail ')) }}
	<br>
		TITLE:{{$picture->picturetitle}}<br>
		Description: {{$picture->picturedescription}}
		
		{{ Form::model($picture, ['method' => 'DELETE', 'files' => true , 'route' => ['imagegallery.destroy',$picture->id]]) }}
		{{ Form::submit('Delete', array('class' => 'btn btn-danger pull-left')) }}
		{{ Form::close() }}
		{{ link_to_route('imagegallery.edit', 'Edit ', $picture->id, ['class' => 'btn btn-primary ']) }}

</div>

	
@endforeach


@stop