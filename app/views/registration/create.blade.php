@extends('master')

@section('title', 'Register')

@section('content')
<style>
	.btn-circle {
  width: 80px;
  height: 80px;
  text-align: center;
  padding: 30px 0;
  font-size: 14px;
  line-height: 1.42;
  border-radius: 50%;
  font-weight: bold;
}
.btn-circle:hover{
	width: 84px;
	height: 84px;
	margin-bottom: 0px;

	transition: width 0.1s ease;
	transition: height 0.1s ease;


}


.btn-default {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}
.btn-default.active,
.btn-default.focus,
.btn-default:active,
.btn-default:focus,
.btn-default:hover,
.open>.dropdown-toggle.btn-default {
    color: #333;
    background-color: #fff;
    border: 5px solid #adadad;
    border-color: #adadad;
    transition: border 0.3s ease;
    
}
.into-text{

	display: block;
	font-size: 16px;
	margin-top: 40px;
	margin-bottom: 60px;
}
.outerbox-a{
	padding-left: 140px;
	
}
.outerbox-b{
	padding: 0px 80px;
}
.outerbox-c{
	padding-right: 140px;
}
.s-btn{
	margin-top: 20px;
	text-align: left;
	padding-left: 40px;
}
.form-stargroup{
	display: none;
}
.form-promotergroup{
	display: none;
}
.form-audiencegroup{
	display: none;
}
</style>

		<div class="container">
		<div class ="row signup-info">
			<div class="col-md-12 ">
			<div class="text-center into-text"><strong>What would you like to sign up as?</strong></div>
			<div class="col-md-4 text-center outerbox-a" >
				<span class="star-button " >
					<a href="#" class="btn btn-default form-handler btn-circle" data-usertype="star">Star</a>
					</span>
					<p class="s-btn">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
				
			</div>
			<div class="col-md-4 text-center outerbox-b">
				<span class="audience-button ">
					<a href="#" class="btn btn-default form-handler-a btn-circle" data-usertypea="audience">Audience</a><br>
					</span>
					<p class="s-btn">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
				
			</div>
			<div class="col-md-4 text-center outerbox-c">
				<span class="promoter-button ">
					<a href="#" class="btn btn-default form-handler-b btn-circle" data-usertypeb="promoter">Promoter</a>
					</span>
					<p class="s-btn">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
				
			</div>
			
				
				
				
			</div>
		</div>
	    <div class="row form-stargroup">
			<div class="col-md-6 col-md-offset-3">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">star Register</h3>
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

	<!-- ***************** Audience ************ ------- !-->
	<div class="row form-audiencegroup">
			<div class="col-md-6 col-md-offset-3">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Audience Register</h3>
				 	</div>
				  	<div class="panel-body">
				    	{{ Form::open(['route' => 'registration.store']) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif

							{{Form::hidden('group', 'Audiences')}}


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
	<!--  promoter form --------------------------------------!-->
	<div class="row form-promotergroup">
			<div class="col-md-6 col-md-offset-3">
	    		<div class="panel panel-default">
				  	<div class="panel-heading">
				    	<h3 class="panel-title">Promoter Register</h3>
				 	</div>
				  	<div class="panel-body">
				    	{{ Form::open(['route' => 'registration.store']) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif

							{{Form::hidden('group', 'Promoters')}}


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


<script type="text/javascript">
   
   
  $(document).ready( function(){
    $("body").on("click", ".form-handler", function() {
      var handle = $(this).data('usertype');
      
      if(handle == 'star'){
      	$('.signup-info').hide();
      	$('.form-stargroup').fadeIn();;
      }
      

    });
    $("body").on("click", ".form-handler-a", function() {
      var handle = $(this).data('usertypea');
      
      if(handle == 'audience'){
      	$('.signup-info').hide();
      	$('.form-audiencegroup').fadeIn();;
      }
      
      

    });
	$("body").on("click", ".form-handler-b", function() {
      var handle = $(this).data('usertypeb');
     
      if(handle == 'promoter'){
      	$('.signup-info').hide();
      	$('.form-promotergroup').fadeIn();
      }
      

    });  

   


  });
  

 
</script>
@stop