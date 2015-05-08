<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<script src="//code.jquery.com/jquery-1.9.1.js"></script> 
  <head>
      <meta charset="utf-8">
      <meta name="description" content="">
    <meta name="author" content="">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title') - IST</title>

      <!-- Bootstrap -->
      {{HTML::style('/css/bootstrap.min.css')}}
      {{HTML::style('/css/style.css')}}
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/blackboard.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.min.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.min.js"></script>

<!-- include summernote css/js-->
<link href="" rel="stylesheet">
<script src=""></script>
{{HTML::style('/css/summernote.css')}}
      {{HTML::script('/summernote.min.js')}}
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 200
        });
    });
</script>
      
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      

  </head>
  <body>
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
                <li class="{{ set_active('/') }}"><a href="/">Scout Talent</a></li>
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
                  <a href="#" id ="menubar-avatar" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ HTML::image(Sentry::getUser()->profileimage , 'profile picture', array('class' => 'img-circle avatar')) }} </a>
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


          <!--  <ul class="nav navbar-nav navbar-right">
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
     
    @yield('content')
 
    </div>
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

document.addEventListener("click", function(){
    document.getElementById("search-submit")},true);
      </script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
      
  </body>
</html>