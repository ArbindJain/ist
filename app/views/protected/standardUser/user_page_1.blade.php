@extends('master')

@section('title', 'Profile')

@section('content')
<!-- ****** Display profile image,name and other suff ***** -->
<style>
  #size1{
    display: block;
    width: 40px;
    height: 40px;
  }
  .user-details{
    display: block;
    margin-left: 10px;

  }
  .article-image {
    display: block;
    margin-left: 50px;

  }
  .comment-method{
    display: block;
    margin-left: 60px;
    margin-top: 5px;
  }
  .text-width{
    display: block;
    width: 70%;
    margin-left: 60px;
  }
</style>
<div class="row">
  <div class="col-md-9 profile-main-block col-md-offset-3">
    {{ HTML::image($active_user->profileimage , 'profile picture', array('class' => 'img-circle pull-left','id' => 'size')) }}
    <span>
      <ul class="list-unstyled pull-left name-block text-capitalize">
        <li class="name-space "><h3>{{$active_user->name}}</h3></li>
        <li class="title-space ">{{$active_user->title}}</li>
        <li class="address-space">{{$active_user->city}},{{ $active_user->country}}</li>
      </ul>
    </span>
    
  </div>
</div>

<div class="row">
  <div class="col-md-12 centered-pills">
    <div class="sub-nav-block">
    <ul class="nav nav-pills">
      <li role="navigation" class="active"><a href="#photo" aria-controls="photo" role="tab" data-toggle="tab">MyEvent(wall)</a></li>
      <li role="navigation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a></li>
      <li role="navigation"><a href="#audio" aria-controls="audio" role="tab" data-toggle="tab">Audio</a></li>
      <li role="navigation"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">Recent Activity</a></li>
      <li role="navigation"><a href="#blog" aria-controls="blog" role="tab" data-toggle="tab">Blog</a></li>
      <li role="navigation"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
    </ul>
    </div>
    <div class="tab-content">
    <div class="clearfix"></div>
      <div role="tabpanel" class="tab-pane active" id="photo">
      <div class="col-md-8">
      <div class="status-block">
        <br><br>
          <li role="presentation" class="active"><a href="#" class="text-muted">Feed&nbsp;&nbsp;</a></li>
          <li role="presentation"><a href="#" class="text-muted">Tutorial&nbsp;&nbsp;</a></li>
          <li role="presentation"><a href="#" class="text-muted">Transaction&nbsp;&nbsp;</a></li>
          <li role="presentation"><a href="#" class="text-muted">Find talent&nbsp;&nbsp;</a></li>
       
      {{ Form::textarea('commentbody', null, ['placeholder' => 'Whats on your mind?? ','rows' => '4', 'class' => 'form-control text-shift', 'required' => 'required'])}}
          
      </div>
      <br>
      <div class="page-block">
        <span class="img-block pull-left">
           {{ HTML::image($active_user->profileimage , 'profile picture', array('class' => 'img-circle pull-left','id' => 'size1')) }}
        </span>
        <span class="user-details">
          <a href="#"><b>{{$active_user->name}}</b></a><br>
          <p class="text-muted">Posted on {{$active_user->created_at->toFormattedDateString()}}</p>
        </span>
        <div class="clearfix"></div>
        <span class="article-image ">
        <img src ="https://fbexternal-a.akamaihd.net/safe_image.php?d=AQBJOp5UVD75HuNT&w=470&h=246&url=http%3A%2F%2Ftimesofindia.indiatimes.com%2Fphoto%2F46619814.cms&cfs=1&upscale=1" width="470" height="250">
        </span>
        <span class="comment-method">

          <a href="#"><b>{{$active_user->name}}</b></a><br>
          <p class="text-muted">Posted on {{$active_user->created_at->toFormattedDateString()}}</p>
          
          <p >My first Trail comment under Testingt Version: 1.0.75666abe5665fghsfdtY</p>
        </span>
        <span class="comment-method">

          <a href="#"><b>{{$active_user->name}}</b></a><br>
          <p class="text-muted">Posted on {{$active_user->created_at->toFormattedDateString()}}</p>
          
          <p >Trait id: 1.0.75666abe5665fghsfdtY</p>
        </span>
        <div class="clearfix"></div>
         {{ Form::textarea('commentbody', null, ['placeholder' => 'Whats on your mind?? ','rows' => '1', 'class' => 'form-control text-width', 'required' => 'required'])}}
       

      </div>
      <br>
      <div class="page-block">
        <span class="img-block pull-left">
           {{ HTML::image($active_user->profileimage , 'profile picture', array('class' => 'img-circle pull-left','id' => 'size1')) }}
        </span>
        <span class="user-details">
          <a href="#"><b>{{$active_user->name}}</b></a><br>
          <p class="text-muted">Posted on {{$active_user->created_at->toFormattedDateString()}}</p>
        </span>
        <div class="clearfix"></div>
        <span class="article-image ">
        <img src ="https://scontent-cdg.xx.fbcdn.net/hphotos-xpf1/v/t1.0-9/s720x720/11009926_891226790934828_1630206283306281996_n.jpg?oh=9ec983d738a717255d7ebf2871c0b248&oe=55745F06" width="470" height="250">
        </span>
        <span class="comment-method">

          <a href="#"><b>{{$active_user->name}}</b></a><br>
          <p class="text-muted">Posted on {{$active_user->created_at->toFormattedDateString()}}</p>
          
          <p >My first Trail comment under Testing Version: 1.0.75666abe5665fghsfdtY</p>
        </span>
        <span class="comment-method">

          <a href="#"><b>{{$active_user->name}}</b></a><br>
          <p class="text-muted">Posted on {{$active_user->created_at->toFormattedDateString()}}</p>
          
          <p >Trait id: 1.0.75666abe5665fghsfdtY</p>
        </span>
        <div class="clearfix"></div>
         {{ Form::textarea('commentbody', null, ['placeholder' => 'Whats on your mind?? ','rows' => '1', 'class' => 'form-control text-width', 'required' => 'required'])}}
       

      </div>
              
      </div>
      <div class="col-md-4"><br><br>
        ----------------User Block Review --------------
      </div>
            
        
        
               
      </div>
      <div role="tabpanel" class="tab-pane" id="video">
         

      </div>
      <div role="tabpanel" class="tab-pane" id="audio">
       


      </div>
      <div role="tabpanel" class="tab-pane" id="recent">4...</div>
      <div role="tabpanel" class="tab-pane" id="blog">2...</div>
      <div role="tabpanel" class="tab-pane" id="about">3...</div>
    </div>
  </div>
</div>




@stop