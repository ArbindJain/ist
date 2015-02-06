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
            		{{ link_to_route('blog.show', 'show', $blog->id, ['class' => 'btn btn-default']) }}
					{{ link_to_route('blog.edit', 'edit', $blog->id, ['class' => 'btn btn-default']) }}
					{{ Form::model($blog, ['method' => 'DELETE', 'files' => true , 'route' => ['blog.destroy',$blog->id]]) }}
					{{ Form::submit('Delete', array('class' => 'btn btn-default pull-left')) }}
					{{ Form::close() }}

					</span>
            		
            	</div><br><hr>
            	@endforeach

            </div>
		



@stop