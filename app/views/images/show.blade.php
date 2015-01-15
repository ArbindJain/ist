@extends('master')

@section('title', 'imagegallery')

@section('content')

@foreach($pictures as $picture)

		
		{{ HTML::image($picture->picturename , 'profile picture', array('class' => 'img-thumbnail pull-left')) }}
	
		
	
@endforeach

@stop