@extends('masterwitheditor')

@section('title', 'Blog')

@section('content')


<div class="row">
	<div class="col-md-12">
		{{HTML::link('blog/create','CREATE NEW POST' , array('class' => 'btn btn-sm btn-primary'))}}
	</div>
            </div>
            <div class="row">
            @foreach($blogs as $blog)
            	<div class="col-md-12">
            		<span><h2>{{$blog->id}}. {{$blog->title}}</h2></span>
            		<!--<span><h4>{{$blog->body}}</h4></span>-->
            		<span>
            		{{HTML::link('delete','show',array('class'=>'btn btn-sm btn-default'))}}
            		{{HTML::link('delete','edit',array('class'=>'btn btn-sm btn-default'))}}
            		{{HTML::link('delete','delete',array('class'=>'btn btn-sm btn-danger'))}}</span>
            		
            	</div><br><hr>
            	@endforeach

            </div>
		



@stop