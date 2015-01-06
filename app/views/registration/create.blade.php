@extends('master')

@section('title', 'Register')

@section('content')


		<div class="container">
	    <div class="row">
			<div class="col-md-6 col-md-offset-3">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Register</h3>
				 	</div>
				  	<div class="panel-body">
				    	{{ Form::open(['route' => 'registration.store']) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif

							{{Form::hidden('group', 'Stars')}}


							<!-- First name field -->
							<div class="form-group">
								{{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('name', $errors) }}
							</div>

				    	  	<!-- Email field -->
							<div class="form-group">
								{{ Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('email', $errors) }}
							</div>

							<!-- Password field -->
							<div class="form-group">
								{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('password', $errors) }}
							</div>

							<!-- Password Confirmation field -->
							<div class="form-group">
								{{ Form::password('password_confirmation', ['placeholder' => 'Password Confirm', 'class' => 'form-control', 'required' => 'required'])}}

							</div>

							<!-- First name field -->
							<div class="form-group">
								{{ Form::text('dob', null, ['placeholder' => 'DOB', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('dob', $errors) }}
							</div>

							<!-- terms and condition field -->
							<div class="form-group">

								{{ Form::checkbox('terms','1')}}
								<strong>I agree to the Itsshowtime.co.in <a target="_blank" id="TosLink" href="#">Terms of Service</a> and <a target="_blank" id="PrivacyLink" href="#">Privacy Policy</a></strong>
							</div>

							<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('Create Account', ['class' => 'btn btn-lg btn-primary btn-block']) }}
							</div>




				    	</fieldset>
				      	{{ Form::close() }}
				    </div>
				</div>

				<p style="text-align:center">Already have an account? <a href="/login">Login</a></p>

			</div>
		</div>
	</div>



@stop