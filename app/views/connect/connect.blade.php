@extends('master')

@section('title', 'connect')

@section('content')


<div class="row">
<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-pills centertab" role="tablist">
    <li role="presentation" class="active"><a href="#connected" aria-controls="connected" role="tab" data-toggle="tab">Connected</a></li>
    <li role="presentation"><a href="#connectrequest" aria-controls="connectrequest" role="tab" data-toggle="tab">Connect request ({{$connect_count}})</a></li>
   </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="connected">
         
         <div class="col-md-8">
        @foreach($connected_user as $connecteddata)
            <div class="col-md-6">
                <div class="connect-block">
                    <div class="connect-header">
                      <img src ="{{url()}}/{{Sentry::findUserById($connecteddata->user_id)->profileimage}}" class="img-circle ">
                      <div class="connect-info-block"> 
                        <div class="connect-name text-capitalize">{{Sentry::findUserById($connecteddata->user_id)->name}}</div>
                        <div class="connect-title text-muted">
                            {{Sentry::findUserById($connecteddata->user_id)->titlea}}&nbsp;
                            {{Sentry::findUserById($connecteddata->user_id)->titleb}}&nbsp;
                            {{Sentry::findUserById($connecteddata->user_id)->titlec}}&nbsp;
                        </div>
                      </div>
                      <div class="connect-date text-muted">{{$connecteddata->created_at->diffForHumans()}}</div>
                    
                    </div><!-- connect header block -->
                    <div class="connect-footer" style="width: 100%;">

                      <div class="connect-text pull-right" style="font-size: 14px;">


                       <c class="pull-right" style="padding-right: 8px;"> Connected <i class="fa fa-check-circle-o" style="color:#00B16A;"></i></c>
                      </div>

                    </div> <!-- connect footer block -->  
                </div> 
            </div><!-- md- 6 -->
        @endforeach
        @foreach($connected_pending as $connectedpendingdata)
            <div class="col-md-6">
                <div class="connect-block">
                    <div class="connect-header">
                      <img src ="{{url()}}/{{Sentry::findUserById($connectedpendingdata->user_id)->profileimage}}" class="img-circle ">
                      <div class="connect-info-block"> 
                        <div class="connect-name text-capitalize">{{Sentry::findUserById($connectedpendingdata->user_id)->name}}</div>
                        <div class="connect-title text-muted">
                            {{Sentry::findUserById($connectedpendingdata->user_id)->titlea}}&nbsp;
                            {{Sentry::findUserById($connectedpendingdata->user_id)->titleb}}&nbsp;
                            {{Sentry::findUserById($connectedpendingdata->user_id)->titlec}}&nbsp;
                        </div>
                      </div>
                      <div class="connect-date text-muted">{{$connectedpendingdata->created_at->diffForHumans()}}</div>
                    
                    </div><!-- connect header block -->
                    <div class="connect-footer" style="width: 100%;">

                      <div class="connect-text  pull-right" style="font-size: 14px;">


                       <c class="pull-right" style="padding-right: 8px;"> Waiting for reply <i class="fa fa-clock-o" style="color:#f18c1c;"></i></c>
                      </div>

                    </div> <!-- connect footer block -->  
                </div> 
            </div><!-- md- 6 -->
        @endforeach
    </div><!-- md 8 -->
    <div class="col-md-4">
      
    </div><!-- md 4 -->
    </div>
    <div role="tabpanel" class="tab-pane" id="connectrequest">
      
           <div class="col-md-8">
        @foreach($connect_status as $connectdata)
            <div class="col-md-6">
                <div class="connect-block-{{$connectdata->id}} connect-block">
                    <div class="connect-header">
                      <img src ="{{url()}}/{{Sentry::findUserById($connectdata->user_id)->profileimage}}" class="img-circle ">
                      <div class="connect-info-block"> 
                        <div class="connect-name">{{Sentry::findUserById($connectdata->user_id)->name}}</div>
                        <div class="connect-title text-muted">
                            {{Sentry::findUserById($connectdata->user_id)->titlea}}&nbsp;
                            {{Sentry::findUserById($connectdata->user_id)->titleb}}&nbsp;
                            {{Sentry::findUserById($connectdata->user_id)->titlec}}&nbsp;
                        </div>
                      </div>
                      <div class="connect-date text-muted">{{$connectdata->created_at->diffForHumans()}}</div>
                    
                    </div><!-- connect header block -->
                    <div class="connect-footer" id="connect-footer-{{$connectdata->id}}">

                      <div class="connect-text text-capitalize">


                        {{Sentry::findUserById($connectdata->user_id)->name}} wants to connect.
                        
                      </div>

                      {{ Form::open(array('route' => 'connectaccept','id'=> '','class'=>'connectyes')) }}
                      {{Form::hidden('connect_id',$connectdata->id)}}
                      {{Form::hidden('status','2')}}
                      <a class="connectnow">
                      <div class="connect-yes" data-id="{{$connectdata->id}}">
                        <i class="fa fa-check"></i>
                      </div>
                      </a>
                      {{ Form::close()}}
                      {{ Form::open(array('method'=>'DELETE', 'route'=>array('connect.destroy', $connectdata->id))) }}
                      <a class="close-now close-now-{{$connectdata->id}}" >
                      <div class="connect-no" data-id="{{$connectdata->id}}" data-token="{{csrf_token()}}">
                      <i class="fa fa-times"></i>
                      </div>
                      </a>
                      {{ Form::close()}}
                    </div> <!-- connect footer block -->  
                </div> 
            </div><!-- md- 6 -->
        @endforeach
    </div><!-- md 8 -->
    <div class="col-md-4">
      
    </div><!-- md 4 -->
    </div>
  </div>

</div>
    
</div>

@stop