<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta name="description" content="">
		<meta name="author" content="">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>@yield('title') - IST</title>

	    <!-- Bootstrap -->
	    <link rel="stylesheet" type="text/css" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
	   
	    <link rel="stylesheet" href="/css/bootstrap.min.css" />
	    <link rel="stylesheet" type="text/css" href="/css/style.css">
	    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	    <link href="/css/SimpleSlider.css" rel="stylesheet" type="text/css">
	    {{ HTML::script('/js/dropzone.js') }}
	    {{ HTML::style('/css/dropzone.css') }}
		 <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
		<!-- below script required for flowplayer -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
		<script src="/js/Am2_SimpleSlider.js" type="text/javascript"></script>
		

		<!-- 1. skin -->
<link rel="stylesheet" href="//releases.flowplayer.org/5.5.2/skin/minimalist.css">

<!-- js

<script src="http://releases.flowplayer.org/js/flowplayer-3.2.13.min.js"></script> -->
 
 
<!-- 3. flowplayer -->
<script src="//releases.flowplayer.org/5.5.2/flowplayer.min.js"></script>
{{ HTML::script('/js/audio.js') }}
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	    

	</head>
	<body>
		<header>
			<nav class="navbar navbar-default" role="navigation">
		  	<div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="/">IST IST IST</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav">
			      	
		      	</ul>
			      	<ul class="nav navbar-nav navbar-right">
			      	 @if (Sentry::check())
			      	 	<li class="{{ set_active('/') }}"><a href="/"><i class="fa fa-home"></i> Home</a></li>
			      	 	<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories <span class="caret"></span></a>
				          <ul class="dropdown-menu dropdown-menu-edited" role="menu">
				            <li><a href="#">Dance</a></li>
				            <li><a href="#">Art</a></li>
				            <li><a href="#">Music</a></li>
				            <li><a href="#">Sports</a></li>
				            <li><a href="#">Fashion</a></li>
				            <li><a href="#">Wanderer</a></li>
				            <li><a href="#">Cooking</a></li>
				            <li><a href="#">Unordinary</a></li>
				            <li><a href="#">Movies & Theater</a></li>
				          </ul>
				        </li>
				        <li class="{{ set_active('/') }}"><a href="/scout">Scout Talent</a></li>
				        <li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Talent Hub <span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
				            <li><a href="#">Contest</a></li>
				            <li><a href="#">Performances</a></li>
				            <li><a href="#">Events</a></li>
				            <li><a href="#">Tutorial</a></li>
				            <li><a href="#">Blog</a></li>
				            <li><a href="#">Trending</a></li>
				          </ul>
				        </li>
				        
				        <li> 
				        	<form class="search-container" action="#">
							  <input id="search-box" type="text" class="search-box" name="q" />
							  <label for="search-box"><i class="fa fa-search search-icon"></i></label>
							  <input type="submit" id="search-submit" />
							</form>
						</li>
						<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
				          	
							  <i class="fa fa fa-bolt"></i>
							
				          </a>

	 						<ul class="dropdown-menu dropdown-menu-notification" role="menu">
				            <li>
				            	<div class="notification">
				            	
				            	</div>
				            </li>
				            <div class="see-more-block">
				            	<a href="">See All</a>
				            </div>
				          </ul>
				        </li>
				        <li class="dropdown">
				          <a href="#" id ="menubar-avatar" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	 						{{ HTML::image(Sentry::getUser()->profileimage , 'profile picture', array('class' => 'img-circle avatar')) }}	</a>
				          <ul class="dropdown-menu" role="menu">
				            <li><a href="#">Your Profile</a></li>
				            <li><a href="#">Invite a Friend</a></li>
				            <li><a href="#">Account Settings</a></li>
				            <li><a href="#">Connect</a></li>
				            <li><a href="#">Help</a></li>
				            <li><a href="#">Signout</a></li>
				          </ul>
				        </li>

				       
					@else
						<li class="{{ set_active('/') }}"><a href="/"><i class="fa fa-home"></i></a></li>
			      	 	<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories <span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
				            <li><a href="#">Dance</a></li>
				            <li><a href="#">Art</a></li>
				            <li><a href="#">Music</a></li>
				            <li><a href="#">Sports</a></li>
				            <li><a href="#">Fashion</a></li>
				            <li><a href="#">Wanderer</a></li>
				            <li><a href="#">Cooking</a></li>
				            <li><a href="#">Unordinary</a></li>
				            <li><a href="#">Movies & Theater</a></li>
				          </ul>
				        </li>
				        <li class="{{ set_active('/') }}"><a href="/">Signup</a></li>
				        <li class="{{ set_active('/') }}"><a href="/">Login</a></li>
				        <li> 
				        	<form class="search-container" action="#">
							  <input id="search-box" type="text" class="search-box" name="q" />
							  <label for="search-box"><i class="fa fa-search search-icon"></i></label>
							  <input type="submit" id="search-submit" />
							</form>
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
<div class="notification">
	
</div>
		<div class="container">
		 
		@yield('content')
 
		</div>
		
<script type="text/javascript">

document.addEventListener("click", function(){
    document.getElementById("search-submit")},true);

	    </script>
	    <script type="text/javascript">
         $('.gallery-img').Am2_SimpleSlider();
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
    $("body").on("click", ".likebutton", function() {
      var handle = $(this);
      url = '';

      // for picture likes 
      if (handle.data("model") == 'Picture') {
        if (handle.data("action") == 'like')
          url = '/likes';
        else url= '/diminish';
      }
      // for other likes
      else if(handle.data("model") == 'Blog') {
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
          var new_action = handle.data("action") == 'like'? 'unlike' : 'like';
          var new_text = handle.data("action") == 'like'? 'Unlike' : 'Like';
          handle.data("action", new_action).children(".btntext").empty().append(new_text);
        },
        error: function(jxhr, status) {
          alert("error: "+status);
        },
      });
    });

  

   


  });
  

 
</script>
		
	    
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	 <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
  <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/src/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript">
            $(function () {
            $('#datetimepicker1').datetimepicker({
               
            });
        });
        </script>
        {{ HTML::script('/js/notification-updater.js') }}
        <script type="text/javascript">
       
        NotificationUpdater.settings.target_class_name = "notification";
        NotificationUpdater.settings.url = "{{url('userfeeds')}}";
        NotificationUpdater.settings.csrf_token = '{{ csrf_token() }}';
        
        /* 
        $.ajax({url: '/userfeeds', dataType: 'json', method: 'POST', data: {_token: '{{ csrf_token() }}', test: 'hello', },
        	success: function(response) {
        		console.log(response);
        	},}); */
        </script>
        </body>
</html>