  @extends('master')

@section('title', 'Profile')

@section('content')
<!-- ****** Display profile image,name and other suff ***** -->
<div class="row">
	<div class="col-md-8">
		<div class="scout-wrapper">
              	{{ HTML::image($scoutview->scoutposter , 'profile picture', array('class' => 'img-thumbnail pull-left','id'=>'postersize')) }}
                  <span>Title : {{$scoutview->scouttitle}}</span><br>
                  <span>Date and Time : {{Carbon\Carbon::parse($scoutview->scoutdatetime)->toDayDateTimeString()}}</span><br>
                  <span>duration : {{$scoutview->scoutduration}}</span><br>
                  <span>renumeration : {{$scoutview->renumeration}}</span><br>
                  <span>venue : {{$scoutview->venue}}</span><br>
                  <span>skills : {{$scoutview->skills}}</span><br>
                  <span>scoutdescription : {{$scoutview->scoutdescription}}</span><br>
                  <span>artistdescription : {{$scoutview->artistdescription}}</span><br>
                  <span>posted around - {{$scoutview->created_at->diffForHumans()}}</span><br>
              </div> 
 <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalapply">
          Apply
        </button>
<!-- Modal -->
      <div class="modal fade" id="myModalapply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                 {{ Form::open(['route' => 'scoutpublished','files' => 'true' ,'class'=>'vid_form']) }}
                      <fieldset>
              {{ Form::hidden('scout_id', $scoutview->id) }}
              {{ Form::hidden('applied', 'YES') }}

            	<div class="form-group">
					Select any Album
					{{Form::select('image', $image_list)}}
				</div>

				<div class="form-group">
					Select any Album
					{{Form::select('video', $video_list)}}
				</div>

				<div class="form-group">
					Select any Album
					{{Form::select('audio', $audio_list)}}
				</div>

              <!-- Submit field -->
              <div class="form-group">
                {{ Form::submit('Upload Video', ['class' => 'btn btn-md btn-success btn-block videobutton']) }}
              </div>



              </fieldset>
                {{ Form::close() }}

            </div><!-- modal boxy end !-->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div><!-- video modal end !-->          
	</div>
	<div class="col-md-4">
		
	</div>
</div>

@stop