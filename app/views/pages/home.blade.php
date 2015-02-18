@extends('master')

@section('title', 'Home')

@section('content')
<style>
.users-block{
	display: block;
	padding: 20px;
	background-color: #eae8e8;
	margin:5px;
}
	

</style>
<div class="row">
	<div class="col-md-12">
	@foreach($users as $user)
	
		
		<div class="pull-left users-block">
			{{ HTML::image($user->profileimage , 'profile picture', array('class' => 'img-circle pull-right')) }}
	
			<p>{{$user->name}}</p>
			<!--direct route referncing name should be first param of a route...-->
			{{ link_to_route('user', 'show', array($user->id,$user->name), array('class' => 'btn btn-info')) }}
		</div>
			
		
			
		
	
		
	@endforeach
	</div>
</div>

@stop