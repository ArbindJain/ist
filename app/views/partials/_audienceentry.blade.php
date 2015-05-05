<div class="review-block">
<h5> Audience review </h5>
</div>

@foreach($reviewaudis as $reviews)
<div class="review-body">

<p><b><a href="{{url()}}/user/{{Sentry::getUser($reviews->commenter_id)->id}}?{{Sentry::getUser($reviews->commenter_id)->name}}">{{Sentry::getUser($reviews->commenter_id)->name}}</a>
</b> <br>{{$reviews->review}}@if($reviews->user_id == Sentry::getUser()->id)
{{ Form::model($reviews, ['method' => 'DELETE', 'route' => ['audiencereviews.destroy',$reviews->id]]) }}
<a><button type="submit" style="border: 0; background: transparent; " class="pull-right">
            <i class="fa fa-trash-o"></i>
            </button></a>
{{ Form::close() }}
@endif
</p>


<!--<span class="author">
<footer class="pull-right">{{$reviews->created_at->diffForHumans()}}</footer>
</span>-->
</div>

@endforeach
<br>
<div class="form-entry">
{{ Form::open(['route' => 'audiencereviews.store']) }}
<fieldset>
@if (Session::has('flash_message'))
<div class="form-group">
<p>{{ Session::get('flash_message') }}</p>
</div>
@endif
{{Form::hidden('user_id',$userprofile->id)}}
<!-- Image title field -->
<div class="form-group">
{{ Form::text('review', null, ['placeholder' => 'review this user!', 'class' => 'form-control','required' => 'required'])}}
{{ errors_for('review', $errors) }}
</div>

<!-- Submit field -->
<div class="form-group">
{{ Form::submit('review ', ['class' => 'btn btn-sm btn-default pull-right']) }}
</div>
{{ Form::close() }}
</div>