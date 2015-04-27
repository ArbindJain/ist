<!-- Like and Unlike Button For Audio
======================================-->
<div class="img-like">
	<a class="likebutton-{{$useraud->id}}Picture like-button" data-realclass="likebutton-{{$useraud->id}}Picture" data-model="Audio" data-id="{{$useraud->id}}" data-iconclass="{{isset($useraud->liked)?'fa fa-thumbs-down':'fa fa-thumbs-up'}}" data-action="{{isset($useraud->liked)?'unlike':'like'}}">
		<i class="{{isset($useraud->liked)?'fa fa-thumbs-down':'fa fa-thumbs-up'}}"></i>
		&nbsp;
		<span class="btntext">{{isset($useraud->liked)?'Unlike':'Like'}}</span>
	</a>
</div>
<!-- EndLike and Unlike Button For Audio
======================================-->