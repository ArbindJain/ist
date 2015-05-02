@extends('master')

@section('title', 'Edit Profile')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="form-box">
			@if (Session::has('flash_message'))
		<div class="form-group">
			<p style="padding: 5px" class="bg-success">{{ Session::get('flash_message') }}</p>
		</div>
	@endif

				{{ Form::model($user, ['method' => 'PATCH', 'files' => true , 'route' => ['profiles.update', $user->id]]) }}

		<!-- name Field -->
		<div class="form-group col-md-6">
			{{ Form::label('name', 'Name',['class' => 'text-capitalize text-muted']) }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}
				{{ errors_for('name', $errors) }}
		</div>

		<!-- email Field -->
		<div class="form-group col-md-6">
			{{ Form::label('email', 'Email',['class' => 'text-capitalize text-muted']) }}
			{{ Form::email('email', null, ['class' => 'form-control']) }}
			{{ errors_for('email', $errors) }}
		</div>

		<!-- Title Field -->
		<div class="form-group col-md-4">
			{{ Form::label('title', 'Title',['class' => 'text-capitalize text-muted']) }}
			{{ Form::text('title', null, ['class' => 'form-control']) }}
			{{ errors_for('title', $errors) }}
		</div>

		<!-- Title Field -->
		<div class="form-group col-md-4">
			{{ Form::label('title', 'Title',['class' => 'text-capitalize text-muted']) }}
			{{ Form::text('title', null, ['class' => 'form-control']) }}
			{{ errors_for('title', $errors) }}
		</div>

		<!-- Title Field -->
		<div class="form-group col-md-4">
			{{ Form::label('title', 'Title',['class' => 'text-capitalize text-muted']) }}
			{{ Form::text('title', null, ['class' => 'form-control']) }}
			{{ errors_for('title', $errors) }}
		</div>

		<!-- DOB Field -->
		<div class="form-group col-md-4">
			{{ Form::label('dob', 'DOB',['class' => 'text-capitalize text-muted']) }}
			{{ Form::text('dob', null, ['class' => 'form-control']) }}
			{{ errors_for('dob', $errors) }}
		</div>

		<!-- Gender Field -->
	<!--	<div class="form-group col-md-12">
			{{ Form::label('gender', 'Gender',['class' => 'text-capitalize text-muted']) }}
			{{ Form::select('gender',['male','female']) }}
			{{ errors_for('gender', $errors) }}
		</div>-->
		<div class="col-sm-4 form-group">
											<label for="gendera" class="control-label text-muted">Gender</label>
											<select class="form-control" name="gender" id="gendera">
												<option checked="{{$user->gender}}" value="Male">Male</option>
												<option checked="{{$user->gender}}" value="Female">Female</option>
											</select>
										</div>

		
		<!-- contact Field -->
		<div class="form-group col-md-4">
			{{ Form::label('contact', 'Contact',['class' => 'text-capitalize text-muted']) }}
			{{ Form::text('contact', null, ['class' => 'form-control']) }}
			{{ errors_for('contact', $errors) }}
		</div>
		<!-- addrsss Field -->
		<div class="form-group col-md-12">
			{{ Form::label('address', 'Address',['class' => 'text-capitalize text-muted']) }}
			{{ Form::text('address', null, ['class' => 'form-control']) }}
			{{ errors_for('address', $errors) }}
		</div>
		<!-- city Field -->
		<div class="form-group col-md-6">
			{{ Form::label('city', 'City',['class' => 'text-capitalize text-muted']) }}
			{{ Form::text('city', null, ['class' => 'form-control']) }}
			{{ errors_for('city', $errors) }}
		</div>

		<!-- country Field -->
		<div class="form-group col-md-6">
			{{ Form::label('country', 'Country',['class' => 'text-capitalize text-muted']) }}
			{{ Form::text('country', null, ['class' => 'form-control']) }}
			{{ errors_for('country', $errors) }}
		</div>
		
		<div class="col-md-12 form-group">
							<label for="checkbox-2" class="control-label text-capitalize text-muted">Category</label>
								<div class="has-feedback">
									<input id="checkbox-2" class="checkbox-custom" name="art" type="checkbox" value="1" >
						            <label for="checkbox-2" class="checkbox-custom-label">Art</label>
						            
						            <input id="checkbox-3" class="checkbox-custom" name="cooking" type="checkbox" value="1" >
						            <label for="checkbox-3" class="checkbox-custom-label">Cooking</label>
						            
						            <input id="checkbox-4" class="checkbox-custom" name="dance" type="checkbox" value="1" >
						            <label for="checkbox-4" class="checkbox-custom-label">Dance</label>
						            
						            <input id="checkbox-5" class="checkbox-custom" name="fashion" type="checkbox" value="1" >
						            <label for="checkbox-5" class="checkbox-custom-label">Fashion</label>
						            
						            <input id="checkbox-6" class="checkbox-custom" name="moviesandtheatre" type="checkbox" value="1" >
						            <label for="checkbox-6" class="checkbox-custom-label">Movies & Theatre</label>
						           
						            <input id="checkbox-7" class="checkbox-custom" name="music" type="checkbox" value="1" >
						            <label for="checkbox-7" class="checkbox-custom-label">Music</label>
						            
						            <input id="checkbox-8" class="checkbox-custom" name="sports" type="checkbox" value="1" >
						            <label for="checkbox-8" class="checkbox-custom-label">Sports</label>
						            
						            <input id="checkbox-9" class="checkbox-custom" name="unordinary" type="checkbox" value="1" >
						            <label for="checkbox-9" class="checkbox-custom-label">Unordinary</label>
						            
						            <input id="checkbox-10" class="checkbox-custom" name="wanderer" type="checkbox" value="1" >
						            <label for="checkbox-10" class="checkbox-custom-label">Wanderer</label>
								</div>
							</div>
		<!--  Field -->
		<!--<div class="form-group col-md-12">
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

		</div>-->


		

		<!-- Password field -->
		<div class="form-group col-md-12">
			{{ Form::label('password', 'Password',['class' => 'text-capitalize text-muted']) }}
			{{ Form::password('password', ['class' => 'form-control']) }}
			<p class="help-block">Leave password blank to NOT edit the password.</p>
			{{ errors_for('password', $errors) }}
		</div>

		<!-- Password Confirmation field -->
		<div class="form-group col-md-12">
			{{ Form::label('password_confirmation', 'Repeat Password',['class' => 'text-capitalize text-muted']) }}
			{{ Form::password('password_confirmation', ['class' => 'form-control'] )}}
		</div>

		<!-- profile image field -->
		<div class="form-group col-md-12">
			{{ Form::file('profileimage') }}
		</div>



		<!-- Update Profile Field -->
		<div class="form-group col-md-12">
			{{ Form::submit('Update Profile', ['class' => 'btn btn-primary']) }}
		</div>
	{{ Form::close() }}	
			</div>	
		</div>
	</div>

	
	

@stop