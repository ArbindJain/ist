@extends('master')

@section('title', 'Album')

@section('content')


		<div class="container">
	    <div class="row">
			<div class="col-md-6 col-md-offset-3">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Create an ALBUM</h3>
				 	</div>
				  	<div class="panel-body">
				    	{{ Form::open(['route' => 'album.store']) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif


							<!-- Album name field -->
							<div class="form-group">
								{{ Form::text('albumname', null, ['placeholder' => 'Album Name', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('albumname', $errors) }}
							</div>

							<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('Create a new album', ['class' => 'btn btn-md btn-danger btn-block']) }}
							</div>




				    	</fieldset>
				      	{{ Form::close() }}
				    </div>
				</div>
			</div>
		</div>
	</div>



@stop