<style type="text/css">
.connect {
}
  .connect-feedback {
    display: inline-block;
    background-color: #f2f2f2;
    color: #f18c1c;
    padding: 0px 4px;
  }
  .hide {
    display: none;
  }
</style>
@if($connected == 'NULL')
@if($connect_request == 'NULL')
{{ Form::open(array('route' => 'connect.store','id'=> '','class'=>'connector')) }}
          {{Form::hidden('connect_id',$userprofile->id)}}
          <a class="connect connect-real" ><i class="fa fa-plus"></i> Connect </a>
          <a class="connect connect-mirror text-muted " style="display:none;" ><i class="fa fa-user-plus"></i> Connect <span style=""  class="connect-feedback ">your request had been sent to {{$userprofile->name}}!</span></a>
          
          {{ Form::close()}}
@else

<a class=" text-muted" ><i class="fa fa-plus"></i> Connect </a>
@endif


@else

<a class=" text-muted" ><i class="fa fa-plus"></i> Connected </a>

@endif

