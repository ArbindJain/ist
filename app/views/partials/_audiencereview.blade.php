<div class="review-block">
<h5> Audience review </h5>
</div>
@foreach($aud_review as $reviews)
<div class="review-body">

<p><b><a href="{{url()}}/user/{{Sentry::getUser($reviews->commenter_id)->id}}?{{Sentry::getUser($reviews->commenter_id)->name}}">{{Sentry::getUser($reviews->commenter_id)->name}}</a>
</b> <br>{{$reviews->review}}</p>

<!--<span class="author">
<footer class="pull-right">{{$reviews->created_at->diffForHumans()}}</footer>
</span>-->
</div>
@endforeach