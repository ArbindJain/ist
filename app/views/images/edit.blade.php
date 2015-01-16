@extends('master')

@section('title', 'Edit')

@section('content')
	<h1>Edit Image Details</h1>

	@if (Session::has('flash_message'))
		<div class="form-group">
			<p style="padding: 5px" class="bg-success">{{ Session::get('flash_message') }}</p>
		</div>
	@endif
	{{ Form::model($pictures, ['method' => 'PATCH', 'files' => true , 'route' => ['imagegallery.update',$pictures->id]]) }}
    <div class="form-group">
        {{ Form::label('picturetitle', 'Title:') }}
        {{ Form::text('picturetitle', null, array('class' => 'form-control')) }}
        {{ errors_for('picturetitle', $errors) }}
    </div>

	<div class="form-group">
        {{ Form::label('picturedescription', 'Description:') }}
        {{ Form::text('picturedescription', null, array('class' => 'form-control')) }}
        {{ errors_for('picturedescription', $errors) }}
    </div>    

    {{ Form::submit('update', array('class' => 'btn btn-danger')) }}

{{ Form::close() }}

@stop