
@extends('master')

@section('title', 'Blog')

@section('content')

<div class="row">
  <div class="col-md-8">
      <div id="main-single-content">
            <img src="{{url()}}/blogposter/{{$blog->blogposter}}.jpg" class="img-responsive">
            <div class="content-single">
              <h2>{{$blog->title}}</h2>
              <div class="tag">
              <p id="bloglike">
                <a class="likebutton" data-model="Blog" data-id="{{$blog->id}}" data-action="{{isset($blog)?'unlike':'like'}}"><i class="fa fa-thumbs-down"></i> &nbsp;<span class="btntext">{{isset($blog)?'Unlike':'Like'}}</span></a>
                
                <a href=""><i class="ca fa fa-comments"></i> Comments</a>
              </p>
                <p> 
                  <span><i class="fa fa-user" data-original-title="" title=""></i> <a href="#">{{Sentry::findUserById($blog->user_id)->name}}</a></span> 
                  <i class="fa fa-circle" data-original-title="" title=""></i> 
                  <span><i class="fa fa-calendar" data-original-title="" title=""></i> <a href="#">{{$blog->created_at->toFormattedDateString()}}</a></span>
                  <i class="fa fa-circle" data-original-title="" title=""></i>
                  <span><i class="fa fa-tag" data-original-title="" title=""></i> <a href="#">Acesories</a>, <a href="#">Furniture</a></span>
                  
                  
                </p>
              </div>
              <div class="hr-single"></div>
              {{$blog->body}}
              <!-- start:comments -->
              
              <!-- end:comments -->
            </div>
          </div>
  </div>
  <div class="col-md-4">
      <!-- start:sidebar -->
                              <div id="sidebar">
                                    <!-- start:widget recent post -->
                                    <div class="widget-sidebar">
                                          <h3 class="title-widget-sidebar">
                                                 RECENT ARTICLE
                                          </h3>
                                          <div class="content-widget-sidebar">
                                                <ul>
                                                @foreach($sidebarblogs as $sidebarblog)
                                                      <li class="recent-post">
                                                            <div class="thumbnail">
                                                                  <img src="{{url()}}/blogposter/{{$sidebarblog->blogposter}}.jpg" class="img-responsive">
                                                            </div>
                                                            <a href="{{url()}}/blog/{{$sidebarblog->id}}"><h5>{{$sidebarblog->title}}</h5></a>
                                                            <p><small><i class="fa fa-calendar"></i> {{$sidebarblog->created_at->toFormattedDateString()}}</small></p>
                                                      </li>
                                                      <hr>
                                                @endforeach
                                                      
                                                </ul>
                                          </div>
                                    </div>
                                    <!-- end:widget recent post -->
                                    
                                    <!-- start:categories -->
                                    <div class="widget-sidebar">
                                          <h3 class="title-widget-sidebar">
                                                CATEGORIES
                                          </h3>
                                          <div class="content-widget-sidebar">
                                                <ul>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Dance</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Art</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Music</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Sports</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Fashion</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Wanderer</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Cooking</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Unordinary</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      <li class="categories">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  Movies and Theatre</h5>
                                                            </a>
                                                      </li>
                                                </ul>
                                          </div>
                                    </div>
                                    <!-- end:categories -->
                                    <!-- start:widget archive -->
                                    <div class="widget-sidebar">
                                          <h3 class="title-widget-sidebar">
                                                ARCHIVES
                                          </h3>
                                          <div class="content-widget-sidebar">
                                                <ul>
                                                      <li class="archive">
                                                            <a href="#">
                                                                  <h5><i class="fa fa-angle-double-right"></i>
                                                                  July 2014</h5>
                                                            </a>
                                                      </li>
                                                      <hr>
                                                      
                                                </ul>
                                          </div>
                                    </div>
                                    <!-- end:archive -->
                                    <!-- start:Subcribe Newslatter -->
                                    <div class="widget-sidebar">
                                          <h3 class="title-widget-sidebar">
                                                 SUBCRIBE NEWSLETTER
                                          </h3>
                                          <div class="content-widget-sidebar">
                                                <p class="content-footer">
                                                      Excepteur culpa qui officia deserunt mollit anim id est laborum.
                                                </p>
                                                <form role="form">
                                                      <div class="form-group">
                                                            <div class="input-group">
                                                                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                                  <input type="text" class="form-control" placeholder="Username">
                                                            </div>
                                                      </div>
                                                      <div class="form-group">
                                                            <a href="#" class="btn btn-default">REGISTER</a>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                                    <!-- end:Subcribe Newslatter -->
                              </div>
                              <!-- end:sidebar -->
  </div>
</div>

<script type="text/javascript">

  $(document).ready(function(){
    $("body").on("keydown",".commentform", function(e){
      
      if (e.keyCode == 13)
        if (!e.shiftKey) $(this).submit();     

    });
    

  }); 
</script>
<script type="text/javascript">

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
            var target_id = ".comment-view";
            //alert(time);
            $(target_id).append("<div class= \'comment-box-"+marid+"\'><a href=\'#\'><b>"+username+" </b>&nbsp;&nbsp;&nbsp;</a><span>"+mar+"<br></span><br><div class=\'com-details\'><div class=\'com-time-container\'>"+time+"</div></div></div>");
            $('.text-shift').val('');
              
            
          },
          error: function(xhr, textStatus, thrownError) {
              alert('ops Errore');
          }
       });
        
    });
}); 
</script>
<!--
<script type="text/javascript">
   
   
  $(document).ready( function(){
    $("body").on("click", ".likebutton", function() {
      var handle = $(this);
      url = '';

      
      // for other likes
      if (handle.data("model") == 'Blog') {
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
          //$('.likebutton').children('.fa').removeClass('fa-thumbs-up').addClass('fa-thumbs-down');

        },
        error: function(jxhr, status) {
          alert("error: "+status);
        },
      });
    });

  

   


  });
  

 
</script>-->
@stop