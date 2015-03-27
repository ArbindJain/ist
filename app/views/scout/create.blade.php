@extends('masterdatepick')

@section('title', 'Profile')

@section('content')

<!-- ****** Display profile image,name and other suff ***** -->
<style>

/*************-------------Menu Bar Code Only--------------*******************/
.dropdown-menu-edited {
  min-width:auto;
  width:600px;
}

.dropdown-menu-edited li  {
  min-width:auto;
  width:20%;
  float:left;        
}

.dropdown-menu-edited li a {
  
  }

.avatar {
  width: 32px;
  height: 32px;
}

#size{
  width: 120px;
  height: 120px;
}

.search-container {
  margin-right: -75px;

}
.search-box {
  -webkit-transition: width 0.6s, border-radius 0.6s, background 0.6s, box-shadow 0.6s;
  transition: width 0.6s, border-radius 0.6s, background 0.6s, box-shadow 0.6s;
  width: 40px;
  height: 40px;
  border: none;
  cursor: pointer;
  margin-top:12px;
}

.search-box + label .search-icon {
  color: black;
}

.search-box:hover {
  color: black;
/*background: #c8c8c8;
  box-shadow: 0 0 0 5px #3d4752;
  box-shadow: 0 0 0 0px #3d4752;*/

}

.search-box:hover + label .search-icon {
  color: black;
}

.search-box:focus {
  -webkit-transition: width 0.6s cubic-bezier(0, 1.22, 0.66, 1.39), border-radius 0.6s, background 0.6s;
  transition: width 0.6s cubic-bezier(0, 1.22, 0.66, 1.39), border-radius 0.6s, background 0.6s;
  border: none;
  outline: none;
  box-shadow: none;
  padding-left: 15px;
  cursor: text;
  width: 300px;
  border-radius: auto;
  background: #ebebeb;
  color: black;
}

.search-box:focus + label .search-icon {
  color: black;
}

.search-box:not(:focus) {
  text-indent: -5000px;
}

#search-submit {
  position: relative;
  left: -5000px;
}

.search-icon {
  position: relative;
  left: -30px;
  color: white;
  cursor: pointer;
}
#menubar-avatar {
  padding: 14px 15px !important;
}
.navbar{
  border-bottom: 3px solid #eeeeee;
}

/*************-------------profile Bar Code (next bar after menu)--------------*******************/
.profile-main-block{
  padding-left: 70px;
  margin-bottom: 20px;
}
.name-block{
  display: block;
  margin-left: 30px;
  margin-top: 5px;
}
.name-space {
  display: block;
  margin-bottom: 5px;
}
.link-block {
  display: block;
  margin-top: 27px;
  margin-left: 30px;
}
.com-time-container{
  text-align: left;
}
.centered-pills { text-align:center; }
.centered-pills ul.nav-pills { display:inline-block; }
.tabnav li { display: inline; }
* html .centered-pills ul.nav-pills { display:inline; } /* IE6 */
*+html .centered-pills ul.nav-pills { display:inline; } /* IE7 */

.sub-nav-block {
  display: block;
  border-bottom: 2px solid #ececec;
}
.album-block{
  display: block;
  width: 100%;
  overflow: hidden;
  margin-bottom: 10px;
  margin-left: 17px;
}
.tab-content {
  display: block;
  margin: 10px 50px;
}

/* --------------- follow button css  ---------------*/
#follow-mirror  {
  display: none;
}
#unfollow-mirror{
  display: none;
}
/*----------------- Like button css ------------------*/
#like-mirror {
  display: none;
}
#dislike-mirror{
  display: none;
}
/*---------------Comment Block style ---------------*/
.comment-block{
  display: block;
  padding: 4px 0px;
}
/*--------------Flow Player ----------------------*/
.flow-player{
  width:200px;
  height: 200px;
}



  #size1{
    display: block;
    width: 40px;
    height: 40px;
  }
  .user-details{
    display: block;
    margin-left: 10px;

  }
  .article-image {
    display: block;
    margin-left: 50px;

  }
  .comment-method{
    display: block;
    margin-left: 60px;
    margin-top: 5px;
  }
  .text-width{
    display: block;
    width: 70%;
    margin-left: 60px;
  }
  
</style>

<div class="row">
  <div class="col-md-9 profile-main-block col-md-offset-3">
    {{ HTML::image($active_user->profileimage , 'profile picture', array('class' => 'img-circle pull-left','id' => 'size')) }}
    <span>
      <ul class="list-unstyled pull-left name-block text-capitalize">
        <li class="name-space "><h3>{{$active_user->name}}</h3></li>
        <li class="title-space ">{{$active_user->title}}</li>
        <li class="address-space">{{$active_user->city}},{{ $active_user->country}}</li>
      </ul>
    </span>
    
  </div>
</div>

<div class="row">
  <div class="col-md-12 centered-pills">
    <div class="sub-nav-block">
    <ul class="nav nav-pills ">
      <li role="navigation" class="active"><a href="{{url()}}/userProtected#yourfeedwall">MyEvent(wall)</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#photo">Photos</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#video">Video</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#audio">Audio</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#recent">Recent Activity</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#blog">Blog</a></li>
      <li role="navigation"><a href="{{url()}}/userProtected#about" >About</a></li>
    </ul>
    </div>
    <div class="tab-content">
      <div class="clearfix"></div>
      <div role="tabpanel" class="tab-pane active" id="yourfeedwall">
        <div class="col-md-8">
            <ul class=" pull-left tabnav">
              <li role="navigation" class="active"><a href="#performance" aria-controls="performance" role="tab" data-toggle="tab">Performance</a></li>
              <li role="navigation"><a href="#tutorial" aria-controls="tutorial" role="tab" data-toggle="tab">Tutorial</a></li>
              <li role="navigation"><a href="#findtalent" aria-controls="findtalent" role="tab" data-toggle="tab">Find-Talent</a></li>
            </ul> 
          </div>

          <div class="tab-content">
            <div class="clearfix"></div>
            <div role="tabpanel" class="tab-pane" id="performance">
            Performance
            </div>
            <div role="tabpanel" class="tab-pane " id="tutorial">
            tutorial
            </div>
            <!-- button for scout generation -->
            <div role="tabpanel" class="tab-pane active" id="findtalent">
              {{ Form::open(['route' => 'scout.store','files' => 'true' ,'class'=>'scout_form']) }}
                            <fieldset>
                            <!-- Image title field -->
                            <div class="form-group">
                              {{ Form::text('scouttitle', null, ['placeholder' => 'Scout Title', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('scouttitle', $errors) }}
                            </div>
                              <!-- Scout Date and Time field -->
                            <div class="form-group">
                              <div class='input-group date' id='datetimepicker1'>
                                          <input type="datetime" name="scoutdatetime" class="form-control"  />
                                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                          </span>
                                      </div>
                                    {{ errors_for('scoutdatetime', $errors) }}
                              
                            </div> 
                             <!-- Event Duration  field -->
                            <div class="form-group">
                              {{ Form::text('scoutduration', null, ['placeholder' => 'Scout Duration', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('scoutduration', $errors) }}
                            </div> 

                            <!-- scout renumeration -->
                            <div class="form-group">
                              {{ Form::text('renumeration', null, ['placeholder' => 'Renumeration', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('renumeration', $errors) }}                              
                            </div>  

                            <div class="form-group">
                              {{ Form::label('art', 'Art:') }}
                              {{ Form::checkbox('art', '1') }}
                              {{ Form::label('collection', 'Collection:') }}
                              {{ Form::checkbox('collection', '1') }}
                              {{ Form::label('cooking', 'Cooking:') }}
                              {{ Form::checkbox('cooking', '1') }}
                              {{ Form::label('dance', 'Dance:') }}
                              {{ Form::checkbox('dance', '1') }}
                              {{ Form::label('fashion', 'Fashion:') }}
                              {{ Form::checkbox('fashion', '1') }}
                              {{ Form::label('moviesandtheatre', 'Movies and theatre:') }}
                              {{ Form::checkbox('moviesandtheatre', '1') }}
                              {{ Form::label('music', 'Music:') }}
                              {{ Form::checkbox('music', '1') }}
                              {{ Form::label('sports', 'Sports:') }}
                              {{ Form::checkbox('sports', '1') }}
                              {{ Form::label('unordinary', 'Unordinary:') }}
                              {{ Form::checkbox('unordinary', '1') }}
                              {{ Form::label('wanderer', 'Wanderer:') }}
                              {{ Form::checkbox('wanderer', '1') }}
                            </div> 

                            <!-- scout Skills -->
                            <div class="form-group">
                              {{ Form::text('skills', null, ['placeholder' => 'skills', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('skills', $errors) }}                              
                            </div> 

                            <!-- scout Venue -->
                            <div class="form-group">
                              {{ Form::text('venue', null, ['placeholder' => 'Venue', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('venue', $errors) }}                              
                            </div> 
                            
                            <!-- scout description -->
                            <div class="form-group">
                              {{ Form::text('scoutdescription', null, ['placeholder' => 'Scout Description', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('scoutdescription', $errors) }}                              
                            </div> 

                            <!-- scout artist description -->
                            <div class="form-group">
                              {{ Form::text('artistdescription', null, ['placeholder' => 'Artist Description', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('artistdescription', $errors) }}                              
                            </div>

                            <!-- Scout agreement -->           
                            <div class="form-group">
                            {{ Form::file('agreement') }}
                            </div>

                            <!-- Scout Poster with definate size  -->           
                            <div class="form-group">
                            {{ Form::file('scoutposter') }}
                            </div>

                            <!-- Submit field -->
                            <div class="form-group">
                              {{ Form::submit('Scout Now', ['class' => 'btn btn-md btn-success btn-block videobutton']) }}
                            </div>

                            </fieldset>
                          {{ Form::close() }}                   
              
            </div>          
      </div>
    </div>
   
    </div>
  </div>
</div>





@stop