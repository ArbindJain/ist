<!-- Like and Unlike Button For Photo
======================================-->
<div class="img-like">
	<a class="likebutton-{{$albumimage->id}}Picture like-button" data-realclass="likebutton-{{$albumimage->id}}Picture" data-model="Picture" data-id="{{$albumimage->id}}" data-iconclass="{{isset($albumimage->liked)?'fa fa-thumbs-down':'fa fa-thumbs-up'}}" data-action="{{isset($albumimage->liked)?'unlike':'like'}}">
		<i class="{{isset($albumimage->liked)?'fa fa-thumbs-down':'fa fa-thumbs-up'}}"></i>
		&nbsp;
		<span class="btntext">{{isset($albumimage->liked)?'Unlike':'Like'}}</span>
	</a>
</div>
<!-- EndLike and Unlike Button For Photo
======================================-->
                  