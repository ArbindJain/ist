@extends('master')

@section('title', 'Audio')

@section('content')


		<h1>Edit Audio Details</h1>

	@if (Session::has('flash_message'))
		<div class="form-group">
			<p style="padding: 5px" class="bg-success">{{ Session::get('flash_message') }}</p>
		</div>
	@endif
	{{ Form::model($audtrack, ['method' => 'PATCH', 'files' => true , 'route' => ['audiogallery.update',$audtrack->id]]) }}
    <div class="form-group">
        {{ Form::label('audiotitle', 'Title:') }}
        {{ Form::text('audiotitle', null, array('class' => 'form-control')) }}
        {{ errors_for('audiotit', $errors) }}
    </div>

	<div class="form-group">
        {{ Form::label('audiodescription', 'Description:') }}
        {{ Form::text('audiodescription', null, array('class' => 'form-control')) }}
        {{ errors_for('audiodescription', $errors) }}
    </div>    

    {{ Form::submit('update', array('class' => 'btn btn-danger')) }}

{{ Form::close() }}



@stop