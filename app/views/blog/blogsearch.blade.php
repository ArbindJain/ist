@extends('master')

@section('title', 'Blog')

@section('content')

{{HTML::style('css/jquery.nstSlider.css')}}
{{HTML::style('css/bootstrap-switch.css')}}
<style type="text/css">
  .hid {
    display: none;
  }
</style>
<div class="row">
 <div class="col-md-12">
                <div class="scout-search-block">
                
                
                  <div class="search-button pull-right">
                    
                    {{ Form::open(['route' => 'blogsearch','class'=>'form-inline' ]) }}
                    <!-- Album name field -->
                       <a class="filters text-capitalize pull-left "><i class="fa fa-filter"></i> &nbsp; Filter</a>
                     
                      {{ Form::text('term', null, ['placeholder' => 'search', 'class' => 'form-control', 'required' => 'required'])}}
                      {{ errors_for('term', $errors) }}
                    <!-- Submit field -->
                      {{ Form::submit('search ', ['class' => 'btn btn-md btn-default ']) }}
                    {{Form::close()}}
                  </div>
                </div><!-- search block end -->
                <div class="filter-scout-block hid" id="myContent">
                  {{ Form::open(['route' => 'blogfilters','name'=>'filterform' ]) }}
                    <div class="col-sm-3 margin-left15 form-group " id="shape">
                      <label for="cate" class="control-label text-muted">Category</label>
                      <select class="form-control" name="category" id="cate">
                      <option value=""></option>
                        <option  value="dance">Dance</option>
                        <option  value="art">Art</option>
                        <option  value="music">Music</option>
                        <option  value="sports">Sports</option>
                        <option  value="fashion">Fashion</option>
                        <option  value="wanderer">Wanderer</option>
                        <option  value="cooking">Cooking</option>
                        <option  value="unordinary">Unordinary</option>
                        <option  value="moviesandtheatre">Movies & Theatre</option>
                      </select>
                    </div>

                    <div class="col-sm-3 margin-left15 form-group">
                      <label for="date" class="control-label text-muted">Date</label>
                      <select class="form-control" name="date" id="date">
                        <option value=""></option>
                        <option  value="thisweek">This Week</option>
                        <option  value="thismonth">This Month</option>
                      </select>
                    </div>
                    <div class="col-md-3 form-group">

                      <label  class="control-label text-muted">Budget -</label>&nbsp;&nbsp;<i class="fa fa-inr text-muted"></i>
                      <div class="leftLabel text-muted " style=" display:inline-block;" id="leftlb"></div>&nbsp; - &nbsp;<i class="fa fa-inr text-muted"></i>
                      <div class="rightLabel text-muted" style=" display:inline-block;" id="rightlb"></div>
                    
                      <div class="nstSlider" data-range_min="2000" data-range_max="12000" 
                       data-cur_min="10"    data-cur_max="40">
                        <div class="bar"></div>
                        <div class="leftGrip"></div>
                        <div class="rightGrip"></div>

                      </div>

                      </div><!-- search ranger bar  -->
                    
                    <div class="col-sm-2 margin-left15 form-group">
                      <label for="venue" class="control-label text-muted">Venue</label>
                      <select class="form-control" name="event" id="venue">
                        <option value=""></option>
                        <option  value="Bangalore">Bangalore</option>
                        <option  value="Kathmandu">Kathmandu</option>
                          </select>
                    </div>
                    <div class="col-sm-1  ">
                      {{ Form::submit('Filter ', ['class' => 'btn btn-default btn-block filterbutton ']) }}
                    </div>
                    {{Form::close()}}
            </div><!-- end of search and filter -->

	<div class="col-md-12">

            <div class ="col-md-12">
            <div id="content">
            <div class="row">
            @foreach($blogs as $blog)
                  
                  <div class="col-lg-4 col-md-4">
                        <aside>
                             <a href="{{url()}}/blog/{{$blog->id}}"> <img src="{{url()}}/blogpostergallery/{{$blog->blogposter}}" class="img-responsive"></a>
                              <span class="posted-date"><i class="fa fa-calendar"></i> {{$blog->created_at->toFormattedDateString()}}</span>
                              <div class="content-title">
                                    <div class="text-left">
                                    <h3><a href="{{url()}}/blog/{{$blog->id}}">{{ $blog->title}}</a></h3>
                                    <h5>{{ substr(preg_replace('/(<.*?>)|(&.*?;)/', '', $blog->body), 0, 100) }}...</h5>
                                    </div>
                              </div>
                              <div class="content-footer">
                                    <img src="{{url()}}/{{Sentry::findUserById($blog->user_id)->profileimage}}">
                                    <a href="{{url()}}/user/{{$blog->user_id}}"><span class="text-capitalize footer-username">{{Sentry::findUserById($blog->user_id)->name}}</span></a>
                                    <span class="pull-right">
                                          <a href="#"><i class="fa fa-thumbs-o-up"></i> {{$blog->counted}}</a>
                                    </span>
                              </div>
                        </aside>
                  </div>
                  
                  
            @endforeach      
            </div>
            </div>     
            </div><!-- col-8 end -->
            
      </div>
</div>
		

<script type="text/javascript">
 $('.filters').click(function() {
    $('#myContent').slideToggle(600,"linear");
    return false;
});
</script>

@stop