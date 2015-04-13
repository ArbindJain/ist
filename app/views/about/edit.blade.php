@extends('master')

@section('title', 'Edit Profile')

@section('content')
	<h1>Edit Profile</h1>

	@if (Session::has('flash_message'))
		<div class="form-group">
			<p style="padding: 5px" class="bg-success">{{ Session::get('flash_message') }}</p>
		</div>
	@endif
	{{ Form::model($about, ['method' => 'PATCH', 'files' => true , 'route' => ['about.update',Sentry::getUser()->id]]) }}
    <div class="form-group">
        {{ Form::label('about_us', 'About:') }}
        {{ Form::text('about_us', null, array('class' => 'form-control')) }}
        {{ errors_for('about_us', $errors) }}
    </div>

    <div class="form-group">
        {{ Form::label('education', 'Education:') }}
        {{ Form::text('education', null, array('class' => 'form-control')) }}
        {{ errors_for('education', $errors) }}
    </div>

	<div class="form-group">

        {{ Form::label('video', 'Intro Video') }}
    	{{ Form::file('video') }}
    </div>    


    

    {{ Form::submit('update about!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop