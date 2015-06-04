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


.btn-primary {
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}
.btn-primary.active,
.btn-primary.focus,
.btn-primary:active,
.btn-primary:focus,
.btn-primary:hover,
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

.orange-circle-button {
	box-shadow: 2px 4px 0 2px rgba(0,0,0,0.1);
	border: .5em solid #E84D0E;
	font-size: 1em;
	line-height: 1.1em;
	color: #ffffff;
	background-color: #e84d0e;
	margin: auto;
	border-radius: 50%;
	height: 7em;
	width: 7em;
	position: relative;
}
.orange-circle-button:hover {
	color:#ffffff;
    background-color: #e84d0e;
	text-decoration: none;
	border-color: #ff7536;
	
}
.orange-circle-button:visited {
	color:#ffffff;
    background-color: #e84d0e;
	text-decoration: none;
	
}
.orange-circle-link-greater-than {
    font-size: 1em;
}
</style>

		<div class="container">
		<div class ="row signup-info">
			<div class="col-md-12 ">
			<div class="text-center into-text"><strong>What would you like to sign up as?</strong></div>
			<div class="col-md-4 text-center outerbox-a" >
				<!--<span class="star-button " >
					<a href="#" class="btn btn-default form-handler btn-circle" data-usertype="star">Star</a>
					</span>-->
					<button class="btn btn-default orange-circle-button form-handler" data-usertype="star" href="">star</button>
	
					<p class="s-btn">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
				
			</div>
			<div class="col-md-4 text-center outerbox-b">
				<!--<span class="audience-button ">
					<a href="#" class="btn btn-default form-handler-a btn-circle" data-usertypea="audience">Audience</a><br>
					</span>-->
					<button class="btn btn-default orange-circle-button form-handler-a" data-usertypea="audience" href="">Audience</button>
	
					<p class="s-btn">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
				
			</div>
			<div class="col-md-4 text-center outerbox-c">
				<!--<span class="promoter-button ">
					<a href="#" class="btn btn-default form-handler-b btn-circle" data-usertypeb="promoter">Promoter</a>
					</span>-->
					<button class="btn btn-default orange-circle-button form-handler-b" data-usertypeb="promoter" href="">Promoter</button>
	
					<p class="s-btn">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
				
			</div>
			
				
				
				
			</div>
		</div>
	    <div class="row form-stargroup">
			<div class="col-md-6 col-md-offset-3">
				<div class="form-box">
					{{ Form::open(['route' => 'registration.store']) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif

							{{Form::hidden('group', 'Stars')}}
							<!-- First name field -->
							<div class="col-md-8 form-group">
								<label for="username" class="control-label text-capitalize text-muted">Name</label>
								<div class="has-feedback">
									{{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'id' => 'username', 'required' => 'required'])}}
									{{ errors_for('name', $errors) }}
								</div>
							</div>
							<!-- gender field -->
							<div class="col-sm-4 form-group">
											<label for="gendera" class="control-label text-muted">Gender</label>
											<select class="form-control" name="gender" id="gendera">
												<option value="Male">Male</option>
												<option value="Female">Female</option>
												<option value="Pangender">Pangender</option>
											</select>
										</div>
							<!-- dob field -->
							<div class="col-md-12 form-group">
								<label for="dob" class="control-label text-capitalize text-muted">Dob</label>
								<!--<div class="has-feedback">
									{{ Form::text('dob',null, ['placeholder' => 'DOB', 'class' => 'form-control', 'id' => 'dob', 'required' => 'required'])}}
									{{ errors_for('dob', $errors) }}
								</div>-->
								<div class="row">
											<div class="col-sm-4">
												<select class="form-control" name="day" id="day">
													<option value="0">Day</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
													<option value="13">13</option>
													<option value="14">14</option>
													<option value="15">15</option>
													<option value="16">16</option>
													<option value="17">17</option>
													<option value="18">18</option>
													<option value="19">19</option>
													<option value="20">20</option>
													<option value="21">21</option>
													<option value="22">22</option>
													<option value="23">23</option>
													<option value="24">24</option>
													<option value="25">25</option>
													<option value="26">26</option>
													<option value="27">27</option>
													<option value="28">28</option>
													<option value="29">29</option>
													<option value="30">30</option>
													<option value="31">31</option>
												</select>
											</div>
											
											<div class="col-sm-4">
												<select class="form-control" name="month" id="month">
													<option value="0">Month</option>
													<option value="Jan">January</option>
													<option value="Feb">February</option>
													<option value="Mar">March</option>
													<option value="Apr">April</option>
													<option value="May">May</option>
													<option value="June">June</option>
													<option value="July">July</option>
													<option value="Aug">August</option>
													<option value="Sep">September</option>
													<option value="Oct">October</option>
													<option value="Nov">November</option>
													<option value="Dec">December</option>
												</select>
											</div>
											
											<div class="col-sm-4">
												<select class="form-control" name="year" id="year">
													<option value="0">Year</option>
													<option value="2000">2000</option>
													<option value="1999">1999</option>
													<option value="1998">1998</option>
													<option value="1997">1997</option>
													<option value="1996">1996</option>
													<option value="1995">1995</option>
													<option value="1994">1994</option>
													<option value="1993">1993</option>
													<option value="1992">1992</option>
													<option value="1991">1991</option>
													<option value="1990">1990</option>
													<option value="1989">1989</option>
													<option value="1988">1988</option>
													<option value="1987">1987</option>
													<option value="1986">1986</option>
													<option value="1985">1985</option>
													<option value="1984">1984</option>
													<option value="1983">1983</option>
													<option value="1982">1982</option>
													<option value="1981">1981</option>
													<option value="1980">1980</option>
													<option value="1979">1979</option>
													<option value="1978">1978</option>
													<option value="1977">1977</option>
													<option value="1976">1976</option>
													<option value="1975">1975</option>
													<option value="1974">1974</option>
													<option value="1973">1973</option>
													<option value="1972">1972</option>
													<option value="1971">1971</option>
													<option value="1970">1970</option>
												</select>
											</div>
										</div>
							</div>
							<!-- Email field -->
							<div class="col-md-12 form-group">
								<label for="email" class="control-label text-capitalize text-muted">email</label>
								<div class="has-feedback">
									{{ Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'id' => 'email','required' => 'required'])}}
									{{ errors_for('email', $errors) }}
								</div>
							</div>
							<!-- Password field -->
							<div class="col-md-6 form-group">
								<label for="password" class="control-label text-capitalize text-muted">password</label>
								<div class="has-feedback">
									{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'id' => 'password', 'required' => 'required'])}}
									{{ errors_for('password', $errors) }}
								</div>
							</div>
							<!-- confirm Password field -->
							<div class="col-md-6 form-group">
								<label for="confpassword" class="control-label text-capitalize text-muted">confirm password</label>
								<div class="has-feedback">
									{{ Form::password('password_confirmation', ['placeholder' => 'Confirm-Password', 'class' => 'form-control', 'id' => 'confpassword', 'required' => 'required'])}}
									{{ errors_for('password_confirmation', $errors) }}
								</div>
							</div>
							
							
							<!-- contact field -->
							<div class="col-md-12 form-group">
								<label for="contact" class="control-label text-capitalize text-muted">Contact number</label>
								<div class="has-feedback">
									{{ Form::text('contact',null, ['placeholder' => 'Contact Number', 'class' => 'form-control', 'id' => 'contact', 'required' => 'required'])}}
									{{ errors_for('contact', $errors) }}
								</div>
							</div>
							<!-- talent box -->
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
							<!-- terms and condition field -->
							<div class="col-md-12 form-group">
								<div class="has-feedback">
									<input id="checkbox-11" class="checkbox-custom" name="terms" type="checkbox" value="1" >
            						<label for="checkbox-11" class="checkbox-custom-label"><strong>I agree to the Itsshowtime.co.in <a target="_blank" id="TosLink" href="#">Terms of Service</a> and <a target="_blank" id="PrivacyLink" href="#">Privacy Policy</a></strong></label>
								</div>
							</div>
							<!-- Submit field -->
							<div class="col-md-12 form-group">
								<div class="has-feedback text-center">
									{{ Form::submit('Create Account', ['class' => 'btn btn-md btn-default']) }}
								</div>
							</div>




				    	</fieldset>
				      	{{ Form::close() }}	    	

				<p style="text-align:center">Already have an account? <a href="/login">Login</a></p>
				</div>
			</div>
		</div>


	<!-- ***************** Audience ************ ------- !-->
	<div class="row form-audiencegroup">
			<div class="col-md-6 col-md-offset-3">
	    		<div class="form-box">
					{{ Form::open(['route' => 'registration.store']) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif

							{{Form::hidden('group', 'Audiences')}}
							<!-- First name field -->
							<div class="col-md-8 form-group">
								<label for="username" class="control-label text-capitalize text-muted">Name</label>
								<div class="has-feedback">
									{{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'id' => 'username', 'required' => 'required'])}}
									{{ errors_for('name', $errors) }}
								</div>
							</div>
							<!-- gender field -->
							<div class="col-sm-4 form-group">
											<label for="gendera" class="control-label text-muted">Gender</label>
											<select class="form-control" name="gender">
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div>
							<!-- dob field -->
							<div class="col-md-12 form-group">
								<label for="dob" class="control-label text-capitalize text-muted">Dob</label>
								<!--<div class="has-feedback">
									{{ Form::text('dob',null, ['placeholder' => 'DOB', 'class' => 'form-control', 'id' => 'dob', 'required' => 'required'])}}
									{{ errors_for('dob', $errors) }}
								</div>-->
								<div class="row">
											<div class="col-sm-4">
												<select class="form-control" name="day" id="day">
													<option value="0">Day</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
													<option value="13">13</option>
													<option value="14">14</option>
													<option value="15">15</option>
													<option value="16">16</option>
													<option value="17">17</option>
													<option value="18">18</option>
													<option value="19">19</option>
													<option value="20">20</option>
													<option value="21">21</option>
													<option value="22">22</option>
													<option value="23">23</option>
													<option value="24">24</option>
													<option value="25">25</option>
													<option value="26">26</option>
													<option value="27">27</option>
													<option value="28">28</option>
													<option value="29">29</option>
													<option value="30">30</option>
													<option value="31">31</option>
												</select>
											</div>
											
											<div class="col-sm-4">
												<select class="form-control" name="month" id="month">
													<option value="0">Month</option>
													<option value="1">January</option>
													<option value="2">February</option>
													<option value="3">March</option>
													<option value="4">April</option>
													<option value="5">May</option>
													<option value="6">June</option>
													<option value="7">July</option>
													<option value="8">August</option>
													<option value="9">September</option>
													<option value="10">October</option>
													<option value="11">November</option>
													<option value="12">December</option>
												</select>
											</div>
											
											<div class="col-sm-4">
												<select class="form-control" name="year" id="year">
													<option value="0">Year</option>
													<option value="2000">2000</option>
													<option value="1999">1999</option>
													<option value="1998">1998</option>
													<option value="1997">1997</option>
													<option value="1996">1996</option>
													<option value="1995">1995</option>
													<option value="1994">1994</option>
													<option value="1993">1993</option>
													<option value="1992">1992</option>
													<option value="1991">1991</option>
													<option value="1990">1990</option>
													<option value="1989">1989</option>
													<option value="1988">1988</option>
													<option value="1987">1987</option>
													<option value="1986">1986</option>
													<option value="1985">1985</option>
													<option value="1984">1984</option>
													<option value="1983">1983</option>
													<option value="1982">1982</option>
													<option value="1981">1981</option>
													<option value="1980">1980</option>
													<option value="1979">1979</option>
													<option value="1978">1978</option>
													<option value="1977">1977</option>
													<option value="1976">1976</option>
													<option value="1975">1975</option>
													<option value="1974">1974</option>
													<option value="1973">1973</option>
													<option value="1972">1972</option>
													<option value="1971">1971</option>
													<option value="1970">1970</option>
												</select>
											</div>
										</div>
							</div>
							<!-- Email field -->
							<div class="col-md-12 form-group">
								<label for="email" class="control-label text-capitalize text-muted">email</label>
								<div class="has-feedback">
									{{ Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'id' => 'email','required' => 'required'])}}
									{{ errors_for('email', $errors) }}
								</div>
							</div>
							<!-- Password field -->
							<div class="col-md-6 form-group">
								<label for="password" class="control-label text-capitalize text-muted">password</label>
								<div class="has-feedback">
									{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'id' => 'password', 'required' => 'required'])}}
									{{ errors_for('password', $errors) }}
								</div>
							</div>
							<!-- confirm Password field -->
							<div class="col-md-6 form-group">
								<label for="confpassword" class="control-label text-capitalize text-muted">confirm password</label>
								<div class="has-feedback">
									{{ Form::password('password_confirmation', ['placeholder' => 'Confirm-Password', 'class' => 'form-control', 'id' => 'confpassword', 'required' => 'required'])}}
									{{ errors_for('password_confirmation', $errors) }}
								</div>
							</div>
							
							
							<!-- contact field -->
							<div class="col-md-12 form-group">
								<label for="contact" class="control-label text-capitalize text-muted">Contact number</label>
								<div class="has-feedback">
									{{ Form::text('contact',null, ['placeholder' => 'Contact Number', 'class' => 'form-control', 'id' => 'contact', 'required' => 'required'])}}
									{{ errors_for('contact', $errors) }}
								</div>
							</div>
							
							<!-- terms and condition field -->
							<div class="col-md-12 form-group">
								<div class="has-feedback">
									<input id="checkbox-20" class="checkbox-custom" name="terms" type="checkbox" value="1" >
            						<label for="checkbox-20" class="checkbox-custom-label"><strong>I agree to the Itsshowtime.co.in <a target="_blank" id="TosLink" href="#">Terms of Service</a> and <a target="_blank" id="PrivacyLink" href="#">Privacy Policy</a></strong></label>
								</div>
							</div>
							<!-- Submit field -->
							<div class="col-md-12 form-group">
								<div class="has-feedback text-center">
									{{ Form::submit('Create Account', ['class' => 'btn btn-md btn-default']) }}
								</div>
							</div>




				    	</fieldset>
				      	{{ Form::close() }}	    	

				<p style="text-align:center">Already have an account? <a href="/login">Login</a></p>
				</div>	
			</div>
	</div>
	<!--  promoter form --------------------------------------!-->
	<div class="row form-promotergroup">
			<div class="col-md-6 col-md-offset-3">
	    		<div class="form-box">
					{{ Form::open(['route' => 'registration.store']) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif

							{{Form::hidden('group', 'Promoters')}}
							<!-- First name field -->
							<div class="col-md-12 form-group">
								<label for="username" class="control-label text-capitalize text-muted">Company name</label>
								<div class="has-feedback">
									{{ Form::text('name', null, ['placeholder' => 'Comapany Name', 'class' => 'form-control', 'id' => 'username', 'required' => 'required'])}}
									{{ errors_for('name', $errors) }}
								</div>
							</div>
							
							<!-- Email field -->
							<div class="col-md-12 form-group">
								<label for="email" class="control-label text-capitalize text-muted">company registered email</label>
								<div class="has-feedback">
									{{ Form::text('email', null, ['placeholder' => 'Company Registered Email', 'class' => 'form-control', 'id' => 'email','required' => 'required'])}}
									{{ errors_for('email', $errors) }}
								</div>
							</div>
							<!-- Password field -->
							<div class="col-md-6 form-group">
								<label for="password" class="control-label text-capitalize text-muted">password</label>
								<div class="has-feedback">
									{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'id' => 'password', 'required' => 'required'])}}
									{{ errors_for('password', $errors) }}
								</div>
							</div>
							<!-- confirm Password field -->
							<div class="col-md-6 form-group">
								<label for="confpassword" class="control-label text-capitalize text-muted">confirm password</label>
								<div class="has-feedback">
									{{ Form::password('password_confirmation', ['placeholder' => 'Confirm-Password', 'class' => 'form-control', 'id' => 'confpassword', 'required' => 'required'])}}
									{{ errors_for('password_confirmation', $errors) }}
								</div>
							</div>
							
							
							<!-- contact field -->
							<div class="col-md-12 form-group">
								<label for="contact" class="control-label text-capitalize text-muted">Contact number</label>
								<div class="has-feedback">
									{{ Form::text('contact',null, ['placeholder' => 'Contact Number', 'class' => 'form-control', 'id' => 'contact', 'required' => 'required'])}}
									{{ errors_for('contact', $errors) }}
								</div>
							</div>
							<!-- contact field -->
							<div class="col-md-12 form-group">
								<label for="address" class="control-label text-capitalize text-muted">Address</label>
								<div class="has-feedback">
									{{ Form::text('address',null, ['placeholder' => 'Address', 'class' => 'form-control', 'id' => 'address', 'required' => 'required'])}}
									{{ errors_for('address', $errors) }}
								</div>
							</div>
							<!-- gender field -->
							<div class="col-sm-6 form-group">
											<label for="city" class="control-label text-muted">City</label>
											<select class="form-control" name="city" id="city">
												<option value="bangalore">Bangalore</option>
												<option value="kathmandu">Kathmandu</option>
											</select>
										</div>
							<!-- gender field -->
							<div class="col-sm-6 form-group">
											<label for="country" class="control-label text-muted">Country</label>
											<select class="form-control" name="country" id="country">
												<option value="india">India</option>
												<option value="nepal">Nepal</option>
											</select>
										</div>
							<!-- terms and condition field -->
							<div class="col-md-12 form-group">
								<div class="has-feedback">
									<input id="checkbox-30" class="checkbox-custom" name="terms" type="checkbox" value="1" >
            						<label for="checkbox-30" class="checkbox-custom-label"><strong>I agree to the Itsshowtime.co.in <a target="_blank" id="TosLink" href="#">Terms of Service</a> and <a target="_blank" id="PrivacyLink" href="#">Privacy Policy</a></strong></label>
								</div>
							</div>
							<!-- Submit field -->
							<div class="col-md-12 form-group">
								<div class="has-feedback text-center">
									{{ Form::submit('Create Account', ['class' => 'btn btn-md btn-default']) }}
								</div>
							</div>




				    	</fieldset>
				      	{{ Form::close() }}	    	

				<p style="text-align:center">Already have an account? <a href="/login">Login</a></p>
				</div>	
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