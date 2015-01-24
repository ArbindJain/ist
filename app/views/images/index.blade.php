@extends('master')

@section('title', 'About')

@section('content')


	<div class="container">
	<div class="col-md-12">
		<a href="/album/create" class="btn btn-lg btn-success pull-right">CREATE AN ALBUM</a>


	</div>
	<div class="row">

			<div class="col-md-6 col-md-offset-3">
			<hr>
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">UPLOAD IMAGE TO GALLERY</h3>
				 	</div>
				  	<div class="panel-body">
				    	{{ Form::open(['route' => 'imagegallery.store','files' => 'true' ]) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif
							
							
							<!-- Album name field -->
							<div class="form-group">
								Select any Album
								{{Form::select('album', $albums)}}
							</div>

							<div class="form-group">
							{{ Form::file('picturename') }}
							</div>

							<!-- Image title field -->
							<div class="form-group">
								{{ Form::text('picturetitle', null, ['placeholder' => 'Picture Title', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('picturetitle', $errors) }}
							</div>

							<!-- Image Description field -->
							<div class="form-group">
								{{ Form::text('picturedescription', null, ['placeholder' => 'Picture Description', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('picturedescription', $errors) }}
							</div>



							<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('Upload Image', ['class' => 'btn btn-md btn-success btn-block']) }}
							</div>



				    	</fieldset>
				      	{{ Form::close() }}
				    </div>
				</div>
			</div>
		</div>
		@foreach($albumss as $album)

<div class="col-md-2">
	{{ link_to_route('imagegallery.show', $album->albumname, $album->id, ['class' => 'btn btn-danger']) }}
	{{ Form::model($album, ['method' => 'DELETE', 'files' => true , 'route' => ['album.destroy',$album->id]]) }}
		{{ Form::submit('Delete', array('class' => 'btn btn-primary pull-left')) }}
		{{ Form::close() }}</div>
		
		
	
@endforeach

	</div>


@stop