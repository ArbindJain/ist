<div class="col-md-9 profile-main-block col-md-offset-3">
    {{ HTML::image($userprofile->profileimage , 'profile picture', array('class' => 'img-circle pull-left','id' => 'size')) }}
    <span>
      <ul class="list-unstyled pull-left name-block text-capitalize">
        <li class="name-space "><h3>{{$userprofile->name}}</h3></li>
        <li class="title-space ">{{$userprofile->title}}</li>
        <li class="address-space">{{$userprofile->city}},{{ $userprofile->country}}</li>
      </ul>
    </span>
    <span>
      <ul class="list-unstyled pull-left link-block">
        <li>@include('partials._followunfollow')</li>
        <li><a href="#"><i class="fa fa-star-o"></i> Connect</a></li>
        <li><a href="#"><i class="fa fa-star-o"></i> www.link.com</a></li>
      </ul>
    </span>
  </div>
          
         