@extends('master')

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
  <div class="col-md-12">
    <div class="sub-nav-block">
    <ul class="nav nav-pills centertab">
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
        <div class="col-md-12">
            <ul class="nav nav-pills centertab">
              <li role="navigation" ><a href="#performance" aria-controls="performance" role="tab" data-toggle="tab">Performance</a></li>
              <li role="navigation"><a href="#tutorial" aria-controls="tutorial" role="tab" data-toggle="tab">Tutorial</a></li>
              <li role="navigation" class="active"><a href="#findtalent" aria-controls="findtalent" role="tab" data-toggle="tab">Find-Talent</a></li>
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
            <div class="form-box">
              {{ Form::open(['route' => 'scout.store','files' => 'true' ,'class'=>'scout_form']) }}
                            <fieldset>
                            <!-- Image title field -->
                            <div class="form-group col-md-12">
                              {{ Form::label('scoutitle', 'Scout Title',['class' => 'text-capitalize text-muted']) }}
                              {{ Form::text('scouttitle', null, ['placeholder' => 'Scout Title', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('scouttitle', $errors) }}
                            </div>
                              <!-- Scout Date and Time field -->
                            <div class="form-group col-md-6">
                            {{ Form::label('scoutdatetime', 'Event date & time',['class' => 'text-capitalize text-muted']) }}
                                          
                              <div class='input-group date' id='datetimepicker1'>
                                          <input type="datetime" name="scoutdatetime" class="form-control"  />
                                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                          </span>
                                      </div>
                                    {{ errors_for('scoutdatetime', $errors) }}
                              
                            </div> 
                             <!-- Scout Date and Time field -->
                            <div class="form-group col-md-6">
                            {{ Form::label('applieddatetime', 'Apllication Closing date & time',['class' => 'text-capitalize text-muted']) }}
                                          
                              <div class='input-group date' id='datetimepicker2'>
                                          <input type="datetime" name="applieddatetime" class="form-control"  />
                                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                          </span>
                                      </div>
                                    {{ errors_for('applieddatetime', $errors) }}
                              
                            </div> 
                             <!-- Event Duration  field -->
                            <div class="form-group col-md-6">
                              {{ Form::label('scoutduration', 'Event duration',['class' => 'text-capitalize text-muted']) }}          
                              {{ Form::text('scoutduration', null, ['placeholder' => 'Scout Duration', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('scoutduration', $errors) }}
                            </div> 
                             <!-- scout audience gender -->
                            <div class="form-group col-md-6"> 

                              {{ Form::label('gender', 'gender',['class' => 'text-capitalize text-muted']) }}
                              <select name="gender" class="form-control">
                                <option value="MALE">Male</option>
                                <option value="FEMALE">Female</option>
                                <option value="NULL" selected="selected">Any</option>
                              </select>                            
                            </div>  

                            
                            <!-- scout renumeration range min-->
                            <div class="form-group col-md-6">
                              {{ Form::label('renumerationrangemin', 'remuneration min',['class' => 'text-capitalize text-muted']) }}
                              {{ Form::text('renumerationrangemin', null, ['placeholder' => 'Remuneration Min', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('renumerationrangemin', $errors) }}                              
                            </div>  
                            <!-- scout renumeration range max -->
                            <div class="form-group col-md-6">
                              {{ Form::label('renumerationrangemax', 'remuneration max',['class' => 'text-capitalize text-muted']) }}
                              {{ Form::text('renumerationrangemax', null, ['placeholder' => 'Remuneration Max', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('renumerationrangemax', $errors) }}                              
                            </div> 
                            <!-- scout audience range min-->
                            <div class="form-group col-md-6">
                              {{ Form::label('audiencerangemin', 'max people',['class' => 'text-capitalize text-muted']) }}
                              {{ Form::text('audiencerangemin', null, ['placeholder' => 'Audience Min', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('audiencerangemin', $errors) }}                              
                            </div>  
                            <!-- scout audience range max -->
                            <div class="form-group col-md-6">
                              {{ Form::label('audiencerangemax', 'min people',['class' => 'text-capitalize text-muted']) }}
                              {{ Form::text('audiencerangemax', null, ['placeholder' => 'Audience Max', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('audiencerangemax', $errors) }}                              
                            </div> 
                             <!-- scout age range min-->
                            <div class="form-group col-md-6">
                              {{ Form::label('agerangemin', 'age min',['class' => 'text-capitalize text-muted']) }}
                              {{ Form::text('agerangemin', null, ['placeholder' => 'Age Min', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('agerangemin', $errors) }}                              
                            </div>  
                            <!-- scout age range max -->
                            <div class="form-group col-md-6">
                              {{ Form::label('agerangemax', 'age max',['class' => 'text-capitalize text-muted']) }}
                              {{ Form::text('agerangemax', null, ['placeholder' => 'Age Max', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('agerangemax', $errors) }}                              
                            </div> 
                           

                          <!--  <div class="form-group col-md-12">

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
                            </div> -->
                            <div class="col-md-12 form-group">
              <label for="checkbox-2" class="control-label text-capitalize text-muted">Category</label>
                <div class="has-feedback">
                  <input id="checkbox-2" class="checkbox-custom" name="art" type="checkbox" value="1" >
                        <label for="checkbox-2" class="checkbox-custom-label">Art</label>
                        
                        <input id="checkbox-3" class="checkbox-custom" name="cooking" type="checkbox" value="1" >
                        <label for="checkbox-3" class="checkbox-custom-label">Cooking</label>
                        
                        <input id="checkbox-4" class="checkbox-custom" name="dance" type="checkbox" value="1" >
                        <label for="checkbox-4" class="checkbox-custom-label">Dance</label>
                        
                        <input id="checkbox-5" class="checkbox-custom" name="fashion" type="checkbox" value="1" >
                        <label for="checkbox-5" class="checkbox-custom-label">Fashion</label>
                        
                        <input id="checkbox-6" class="checkbox-custom" name="moviesandtheatre" type="checkbox" value="1" >
                        <label for="checkbox-6" class="checkbox-custom-label">Movies & Theatre</label>
                       
                        <input id="checkbox-7" class="checkbox-custom" name="music" type="checkbox" value="1" >
                        <label for="checkbox-7" class="checkbox-custom-label">Music</label>
                        
                        <input id="checkbox-8" class="checkbox-custom" name="sports" type="checkbox" value="1" >
                        <label for="checkbox-8" class="checkbox-custom-label">Sports</label>
                        
                        <input id="checkbox-9" class="checkbox-custom" name="unordinary" type="checkbox" value="1" >
                        <label for="checkbox-9" class="checkbox-custom-label">Unordinary</label>
                        
                        <input id="checkbox-10" class="checkbox-custom" name="wanderer" type="checkbox" value="1" >
                        <label for="checkbox-10" class="checkbox-custom-label">Wanderer</label>
                </div>
              </div>

                            <!-- scout Skills -->
                            <div class="form-group col-md-12">
                              {{ Form::label('skills', 'skill',['class' => 'text-capitalize text-muted']) }}
                              {{ Form::text('skills', null, ['placeholder' => 'skills', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('skills', $errors) }}                              
                            </div> 

                            <!-- scout Venue -->
                            <div class="form-group col-md-12">
                              {{ Form::label('venue', 'venue address',['class' => 'text-capitalize text-muted']) }}
                              {{ Form::text('venue', null, ['placeholder' => 'Venue', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('venue', $errors) }}                              
                            </div> 
                            <!-- scout City -->
                            <div class="form-group col-md-6">
                              {{ Form::label('city', 'city',['class' => 'text-capitalize text-muted']) }}
                              {{ Form::text('city', null, ['placeholder' => 'City', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('city', $errors) }}                              
                            </div> 
                            <!-- scout Country -->
                            <div class="form-group col-md-6">
                              {{ Form::label('country', 'country',['class' => 'text-capitalize text-muted']) }}
                              {{ Form::text('country', null, ['placeholder' => 'Country', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('country', $errors) }}                              
                            </div> 
                            
                            <!-- scout description -->
                            <div class="form-group col-md-12">
                              {{ Form::label('scoutdescription', 'Scout description',['class' => 'text-capitalize text-muted']) }}
                              {{ Form::text('scoutdescription', null, ['placeholder' => 'Scout Description', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('scoutdescription', $errors) }}                              
                            </div> 

                            <!-- scout artist description -->
                            <div class="form-group col-md-12">
                              {{ Form::label('artistdescription', 'artist description',['class' => 'text-capitalize text-muted']) }}
                              {{ Form::text('artistdescription', null, ['placeholder' => 'Artist Description', 'class' => 'form-control', 'required' => 'required'])}}
                              {{ errors_for('artistdescription', $errors) }}                              
                            </div>
                            <!-- tags for scout -->
                            <div class="form-group col-md-12">
                              {{ Form::label('scouttag', 'Tags',['class' => 'text-capitalize text-muted']) }}
                            <input type="text" name="scouttag" value="puttagshere" data-role="tagsinput"> 
                              {{ errors_for('scouttag', $errors) }}
                          </div>

                            <!-- Scout agreement -->           
                            <div class="form-group col-md-12">
                            {{ Form::label('agreement', 'upload Certificate',['class' => 'text-capitalize text-muted']) }}
                            {{ Form::file('agreement') }}
                            </div>

                            <!-- Scout Poster with definate size  -->           
                            <div class="form-group col-md-12">
                              {{ Form::label('scoutposter', 'upload poster',['class' => 'text-capitalize text-muted']) }}
                            {{ Form::file('scoutposter') }}
                            </div>

                            <!-- Submit field -->
                            <div class="form-group col-md-12">
                              {{ Form::submit('Scout Now', ['class' => 'btn btn-md btn-success videobutton']) }}
                            </div>

                            </fieldset>
                          {{ Form::close() }}    
                          </div>               
              
            </div>          
      </div>
    </div>
   
    </div>
  </div>
</div>





@stop