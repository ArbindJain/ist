
@extends('master')

@section('title', 'Blog')

@section('content')

<div class="row">
  <div class="col-md-8">
      <div id="main-single-content">
            <img src="{{url()}}/blogpostergallery/{{$blog->blogposter}}" class="img-responsive">
            <div class="content-single">
              <h2>{{$blog->title}}</h2>
              <div class="tag">
              <p id="bloglike">
              <!-- Like and Unlike Button For blog
======================================-->
  <a class="likebutton-{{$blog->id}}Blog like-button" data-realclass="likebutton-{{$blog->id}}Blog" data-model="Blog" data-id="{{$blog->id}}" data-iconclass="{{isset($liked)?'fa fa-thumbs-down':'fa fa-thumbs-up'}}" data-action="{{isset($liked)?'unlike':'like'}}">
    <i class="{{isset($liked)?'fa fa-thumbs-down':'fa fa-thumbs-up'}}"></i>
    &nbsp;
    <span class="btntext">{{isset($liked)?'Unlike':'Like'}}</span>
  </a>
<!-- EndLike and Unlike Button For blog
======================================-->
                <a href=""><i class="ca fa fa-comments"></i> Comments</a>
              </p>
                <p> 
                  <span><i class="fa fa-user" data-original-title="" title=""></i> <a href="#">{{Sentry::findUserById($blog->user_id)->name}}</a></span> 
                  <i class="fa fa-circle" data-original-title="" title=""></i> 
                  <span><i class="fa fa-calendar" data-original-title="" title=""></i> <a href="#">{{$blog->created_at->toFormattedDateString()}}</a></span>
                  <i class="fa fa-circle" data-original-title="" title=""></i>
                  <span><i class="fa fa-tag" data-original-title="" title=""></i> 
                  @foreach($tags as $tag)
                  <a  class="text-capitalize" href="#">{{$tag->name}} </a>,
                  @endforeach</span>
                  
                  
                </p>
              </div>
              <div class="hr-single"></div>
              {{$blog->body}}
              <!-- start:comments -->

                <h3 style="">Comments</h3>
                <hr>
                <div class="comment-box-blog">
            <div class="comment-view-{{$blog->id}} comment-feed comment-view-blog refresh"  >

              
              @foreach($commented as $comments)
              <div class="comment-block-{{$comments->id}}" style="padding: 10px 5px;">
              <div class="comment-infoblk pull-left">
                <img src="{{url()}}/{{Sentry::findUserById($comments->user_id)->profileimage}}" class="pull-left avatar img-circle" style="margin-right: 8px;">
                
                <div class="com-details" style="display:inline-block;">
                <a href="#"> <b>{{Sentry::findUserById($comments->user_id)->name}}&nbsp;&nbsp;&nbsp;</b></a>
                <div class="com-time-container">
                  {{ $comments->created_at->diffForHumans() }}
                </div>
                </div>
              </div>
              <div class="commentdata-block" style="padding-left:140px;">
                {{$comments->comment}}
              </div>
                
              </div>
              <hr>
              @endforeach

              <div class="clearfix"></div>
            </div>
            <div class="inputbox-blog">
              {{ Form::open(['data-remote','route' => 'comments.store','class'=>'commentform' ]) }}
              {{Form::hidden('blog_id',$blog->id)}}
              {{Form::hidden('model','Blog')}}
              <div class="form-group">
              {{ Form::textarea('commentbody', null, ['placeholder' => 'Write a comment... ','rows' => '4', 'class' => 'form-control text-shift', 'required' => 'required'])}}
              {{ errors_for('commentbody', $errors) }}

              </div>

              {{ Form::submit('comment', ['class' => 'btn btn-md btn-default ']) }}
              {{ Form::close() }}
              </div>
          </div>
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
                                                                  <img src="{{url()}}/blogpostergallery/{{$sidebarblog->blogposter}}" class="img-responsive">
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
            var userimage = commentdata.user_image;
            var target_id = ".comment-view-"+viewid;
            console.log(target_id);
            
            $(target_id).append("<div class= \'comment-block-"+marid+"\' style=\'padding: 10px 5px;\'><div class=\'comment-infoblk pull-left\'><img src=\'{{url()}}/"+userimage+"\' class=\'pull-left avatar img-circle\' style=\'margin-right: 8px;\'><div class =\'com-details\' style =\'display:inline-block;\'><a href=\'#\'><b>"+username+" </b>&nbsp;&nbsp;&nbsp;</a><div class=\'com-time-container\'>"+time+"</div></div></div><div class=\'commentdata-block\' style=\'padding-left:140px;\'>"+mar+"</div></div><hr><div class=\'clearfix\'></div>");
            
            $(target_id).scrollTop($(target_id)[0].scrollHeight);
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