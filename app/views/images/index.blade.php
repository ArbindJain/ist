@extends('master')

@section('title', 'About')

@section('content')


	<div class="container">
	<div class="col-md-12">
		<a href="/album/create" class="btn btn-lg btn-success pull-right">CREATE AN ALBUM</a>

	</div>
	
	<div class="row">

			<div class="col-md-6 col-md-offset-3">
			<h3>Create a gallery and insert image into it.</h3>
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">UPLOAD IMAGE TO GALLERY</h3>
				 	</div>
				  	<div class="panel-body">
				    	{{ Form::open(['route' => 'imagegallery.store']) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif
							Select any Album
							{{Form::select('album', $albums)}}
							

							<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('Upload Image', ['class' => 'btn btn-md btn-danger btn-block']) }}
							</div>




				    	</fieldset>
				      	{{ Form::close() }}
				    </div>
				</div>
			</div>
		</div>

	</div>


@stop