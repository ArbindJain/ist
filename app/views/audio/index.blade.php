@extends('master')

@section('title', 'Video')

@section('content')


		<div class="container">
	    <div class="row">
			<h1 style="color:green;" class="text-center"> Upload a Audio of your choice </h1>
			{{ Form::open(['route' => 'videogallery.store','files' => 'true' ]) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif
							
							
							

							<div class="form-group">
							{{ Form::file('videosrc') }}
							</div>

							<!-- Image title field -->
							<div class="form-group">
								{{ Form::text('videotitle', null, ['placeholder' => 'Video Title', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('videotitle', $errors) }}
							</div>

							<!-- Image Description field -->
							<div class="form-group">
								{{ Form::text('videodescription', null, ['placeholder' => 'Video Description', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('videodescription', $errors) }}
							</div>



							<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('Upload Video', ['class' => 'btn btn-md btn-success btn-block']) }}
							</div>



				    	</fieldset>
				      	{{ Form::close() }}
				      	
				      	


		</div>
	</div>



@stop