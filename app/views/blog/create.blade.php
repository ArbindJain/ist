@extends('masterwitheditor')

@section('title', 'Blog')

@section('content')


<div class="row">
	<div class="col-md-12">
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
							<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('SAVE DATA', ['class' => 'btn btn-md btn-default btn-block']) }}
							</div>



				    	</fieldset>
				      	{{ Form::close() }}

	</div>
            </div>
		



@stop