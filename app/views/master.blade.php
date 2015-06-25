<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta name="description" content="">
		<meta name="author" content="">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>@yield('title') - IST</title>
	    {{HTML::style('/fonts/HelveticaNeueLTStd-Roman.otf')}}
	    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic&subset=latin-ext,latin' rel='stylesheet' type='text/css'>
	    <!-- Bootstrap -->
	   <link rel="stylesheet" type="text/css" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
	   
	    
	    {{HTML::style('/css/bootstrap.min.css')}}
	    <link rel="stylesheet" type="text/css" href="http://scottdorman.github.io/bootstrap-flat/css/bootstrap-flat.min.css">
	    
	    {{HTML::style('/css/style.css')}}
	    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	    
		 <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
		<!-- below script required for flowplayer -->
		

		{{ HTML::script('/js/dropzone.js') }}
	    {{ HTML::style('/css/dropzone.css') }}
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
		<!-- timer cdn -->
		{{ HTML::script('/js/TimeCircles.js') }}
		<!-- 1. skin -->
<link rel="stylesheet" href="//releases.flowplayer.org/5.5.2/skin/minimalist.css">

<!-- js

<script src="http://releases.flowplayer.org/js/flowplayer-3.2.13.min.js"></script> -->
 
 
<!-- 3. flowplayer -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script src="//releases.flowplayer.org/5.5.2/flowplayer.min.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	  <style type="text/css">
.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
text-decoration: none;
color: #f18c1c;
background-color: #ffffff;
}
.btn-link {
	color: #515151;
}
.btn-link:hover {
	color: #f18c1c;
}
    </style>  

	</head>
  <header>
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		  	<div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" style="padding-top: 0px;" href="/">{{HTML::image('logo/istlogo.png')}}</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav">
			      	
		      	</ul>
			      	<ul class="nav navbar-nav navbar-right">
			      	 @if (Sentry::check())
			      	 	<li class="{{ set_active('/newsfeeds') }}"><a href="/newsfeeds"><i class="fa fa-home"></i> Home</a></li>
			      	 	<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories <span class="caret"></span></a>
				          <ul class="dropdown-menu dropdown-menu-edited" role="menu">
				            <li><a href="{{ URL::to('categories_type', array('cate' => 'users.dance')) }}">Dance</a></li>
				            <li><a href="{{ URL::to('categories_type', array('cate' => 'users.art')) }}">Art</a></li>
				            <li><a href="{{ URL::to('categories_type', array('cate' => 'users.music')) }}">Music</a></li>
				            <li><a href="{{ URL::to('categories_type', array('cate' => 'users.sports')) }}">Sports</a></li>
				            <li><a href="{{ URL::to('categories_type', array('cate' => 'users.fashion')) }}">Fashion</a></li>
				            <li><a href="{{ URL::to('categories_type', array('cate' => 'users.wanderer')) }}">Wanderer</a></li>
				            <li><a href="{{ URL::to('categories_type', array('cate' => 'users.cooking')) }}">Cooking</a></li>
				            <li><a href="{{ URL::to('categories_type', array('cate' => 'users.unordinary')) }}">Unordinary</a></li>
				            <li><a href="{{ URL::to('categories_type', array('cate' => 'users.moviesandtheatre')) }}">Movies & Theater</a></li>
				          </ul>
				        </li>
				        <li class="{{ set_active('/') }}"><a href="/scout">Scout Talent</a></li>
				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Talent Hub <span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
				            <li><a href="#">Contest</a></li>
				            <li><a href="{{url()}}/userperformances">Performances</a></li>
				            <li><a href="#">Events</a></li>
				            <li><a href="#">Tutorial</a></li>
				            <li><a href="{{url()}}/blog">Blog</a></li>
				            <li><a href="#">Trending</a></li>
				          </ul>
				        </li>
				        
				        <li> 
                {{ Form::open(['route' => 'usersearch.index','method' =>'get','class'=>'search-container' ]) }}   
                
                
                <input id="search-box" type="text" class="typeahead search-box" name="term" />
                <label classfor="search-box"><i class="fa fa-search search-icon "></i></label>


							  
							  <input type="submit" id="search-submit" />
                 <!-- Submit field -->
                
							{{Form::close()}}
						</li>
						<style>
.mi.drdwn.open a#notif {
  background-color: #eee;
  color: #444;
}
.mi.drdwn.open a#notif:hover {
  background-color: #ddd;
  color: #444;
}
.mi.drdwn .dplink-r {
  background-color: #eee;
  margin-top: -5px;
  padding: 4px 0;
  border-bottom: #ddd solid 1px;
}
.mi.drdwn .dplink-b {
  border-top: #ddd solid 1px;
  margin-bottom: -5px;
  padding: 4px 0;
}
.mi.drdwn .dplink-r .sizer-lg-md,
.mi.drdwn .dplink-r .sizer-sm,
.mi.drdwn .dplink-r .sizer-xs {
  float: none;
  background-color: transparent;
  height: 1px;
}
.mi.drdwn .dplink-r .sizer-lg-md {
  width: 360px;
}
.mi.drdwn .dplink-r .sizer-sm {
  width: 300px;
}
.mi.drdwn .dplink-r a,
.mi.drdwn .dplink-b a {
  clear: none;
  float: right;
  display: block;
  padding: 2px 2px;
  margin-right: 8px;
  cursor: pointer;
  color: #666;
  font-size: 12px;
}
.mi.drdwn .dplink-r a:hover,
.mi.drdwn .dplink-b a:hover {
  background-color: transparent !important;
  text-decoration: underline;
  color: #222;
}
.mi.drdwn.open a {
  white-space: normal;
}
.mi.drdwn.open a:hover {
}
.mi.drdwn.open a i.nf-ico,
.notification-full-page-wrapper a .nf-ico {
  display: block;
  float: left;
  margin: -6px 0 0 0;
  padding: 0;
  color: #aaa;
  font-size: 22px;
}
.mi.drdwn.open a .nf-text,
.notification-full-page-wrapper a .nf-text {
  display: block;
  float: none;
  margin-left: 40px;
  margin-right: 72px;
}
.mi.drdwn.open a .nf-time,
.notification-full-page-wrapper a .nf-time {
  float: right;
  display: block;
  margin-right: 12px;
  color: #aaa;
  width: 70px;
  text-align: right;
  font-size: 12px;
}
.mi.drdwn #notification-panel-wrapper {
  display: block;
  overflow-y: scroll;
  max-height: 400px;
}
.mi.drdwn #notification-panel-wrapper #notification-panel {
  display: block;
}
.mi.drdwn a.nf-slug,
.notification-full-page-wrapper a.nf-slug {
  border-bottom: #ddd solid 1px;
  background-color: #f6f6f6;
  color: #444;
}
.mi.drdwn a.nf-slug:hover,
.notification-full-page-wrapper a.nf-slug:hover {
  background-color: #eee;
  color: #444;
}
.mi.drdwn .unread a.nf-slug,
.notification-full-page-wrapper .unread a.nf-slug {
  border-bottom: #E9DC8A solid 1px;
  background-color: #FFFCDF;
  color: #222;
}
.mi.drdwn .unread a.nf-slug:hover,
.notification-full-page-wrapper .unread a.nf-slug:hover {
  background-color: #FFF6AC;
  color: #222;
}
ul.notification-full-page-wrapper {
  list-style: none;
  padding: 0;
}
ul.notification-full-page-wrapper a {
  display: block;
  padding: 9px 12px;
  text-decoration: none;
  cursor: pointer;
  white-space: normal;
}
ul.notification-full-page-wrapper li > a {
  min-height: 60px;
}
/*
.mi.drdwn #notification-panel li:last-child a.nf-slug {
  border-bottom: none;
} */
.mi.drdwn .nf-placeholder {
  color: #888;
  padding: 20px 12px;
  text-align: center;
}
.badge.nf-badge {
  display: block;
  float: right;
  padding: 2px 3px;
  margin: 1px 4px;
  background-color: #e00;
  border: #c00 solid 1px;
  border-radius: 2px;
  font-weight: bold;
  line-height: 1;
  font-size: 12px;
}
.badge.nf-badge.hidden {
  display: none;
}
.mi.drdwn a#notif:hover .nf-badge {
  background-color: #fff;
  color: #c00;
}
.mi.drdwn.open a#notif:hover .nf-badge {
  background-color: #e00;
  color: #fff;
}
.mi.drdwn #notification-panel-wrapper .load-more {
  	text-align: center;
}
.mi.drdwn #notification-panel-wrapper .load-more > a {
	display: block;
	padding: 4px 15px;
	cursor: pointer;
  background-color: #f6f6f6;
  color: #444;
}
.mi.drdwn #notification-panel-wrapper .load-more > a:hover {
  background-color: #eee;
  color: #444;
}
@media only screen and (max-width : 768px) {
  .mi.drdwn .dropdown-menu {
    width: 260px;
    margin-right: -70px;
  }
  .mi.drdwn #notification-panel-wrapper {
    max-height: none;
  }
}

.cl-b {
	position: relative;
	float: none;
	clear: both;
}
						</style>
						<li class="dropdown mi drdwn">
							<a id="notif" class="dropdown-toggle nf-badge-container" data-toggle="dropdown"><i class="icon-globe-inv"></i><span class="hidden-xs">&nbsp;Notifications&nbsp;</span><span class="badge nf-badge<?php //echo (sta_::$notif_unread_count? '':' hidden'); ?>"><?php //echo (sta_::$notif_unread_count? sta_::$notif_unread_count:0); ?></span></a>
							<ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="notif" style="margin-top: 0;">
								<li class="dplink-r"><a href="<?php //echo base_url('portal/notifications'); ?>">see all</a><a id="mark-all-as-read">mark all as read</a><div class="cl-b"><div class="sizer-lg-md visible-lg visible-md"></div><div class="sizer-sm visible-sm"></div></div></li>
								<span id="notification-panel-wrapper" class="scrollable-notif">
									<span id="notification-panel" class="notification-panel-43675753">
										<li class="nf-placeholder">Loading...</li>
									</span>
									<div id="notification-load-more-button" class="load-more hidden-xs" style="display: none;"><a>loading more</a></div>
								</span>
								<li class="dplink-b"><a href="<?php //echo base_url('portal/notifications'); ?>" style="float:none; text-align: center;">see all</a><div class="cl-b"></div></li>
							</ul>
						</li>
						<!--<li class="dropdown">
				          <a href="#" class="dropdown-toggle" id="open-notif" data-toggle="dropdown" role="button" aria-expanded="false">
				          	
							  <i class="fa fa-globe" style="font-size: 12pt;"></i>
							
				          </a>

	 						<ul class="dropdown-menu dropdown-menu-notification" role="menu">
				            <li>
				            	<div class="notification">
				            	
				            	</div>
				            </li>
				            <div class="see-more-block">
				            	<a href="{{url()}}/newsfeeds">See All</a>
				            </div>
				          </ul>
				        </li>-->
				        <li class="dropdown">
				          <a href="#" id ="menubar-avatar" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	 						{{ HTML::image(Sentry::getUser()->profileimage , 'profile picture', array('class' => 'img-circle avatar')) }}	</a>
				          <ul class="dropdown-menu" role="menu">
				            <li><a href="{{url()}}/userProtected">Your Profile</a></li>
				            <li><a href="{{url()}}/invite_friend">Invite a Friend</a></li>
				            <li><a href="{{url()}}/profiles/{{Sentry::getUser()->id}}/edit">Account Settings</a></li>
				            @if(Sentry::findUserByID(Sentry::getUser()->id)->inGroup(Sentry::findGroupByName('Stars')))
                    <li><a href="{{url()}}/connect">Connect</a></li>
                    @endif
				            <li><a href="#">Help</a></li>
				            <li><a href="{{url()}}/logout">Signout</a></li>
				          </ul>
				        </li>

				       
					@else
						<li class="{{ set_active('/') }}"><a href="/"><i class="fa fa-home"></i></a></li>
			      	 	<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories <span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
				            <li><a  href="{{ URL::to('categories_mirror_type', array('cate' => 'users.dance')) }}">Dance</a></li>
                    <li><a href="{{ URL::to('categories_mirror_type', array('cate' => 'users.art')) }}">Art</a></li>
                    <li><a href="{{ URL::to('categories_mirror_type', array('cate' => 'users.music')) }}">Music</a></li>
                    <li><a href="{{ URL::to('categories_mirror_type', array('cate' => 'users.sports')) }}">Sports</a></li>
                    <li><a href="{{ URL::to('categories_mirror_type', array('cate' => 'users.fashion')) }}">Fashion</a></li>
                    <li><a href="{{ URL::to('categories_mirror_type', array('cate' => 'users.wanderer')) }}">Wanderer</a></li>
                    <li><a href="{{ URL::to('categories_mirror_type', array('cate' => 'users.cooking')) }}">Cooking</a></li>
                    <li><a href="{{ URL::to('categories_mirror_type', array('cate' => 'users.unordinary')) }}">Unordinary</a></li>
                    <li><a href="{{ URL::to('categories_mirror_type', array('cate' => 'users.moviesandtheatre')) }}">Movies & Theater</a></li>
				          </ul>
				        </li>
				        <li class="{{ set_active('/') }}"><a href="{{url()}}/register">Signup</a></li>
				        <li class="{{ set_active('/') }}"><a href="{{url()}}/login">Login</a></li>
				        <li> 
				        	 {{ Form::open(['route' => 'usersearch.index','class'=>'search-container' ]) }}
							  <input id="search-box" type="text" class="search-box" name="term" />
							  <label for="search-box"><i class="fa fa-search search-icon"></i></label>
							  <input type="submit" id="search-submit" />
							{{Form::close()}}
						</li>
					@endif

			      	</ul>


		      <!--	<ul class="nav navbar-nav navbar-right">
		      	@if (!Sentry::check())
					<li class="{{ set_active('register') }}"><a href="/register">Register</a></li>
					<li class="{{ set_active('login') }}"><a href="/login">Login</a></li>
				@else
					<li class="{{ set_active('profiles') }}"><a href="/profiles/{{Sentry::getUser()->id}}">My Profile</a></li>
					<li><a href="/logout">Logout</a></li>
				@endif
		        </ul>-->
		      
		    </div><!-- /.navbar-collapse -->
		  	</div><!-- /.container-fluid -->
			</nav>
		</header>
	
		<div class="container">
		  <!-- Modal -->
<div class="lightbox-8675896-overlay-mirror " style="position: fixed; top: 0px; left: 0px; right: 0px; bottom: 0px; background-color: rgb(0, 0, 0); opacity: 0.6; z-index: 9990; display: none;"></div>
<div class="lightbox-8675896-mirror " style="position: fixed; top: 0px; left: 0px; right: 0px; bottom: 0px; background-image: none; z-index: 99999; pointer-events: none; display: none; background-position: initial initial; background-repeat: initial initial;">
	<div class="vert-align-mirror" style="position: absolute;top: 0;left: 0;right: 0;height: 50%;">
		<div class="real-lightbox-mirror" style="	position: relative;	float: none;	top: 100%;	margin-top: -290px;	margin-right: auto;	margin-left: auto;	width: 980px;	height: 580px;	background-color: #fff;	font-family: sans-serif;	pointer-events: auto;	">
			<div class="image-area-mirror" style="position: absolute;top: 0;left: 0;bottom: 0;width: 680px;background-color: #000;overflow: hidden;">
				
				<div class="image-area-image-mirror" id="imagetragetnotif" style="">
					<div class="flowplayer" id="videoplayer" style="display:none;">
                  <video>
                    <source type="video/webm" class="webmvideo" src="">
                    <source type="video/mp4"  class="mp4video" src="">
                    <source type="video/flash" class="flvvideo" src="">

                  </video>
                </div>
                <div id="player" style="display:none; background-color:#000; " class="flowplayer fixed-controls play-button is-splash is-audio" data-engine="audio" data-embed="false">
              <video preload="none">
                <source type="video/ogg" src="{{url()}}/galleryaudio/ogg/.ogg">
              </video>
              </div>
				</div>
			</div>	
			<div class="content-area-mirror" style="position: absolute;top: 0;right: 0;bottom: 0;width: 300px;">
				<div class="close-button-mirror" style="position: absolute;top: 0;right: 0;width: 26px;height: 26px;line-height: 26px;cursor: pointer;text-align: center;margin-left: auto;">
					x
				</div>
				<div class="inserted-mirror" style="position: absolute; top: 0px; left: 0px; right: 0px; bottom: 0px; margin-top: 30px; border-top-color: rgb(246, 246, 246); border-top-style: solid; border-top-width: 1px; overflow-y: auto; overflow-x: hidden; margin-bottom: 123px;">
					
				</div>
			</div>
		</div>
	</div>
</div>	

		@yield('content')
 
		</div>
    <!--footer -->
    <footer class="footer" style="padding-bottom: 0px; margin-top: 40px;">
        <div class="container">
          <div class="">
            
             <!-- talent hub -->
            <div class="col-sm-2">
              <div class="heading-footer"><h4>Talent Hub</h4></div>
              <ul class="list-unstyled">
                <li><a href="{{ URL::to('categories_type', array('cate' => 'users.dance')) }}">Contest</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.art')) }}">Performances</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.music')) }}">Events</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.sports')) }}">Tutorial</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.fashion')) }}">Blog</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.wanderer')) }}">Trending</a></li>
              </ul>
            </div>
            <!-- Legal -->
            <div class="col-sm-2">
              <div class="heading-footer"><h4>Legal</h4></div>
              <ul class="list-unstyled">
                <li><a href="{{ URL::to('categories_type', array('cate' => 'users.dance')) }}">Terms & Condition</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.art')) }}">Promoter Agreement</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.music')) }}">Online harrasment</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.sports')) }}">Copyright policy</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.fashion')) }}">Blog</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.wanderer')) }}">Trending</a></li>
              </ul>
            </div>
            <!-- Help Centre-->
            <div class="col-sm-2">
              <div class="heading-footer"><h4>Help Centre</h4></div>
              <ul class="list-unstyled">
                <li><a href="{{ URL::to('categories_type', array('cate' => 'users.dance')) }}">FAQ'S</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.art')) }}">Contact us</a></li>
              </ul>
            </div>
            <!-- About us-->
            <div class="col-sm-2">
              <div class="heading-footer"><h4>About us</h4></div>
              <ul class="list-unstyled">
                <li><a href="{{ URL::to('categories_type', array('cate' => 'users.dance')) }}">About Itsshowtime</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.art')) }}">Promoters</a></li>
              </ul>
              <!-- Social -->
              <br>
              <div class="heading-footer"><h4>Follow us on</h4></div>
              <a class="btn btn-social-icon btn-twitter btn-lg">
                <i class="fa fa-twitter"></i>
              </a>
              <a class="btn btn-social-icon btn-facebook btn-lg">
                <i class="fa fa-facebook"></i>
              </a>
            </div>
            
            
            
            

            <!-- Categories -->
            <div class="col-sm-4">
              <div class="heading-footer"><h4 style="width: 20%;">Categories</h4></div>
              <ul class="list-unstyled col-md-6">
                <li><a href="{{ URL::to('categories_type', array('cate' => 'users.dance')) }}">Dance</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.art')) }}">Art</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.music')) }}">Music</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.sports')) }}">Sports</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.fashion')) }}">Fashion</a></li>
              </ul>
              <ul class="list-unstyled pull-left col-md-6">
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.wanderer')) }}">Wanderer</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.cooking')) }}">Cooking</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.unordinary')) }}">Unordinary</a></li>
                    <li><a href="{{ URL::to('categories_type', array('cate' => 'users.moviesandtheatre')) }}">Movies & Theater</a></li>
              </ul>
            </div>


          </div>
        </div><!-- /container -->
        <!-- Copyright -->
          <div class="row" style="background-color:#acacac;">
            <div class="container">
              <div class="col-sm-11 col-xs-10">
                <p class="copyright">© 2015 ItsShowTime. All rights reserved.</p>
              </div>
              <div class="col-sm-1 col-xs-2 text-right">
              </div>
            </div>
          </div><!-- /row -->
      </footer>
    <!-- footer end -->
<!--<script type="text/javascript">

$(document).ready(function(){
  $("body").on('submit', 'form[data-remote]', function(e){
    e.preventDefault();
    //  setInterval(function () {
     //  $(".comment-box").each(function() {
     //     $(this).load(location.href + " #" + $(this).prop("id"));

       // });
      
     // }, 5000);

    
    var form = $(this);
    var target = form.closest('div.comment-box');
        $.ajax({
          url: '{{url()}}/comments',
          type: 'POST',
          cache: false,
          data: form.serialize(),
          dataType: 'json',
          beforeSend: function(){

          },
          success: function(commentdata) { 
            //$(".comment-block").html(user);
            //alert(users);
            console.log(commentdata);
            var mar= commentdata.comment;
            var username = commentdata.user_id;
            var time = commentdata.created_at;
            var marid = commentdata.comment_id;
            var viewid = commentdata.view_id;
            var target_id = ".comment-view-"+viewid;
            console.log(target_id);
            $(target_id).append("<div class= \'comment-box-"+marid+"\'><a href=\'#\'><b>"+username+" </b>&nbsp;&nbsp;&nbsp;</a><span>"+mar+"<br></span><div class=\'com-details\'><div class=\'com-time-container\'>"+time+"</div></div></div><br>");
            $('.text-shift').val('');
              
            
          },
          error: function(xhr, textStatus, thrownError) {
              alert('ops Errore');
          }
       });
        
    });
}); 
</script>		-->
<script type="text/javascript">
  $.getScript('http://timschlechter.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.js',function(){

 
  
});
</script>
<style type="text/css">
  @import url('http://timschlechter.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css');

.input-group .bootstrap-tagsinput {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    width: 100%;
    margin-bottom: 1px;
}

</style>

	<script type="text/javascript">
   	$(document).ready( function(){
   		$('.close-button-mirror').click( function(){

   			$('.lightbox-8675896-overlay-mirror').hide();
   			$('.lightbox-8675896-mirror').hide();

   		});

   	});
    $(document).on('click', '.notiftarget', function(){
  		var id = $(this).data("id");
       	var model = $(this).data("model");
       	var token = '{{csrf_token()}}';

       	console.log(model);
       	

       	$.ajax({
          url: '{{url()}}/feedview',
          type: 'get',
          cache: false,
          data: {id: id, model: model, _token: token},
          dataType: 'json',
          beforeSend: function() { 
          },
          success: function(data) {  
          	//alert(data);
          	console.log(data);
          //	$('.notif-modal-wrapper').html(data);
          $('.lightbox-8675896-overlay-mirror').show();
   			$('.lightbox-8675896-mirror').show();
          var url = '{{url()}}';
          console.log(data);
          if(model == 'Picture')
          {

          	
          	$('#imagetragetnotif').removeClass('blockboxholder-video');
          	$('#imagetragetnotif').removeClass('blockboxholder-audio');
          	$('#imagetragetnotif').addClass('blockboxholder-picture');
          	$('.flowplayer').hide();
          	$('#imagetragetnotif').css('background-image', 'url("' + url +'/'+ data+'-original.")');

          }
          else if(model == 'Video')
          	{

          	$('#imagetragetnotif').css('background-image', 'none');
          	$('#imagetragetnotif').removeClass('blockboxholder-picture');
          	$('#imagetragetnotif').removeClass('blockboxholder-audio');
          	$('#imagetragetnotif').addClass('blockboxholder-video');
          	$('#imagetragetnotif').css('background-image', 'none');
          	$('.flowplayer').show();
          	$('#player').hide();
          	$('.flowplayer').flowplayer();
          	$('.webmvideo').attr('src',''+url+'/galleryvideo/webm/'+data+'.webm');
          	$('.mp4video').attr('src',''+url+'/galleryvideo/mp4/'+data+'.mp4');
          	$('.flvvideo').attr('src',''+url+'/galleryvideo/flv/'+data+'.flv');

          	//$('#imagetragetnotif').html('');
          	//$('#imagetragetnotif').html('<div class="flowplayer"><video><source type="video/webm" src ="'+url+'/galleryvideo/webm/'+data+'.webm"><source type="video/mp4" src ="'+url+'/galleryvideo/mp4/'+data+'.mp4"><source type="video/flv" src ="'+url+'/galleryvideo/flv/'+data+'.flv"></video></div>');

          }
          else if(model == 'Audio') {

          }
          else {

          }
         	

           

          

            
          },
          error: function(xhr, textStatus, thrownError) {
              alert('ops Errore');
          }
       });
	});
 
</script>   
       
       <script type="text/javascript">
   
   
  $(document).ready( function(){

  $('.attach').click(function(e){

        e.preventDefault();

        $.ajax({
          url: '{{url()}}/followuser',
          type: 'POST',
          cache: false,
          data: $('form.add').serialize(),
          dataType: 'json',
          beforeSend: function() { 
          },
          success: function(data) {  
           
              $("#follow").hide();
              $("#unfollow-mirror").show();
              $("#follow-mirror").hide();
              $("#unfollow").show();
            
          },
          error: function(xhr, textStatus, thrownError) {
              alert('ops Errore');
          }
       });
    
      });

   $('.detach').click(function(e){

        e.preventDefault();

        $.ajax({
          url: '{{url()}}/unfollowuser',
          type: 'post',
          cache: false,
          data: $('form.sub').serialize(),
          dataType: 'json',
          beforeSend: function() { 
          },
          success: function(data) {   
          $("#unfollow-mirror").hide(); 
          $("#follow").show();
          $("#unfollow").hide();
          $("#follow-mirror").show();

            
          },
          error: function(xhr, textStatus, thrownError) {
              alert('ops Errore');
          }
       });
    
      });
  


  });
  

 
</script>
<script type="text/javascript">
   
   
  $(document).ready( function(){

  

   $('.connect').click(function(e){

        e.preventDefault();

        $.ajax({
          url: '{{url()}}/connect',
          type: 'post',
          cache: false,
          data: $('form.connector').serialize(),
          dataType: 'json',
          beforeSend: function() { 

          },
          success: function(data) {  

            $('.connect-real').hide();
            $('.connect-mirror').show();
            $('.connect-feedback').delay(4000).fadeOut('slow');

          

            
          },
          error: function(xhr, textStatus, thrownError) {
              alert('ops Errore');
          }
       });
    
      });
  


  });
  

 
</script>
<script type="text/javascript">
   
   
  $(document).ready( function(){
   $('.connectnow').click(function(e){
        e.preventDefault();
        var dataid = $(this).children('.connect-yes').data("id");
        var target_id = ".connect-block-"+dataid;
        var foot_id = "#connect-footer-"+dataid;
        $.ajax({
          url: "{{url()}}/connectaccept",
          type: 'post',
          cache: false,
          data: $('form.connectyes').serialize(),
          dataType: 'json',
          beforeSend: function() { 
          },
          success: function(data) { 

            $(foot_id).empty().append("<div class='connect-success text-center'><a class=''>Thank you for connecting</a></div>");
            $(target_id).delay(4000).fadeOut('slow');

          

            
          },
          error: function(xhr, textStatus, thrownError) {
              alert('ops Errore');
          }
       });
    
      });
   $('.close-now').click(function(e){
        e.preventDefault();
        var dataid = $(this).children('.connect-no').data("id");
        var token = $(this).children('.connect-no').data("token");
        var target_id = ".connect-block-"+dataid;
        var foot_id = "#connect-footer-"+dataid;
        var data={_method:'delete',_token:token,id:dataid};
        $.ajax({
          url: "{{ URL::route('connect.destroy')}}",
          type: 'Post',
          cache: false,
          data: data,
          dataType: 'json',
          beforeSend: function() { 
            //console.log($('form.'+dataid).serialize());
          },
          success: function(data) { 

         // $(foot_id).empty().append("<div class='connect-success text-center'><a class=''>Thank you for connecting</a></div>");
          $(target_id).delay(1000).fadeOut('slow');

          

            
          },
          error: function(xhr, textStatus, thrownError) {
             
          }
       });
    
      });
  


  });
  

 
</script>
<script type="text/javascript">
   
  
  $(document).ready( function(){
    $("body").on("click", ".like-button", function() {
      var handle = $(this);
      url = '';

      // for picture likes 
      if (handle.data("model") == 'Picture')
       {
        if (handle.data("action") == 'like')
          url = '/likes';
        else url= '/diminish';
      }
      // for video likes
      else if(handle.data("model") == 'Video') 
      {
        if (handle.data("action") == 'like')
          url = '/likes';
        else url= '/diminish';
      }
      else if(handle.data("model") == 'Audio') 
      {
        if (handle.data("action") == 'like')
          url = '/likes';
        else url= '/diminish';
      }
      else if(handle.data("model") == 'Blog') 
      {
        if (handle.data("action") == 'like')
          url = '/likes';
        else url= '/diminish';
      }
      else if(handle.data("model") == 'Scout') 
      {
        if (handle.data("action") == 'like')
          url = '/likes';
        else url= '/diminish';
      }

      if (url.length < 1) return;
      url = '{{url()}}'+url;

      var data = {
        "_token": {{json_encode(csrf_token())}},
        "model": handle.data('model'),
        "current_id": handle.data('id'),
      };
      console.log($.param(data));

      $.ajax({
        url: url,
        type: 'POST',
        cache: false,
        data: $.param(data),
        dataType: 'json',
        success: function() {


          //console.log("success");
          var new_class = "." + handle.data("realclass");
          console.log(new_class);
          var new_action = handle.data("action") == 'like'? 'unlike' : 'like';
          var new_text = handle.data("action") == 'like'? 'Unlike' : 'Like';
          
          handle.data("action", new_action).children(".btntext").empty().append(new_text);
          if(new_text == 'Unlike'){
                    $(new_class).children('.fa').removeClass('fa-thumbs-up').addClass('fa-thumbs-down');
                }
                else{
                	  $(new_class).children('.fa').removeClass('fa-thumbs-down').addClass('fa-thumbs-up');
              
                }
        },
        error: function(jxhr, status) {
          alert("error: "+status);
        },
      });
    });
	
	$('#open-notif').on('click', function (e) {
		window.NotificationUpdater.fn.mark_all_as_read();
	});
  

   $('body').on('click', '.dropdown-menu .dplink-r, \
			.dropdown-menu .dplink-b, .dropdown-menu .slimScrollBar, \
			.dropdown-menu .slimScrollRail, .dropdown-menu .nf-placeholder, \
			.dropdown-menu .load-more', function(e) {
			e.stopPropagation();
		});


   setup_scrollbar(".scrollable-notif","#AAA","#CCC");

  });
  

	function setup_scrollbar(elemSelector, barColor, barRailColor)
	{
		$(elemSelector).slimScroll({
	    	width: "100%",
	        height: "100%",
	        alwaysVisible: true,
	        railVisible: true,
	        size: "12px",
	        opacity: .8,
	        railOpacity: .4,
	        color: barColor,
	        railColor: barRailColor
	    });
	}
 
</script>
		
	    
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	 <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
  <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/src/js/bootstrap-datetimepicker.js"></script>
	    {{HTML::script('/js/jquery.slimscroll.mod.min.js')}}
	    {{HTML::script('/js/notification-updater-2.js')}}
  {{ HTML::script('/js/audio.js') }}
  {{HTML::script('/js/typeahead.jquery.js')}}
  @include('usersearch.temp')
  <script type="text/javascript">
            $(function () {
            $('#datetimepicker1').datetimepicker({
               
            });
        });
        </script>
        <script type="text/javascript">
            $(function () {
            $('#datetimepicker2').datetimepicker({
               
            });
        });
        </script>
        {{ HTML::script('/js/notification-updater.js') }}
        <script type="text/javascript">
       
        NotificationUpdater.settings.target_class_name = "notification";
        //NotificationUpdater.settings.url = "{{url('userfeeds')}}";
        //NotificationUpdater.settings.csrf_token = '{{ csrf_token() }}';

        NotificationUpdater2.settings.url = "{{url('userfeeds2')}}";
        NotificationUpdater2.settings.csrf_token = '{{ csrf_token() }}';
        
        /* 
        $.ajax({url: '/userfeeds', dataType: 'json', method: 'POST', data: {_token: '{{ csrf_token() }}', test: 'hello', },
        	success: function(response) {
        		console.log(response);
        	},}); */
        </script>
        
        </body>
</html>