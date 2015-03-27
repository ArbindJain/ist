@extends('masterwitheditor')


@section('title', 'Blog')

@section('content')


<div class="row">
	<div class="col-md-12">
	<span class="album-block">
          <h3 class="pull-left"> <i class="fa fa-file-image-o"></i> Blog</h3>
        </span>
		{{ Form::open(['route' => 'blog.store' ]) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif
							
							<div class="form-group">
									<div class="helper-block">Post Title</div>
								{{ Form::text('title', null, ['placeholder' => 'Post Title', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('title', $errors) }}
							</div>

							<!-- post desc field -->
							<div class="form-group">

								<div class="helper-block">Post Description</div>
								<textarea name ="bodydesc" class="form-control" id="summernote"></textarea>
								{{ errors_for('bodydesc', $errors) }}
							</div>

												<!--  Field -->
							<div class="form-group">
								{{ Form::label('art', 'Art:') }}
								{{ Form::checkbox('art', '1') }}
								{{ Form::label('collection', 'Collection:') }}
								{{ Form::checkbox('collection', '1') }}
								{{ Form::label('cooking', 'Cooking:') }}
								{{ Form::checkbox('cooking', '1') }}
								{{ Form::label('dance', 'Dance:') }}
								{{ Form::checkbox('dance', '1') }}
								{{ Form::label('fashion', 'Fashion:') }}
								{{ Form::checkbox('fashion', '1') }}
								{{ Form::label('moviesandtheatre', 'Movies and theatre:') }}
								{{ Form::checkbox('moviesandtheatre', '1') }}
								{{ Form::label('music', 'Music:') }}
								{{ Form::checkbox('music', '1') }}
								{{ Form::label('sports', 'Sports:') }}
								{{ Form::checkbox('sports', '1') }}
								{{ Form::label('unordinary', 'Unordinary:') }}
								{{ Form::checkbox('unordinary', '1') }}
								{{ Form::label('wanderer', 'Wanderer:') }}
								{{ Form::checkbox('wanderer', '1') }}

							</div>
							<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('PUBLISH', ['class' => 'btn btn-md btn-default btn-block']) }}
							</div>



				    	</fieldset>
				      	{{ Form::close() }}

	</div>
            </div>
		



@stop