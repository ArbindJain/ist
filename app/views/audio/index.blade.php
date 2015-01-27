@extends('master')

@section('title', 'Audio')

@section('content')


		<div class="container">
	    <div class="row">
			<h1 style="color:green;" class="text-center"> Upload a Audio Track </h1>
			{{ Form::open(['route' => 'audiogallery.store','files' => 'true' ]) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif
							
							
							

							<div class="form-group">
							{{ Form::file('audiosrc') }}
							</div>

							<!-- Image title field -->
							<div class="form-group">
								{{ Form::text('audiotitle', null, ['placeholder' => 'Audio Title', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('audiotitle', $errors) }}
							</div>

							<!-- Image Description field -->
							<div class="form-group">
								{{ Form::text('audiodescription', null, ['placeholder' => 'Audio Description', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('audiodescription', $errors) }}
							</div>



							<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('Upload Track', ['class' => 'btn btn-md btn-success btn-block']) }}
							</div>



				    	</fieldset>
				      	{{ Form::close() }}
				      	
				      	


		</div>
		@foreach($audios as $audio)
		<div class="col-md-4">
			<audio controls>
  				<source src="{{$audio->audiosrc}}" type="audio/ogg">
  				<source src="{{$audio->audiosrc}}" type="audio/mpeg">
				Your browser does not support the audio element.
			</audio>
			<br>
<b>TITLE:</b>{{$audio->audiotitle}}<br>
<b>DES:</b>{{$audio->audiodescription}}<br>
	{{ link_to_route('audiogallery.show', 'Edit tilte', $audio->id, ['class' => 'btn btn-danger']) }}
	{{ Form::model($audio, ['method' => 'DELETE', 'files' => true , 'route' => ['audiogallery.destroy',$audio->id]]) }}
		{{ Form::submit('Delete', array('class' => 'btn btn-primary pull-left')) }}
		{{ Form::close() }}
		</div>
		@endforeach
	</div>



@stop