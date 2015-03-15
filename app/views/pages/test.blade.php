 @extends('master')

@section('title', 'Profile')

@section('content')
<!-- ****** Display profile image,name and other suff ***** -->
<div class="row">
  @include('partials._profiledisplay')
</div>
<div class="row">
  <div class="col-md-12 centered-pills">
    <div class="sub-nav-block">
      <ul class="nav nav-pills">
        <li role="navigation" class="active"><a href="#photo" aria-controls="photo" role="tab" data-toggle="tab">Photo</a></li>
        <li role="navigation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Video</a></li>
        <li role="navigation"><a href="#audio" aria-controls="audio" role="tab" data-toggle="tab">Audio</a></li>
        <li role="navigation"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">Recent Activity</a></li>
        <li role="navigation"><a href="#blog" aria-controls="blog" role="tab" data-toggle="tab">Blog</a></li>
        <li role="navigation"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
      </ul>
    </div>
    <div class="tab-content">
    <div class="clearfix"></div>
      <div role="tabpanel" class="tab-pane active" id="photo" >
        <span class="album-block">
          <h3 class="pull-left"> <i class="fa fa-file-image-o"></i> Photos</h3>
        </span>
        <div class="col-md-8">
          <div class="row">
          @foreach($album_images as $albumimage)
            <li class="gallery-img col-md-4">
              {{HTML::image($albumimage->picturename)}}

              <span data-title = "{{$albumimage->picturetitle}}"></span>
              <div data-desc = "{{$albumimage->picturedescription}}"></div>
              <a class="likebutton" data-model="Picture" data-id="{{$albumimage->id}}" data-action="{{isset($albumimage->liked)?'unlike':'like'}}"><i class="fa fa-star-o"></i>&nbsp;<span class="btntext">{{isset($albumimage->liked)?'Unlike':'Like'}}</span></a>
        
               </li>
                @endforeach
          </div> 
        </div>
        <div class="col-md-4">
          User review block ----------------------
        </div>       
      </div>
      <div role="tabpanel" class="tab-pane" id="video">2...</div>
      <div role="tabpanel" class="tab-pane" id="audio">3...</div>
      <div role="tabpanel" class="tab-pane" id="recent">4...</div>
      <div role="tabpanel" class="tab-pane" id="blog">2...</div>
      <div role="tabpanel" class="tab-pane" id="about">3...</div>
    </div>
  </div>
</div>
<div class="row">
	<div class="col-md-12">
		 
          




	</div>
</div>


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