@extends('master')

@section('title', 'Blog')

@section('content')


<div class="row">

	<div class="col-md-12">
		<span>	<h2>{{$blog->title}}</h2></span>
		<span>Posted On: {{$blog->created_at->toFormattedDateString();}}</span>

		<span>Posted by: {{Sentry::findUserById($blog->user_id)->name}}</span>
		<span> <h4>{{$blog->body}}</h4></span>	
		<a class="likebutton" data-model="Blog" data-id="{{$blog->id}}" data-action="{{isset($blog)?'unlike':'like'}}"><i class="fa fa-star-o"></i>&nbsp;<span class="btntext">{{isset($blog)?'Unlike':'Like'}}</span></a>
        <div class="comment-box">
              <div class="comment-view refresh"  >
                {{-- */ $i = 0; /* --}}
              @foreach($commented as $comments)
              
              <div class="comment-block-{{$comments->id}}">
                  <a href="#"> <b>{{Sentry::findUserById($comments->user_id)->name}}&nbsp;&nbsp;&nbsp;</b></a>
                  <span>{{$comments->comment}}<br></span><br>
                  <div class="com-details">
                  <div class="com-time-container">
                  {{ $comments->created_at->diffForHumans() }} ·
                  </div>
                  </div>
                </div>
              @endforeach
                
              </div>
              

              {{ Form::open(['data-remote','route' => 'comments.store','class'=>'commentform' ]) }}
              {{Form::hidden('blog_id',$blog->id)}}
              {{Form::hidden('model','Blog')}}
              <div class="form-group">
                {{ Form::textarea('commentbody', null, ['placeholder' => 'Write a comment... ','rows' => '4', 'class' => 'form-control text-shift', 'required' => 'required'])}}
                {{ errors_for('commentbody', $errors) }}
              </div>
              <!-- Submit field -->
              <div class="form-group">
                {{ Form::submit('comment', ['class' => 'btn btn-md btn-default btn-block']) }}

              </div>
                {{ Form::close() }}
                </div>
              

          </div> 
        </div>      
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
        },
        error: function(jxhr, status) {
          alert("error: "+status);
        },
      });
    });

  

   


  });
  

 
</script>
@stop