@extends('master')

@section('title','edit video')

@section('content')


<h1>Edit Video Details</h1>

	@if (Session::has('flash_message'))
		<div class="form-group">
			<p style="padding: 5px" class="bg-success">{{ Session::get('flash_message') }}</p>
		</div>
	@endif
	{{ Form::model($vidsnap, ['method' => 'PATCH', 'files' => true , 'route' => ['videogallery.update',$vidsnap->id]]) }}
    <div class="form-group">
        {{ Form::label('videotitle', 'Title:') }}
        {{ Form::text('videotitle', null, array('class' => 'form-control')) }}
        {{ errors_for('videotitle', $errors) }}
    </div>

	<div class="form-group">
        {{ Form::label('videodescription', 'Description:') }}
        {{ Form::text('videodescription', null, array('class' => 'form-control')) }}
        {{ errors_for('videodescription', $errors) }}
    </div>    

    {{ Form::submit('update', array('class' => 'btn btn-danger')) }}

{{ Form::close() }}

@stop