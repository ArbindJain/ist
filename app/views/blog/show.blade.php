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
		<hr>
		<div class="col-md-12 text-center">
		@foreach($comments as $comment)
<div>
	<b>Comment:</b><br>{{ $comment->comment}}<br><br>
				Posted by:{{$us = Sentry::findUserById($comment->user_id)->name}}<br>
				Posted On:{{$comment->created_at->toFormattedDateString();}}
				
					@if ( $us == Sentry::getUser()->name )
					{{ Form::model($comments, ['method' => 'DELETE', 'files' => true , 'route' => ['comments.destroy',$comment->id]]) }}
					{{ Form::submit('Delete', array('class' => 'btn btn-default pull-left')) }}
					{{ Form::close() }}
				@else
				
					
				@endif

				

</div><br><hr>
				

				
		@endforeach
	
		
	</div>
		<hr>
		{{ Form::open(['route' => 'comments.store' ]) }}
	                    <fieldset>

	                    	@if (Session::has('flash_message'))
								<div class="form-group">
									<p>{{ Session::get('flash_message') }}</p>
								</div>
							@endif
							{{Form::hidden('blog_id',$blog->id)}}
							
							<div class="form-group">
									<div class="helper-block">Post Title</div>
								{{ Form::textarea('commentbody', null, ['placeholder' => 'Comment body ', 'class' => 'form-control', 'required' => 'required'])}}
								{{ errors_for('commentbody', $errors) }}
							</div>

							
							<!-- Submit field -->
							<div class="form-group">
								{{ Form::submit('comment', ['class' => 'btn btn-md btn-default btn-block']) }}
							</div>



				    	</fieldset>
				      	{{ Form::close() }}
		
</div>
		



@stop