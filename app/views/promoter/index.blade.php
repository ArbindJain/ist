@extends('promoter.masterhead')

@section('title', 'Edit Profile')

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
			<!--Cant use link_to_route because  I didnt name it....-->
			<a href="/promoter/{{$user->id}}" class="btn btn-primary">show</a>
			</div>
			
		
			
		
	
		
	@endforeach
	</div>
		
</div>	

@stop