<div class="col-md-9 profile-main-block col-md-offset-3">
    {{ HTML::image($userprofile->profileimage , 'profile picture', array('class' => 'img-circle pull-left','id' => 'size')) }}
    <span>
      <ul class="list-unstyled pull-left name-block text-capitalize">
        <li class="name-space "><h3>{{$userprofile->name}}</h3></li>
        <li class="title-space ">{{$userprofile->titlea}}&nbsp;{{$userprofile->titleb}}&nbsp;{{$userprofile->titlec}}</li>
        <li class="address-space">{{$userprofile->city}},{{ $userprofile->country}}</li>
      </ul>
    </span>
    <span>
      <ul class="list-unstyled pull-left link-block">
        <li style="cursor:pointer;">@include('partials._followunfollow')</li>
        @if(Sentry::findUserByID(Sentry::getUser()->id)->inGroup(Sentry::findGroupByName('Stars')))
        <li style="cursor:pointer;">@include('partials._connect')</li>
        @endif
        <li><a href="#"><i class="fa fa-link"></i> www.link.com</a></li>
      </ul>
    </span>
  </div>
          
         