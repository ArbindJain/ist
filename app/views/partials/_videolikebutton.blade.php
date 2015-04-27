<!-- Like and Unlike Button For Video
======================================-->
<div class="img-like">
	<a class="likebutton-{{$uservid->id}}Picture like-button" data-realclass="likebutton-{{$uservid->id}}Picture" data-model="Video" data-id="{{$uservid->id}}" data-iconclass="{{isset($uservid->liked)?'fa fa-thumbs-down':'fa fa-thumbs-up'}}" data-action="{{isset($uservid->liked)?'unlike':'like'}}">
		<i class="{{isset($uservid->liked)?'fa fa-thumbs-down':'fa fa-thumbs-up'}}"></i>
		&nbsp;
		<span class="btntext">{{isset($uservid->liked)?'Unlike':'Like'}}</span>
	</a>
</div>
<!-- EndLike and Unlike Button For Video
======================================-->