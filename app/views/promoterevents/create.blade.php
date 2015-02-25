  @extends('master')

@section('title', 'PromoterEvents')

@section('content')

    


<div class="row">
	<h1>Create Event </h1>
				    	{{ Form::open(['route' => 'events.store','files' => 'true' ]) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif



							<!-- Event name field -->
							<div class="form-group">
								{{ Form::text('eventname', null, ['placeholder' => 'Event Name', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('eventname', $errors) }}
							</div>

				    	  	<!-- Event Date and Time field -->
							<div class="form-group">
								<div class='input-group date' id='datetimepicker1'>
				                    <input type="datetime" name="eventdatetime" class="form-control"  />
				                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
				                    </span>
                				</div>
                			{{ errors_for('eventdatetime', $errors) }}
								
							</div>

							
							
							<!-- Event Duration  field -->
							<div class="form-group">
								{{ Form::text('eventduration', null, ['placeholder' => 'Event Duration', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('eventduration', $errors) }}
							</div>

							<!-- Event Duration  field -->
							<div class="form-group">
								{{ Form::text('location', null, ['placeholder' => 'location', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('location', $errors) }}
							</div>
	
							<!-- Event Duration  field -->
							<div class="form-group">
								{{ Form::textarea('details', null, ['placeholder' => 'Details', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('details', $errors) }}
							</div>
							


							
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

							<!-- Poster image field -->
							<div class="form-group">
								{{ Form::file('posterimage') }}
							</div>

							<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('Create Account', ['class' => 'btn btn-lg btn-primary btn-block']) }}
							</div>

				    	</fieldset>
				      	{{ Form::close() }}
				 
</div>
		



@stop