@extends('masterwitheditor')

@section('title', 'Blog')

@section('content')


<div class="row">

	<div class="col-md-12">
		<span>	<h2>{{$blog->title}}</h2></span>
		<span> <h4>{{$blog->body}}</h4></span>	
			<span>{{$blog->user_id}}</span>
			<span>Posted On: {{$blog->created_at->toFormattedDateString();}}
	</div>
		{{HTML::link('blog','back to blogs' , array('class' => 'btn btn-sm btn-default'))}}
	
</div>
		



@stop