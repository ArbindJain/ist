@extends('master')

@section('title', 'Blog')

@section('content')

<div class="row">
	<div class="col-md-12">
            <div class ="col-md-8">
            <div id="content">
            <div class="row">
            @foreach($blogs as $blog)
                  
                  <div class="col-lg-6 col-md-6">
                        <aside>
                              <img src="{{url()}}/blogposter/{{$blog->blogposter}}.jpg" class="img-responsive">
                              <span class="posted-date"><i class="fa fa-calendar"></i> {{$blog->created_at->toFormattedDateString()}}</span>
                              <div class="content-title">
                                    <div class="text-center">
                                    <h3><a href="{{url()}}/blog/{{$blog->id}}">{{ $blog->title}}</a></h3>
                                    <h5>{{ substr(preg_replace('/(<.*?>)|(&.*?;)/', '', $blog->body), 0, 100) }}...</h5>
                                    </div>
                              </div>
                              <div class="content-footer">
                                    <img src="{{url()}}/{{Sentry::findUserById($blog->user_id)->profileimage}}">
                                    <span class="text-capitalize footer-username">{{Sentry::findUserById($blog->user_id)->name}}</span>
                                    <span class="pull-right">
                                          <a href="#"><i class="fa fa-comments" data-toggle="tooltip" data-placement="top" title="" data-original-title="Comments"></i> 30</a>
                                          <a href="#"><i class="fa fa-thumbs-o-up" data-toggle="tooltip" data-placement="top" title="" data-original-title="Loved"></i> 20</a>
                                    </span>
                              </div>
                        </aside>
                  </div>
                  <div class="col-lg-6 col-md-6">
                        <aside>
                              <img src="{{url()}}/blogposter/{{$blog->blogposter}}.jpg" class="img-responsive">
                              <span class="posted-date"><i class="fa fa-calendar"></i> {{$blog->created_at->toFormattedDateString()}}</span>
                              <div class="content-title">
                                    <div class="text-center">
                                    <h3><a href="{{url()}}/blog/{{$blog->id}}">{{ $blog->title}}</a></h3>
                                    <h5>{{ substr(preg_replace('/(<.*?>)|(&.*?;)/', '', $blog->body), 0, 100) }}...</h5>
                                    </div>
                              </div>
                              <div class="content-footer">
                                    <img src="{{url()}}/{{Sentry::findUserById($blog->user_id)->profileimage}}">
                                    <span class="text-capitalize footer-username">{{Sentry::findUserById($blog->user_id)->name}}</span>
                                    <span class="pull-right">
                                          <a href="#"><i class="fa fa-comments" data-toggle="tooltip" data-placement="top" title="" data-original-title="Comments"></i> 30</a>
                                          <a href="#"><i class="fa fa-thumbs-o-up" data-toggle="tooltip" data-placement="top" title="" data-original-title="Loved"></i> 20</a>
                                    </span>
                              </div>
                        </aside>
                  </div>
                  <div class="col-lg-6 col-md-6">
                        <aside>
                              <img src="{{url()}}/blogposter/{{$blog->blogposter}}.jpg" class="img-responsive">
                              <span class="posted-date"><i class="fa fa-calendar"></i> {{$blog->created_at->toFormattedDateString()}}</span>
                              <div class="content-title">
                                    <div class="text-center">
                                    <h3><a href="{{url()}}/blog/{{$blog->id}}">{{ $blog->title}}</a></h3>
                                    <h5>{{ substr(preg_replace('/(<.*?>)|(&.*?;)/', '', $blog->body), 0, 100) }}...</h5>
                                    </div>
                              </div>
                              <div class="content-footer">
                                    <img src="{{url()}}/{{Sentry::findUserById($blog->user_id)->profileimage}}">
                                    <span class="text-capitalize footer-username">{{Sentry::findUserById($blog->user_id)->name}}</span>
                                    <span class="pull-right">
                                          <a href="#"><i class="fa fa-comments" data-toggle="tooltip" data-placement="top" title="" data-original-title="Comments"></i> 30</a>
                                          <a href="#"><i class="fa fa-thumbs-o-up" data-toggle="tooltip" data-placement="top" title="" data-original-title="Loved"></i> 20</a>
                                    </span>
                              </div>
                        </aside>
                  </div>
                  <div class="col-lg-6 col-md-6">
                        <aside>
                              <img src="{{url()}}/blogposter/{{$blog->blogposter}}.jpg" class="img-responsive">
                              <span class="posted-date"><i class="fa fa-calendar"></i> {{$blog->created_at->toFormattedDateString()}}</span>
                              <div class="content-title">
                                    <div class="text-center">
                                    <h3><a href="{{url()}}/blog/{{$blog->id}}">{{ $blog->title}}</a></h3>
                                    <h5>{{ substr(preg_replace('/(<.*?>)|(&.*?;)/', '', $blog->body), 0, 100) }}...</h5>
                                    </div>
                              </div>
                              <div class="content-footer">
                                    <img src="{{url()}}/{{Sentry::findUserById($blog->user_id)->profileimage}}">
                                    <span class="text-capitalize footer-username">{{Sentry::findUserById($blog->user_id)->name}}</span>
                                    <span class="pull-right">
                                          <a href="#"><i class="fa fa-comments" data-toggle="tooltip" data-placement="top" title="" data-original-title="Comments"></i> 30</a>
                                          <a href="#"><i class="fa fa-thumbs-o-up" data-toggle="tooltip" data-placement="top" title="" data-original-title="Loved"></i> 20</a>
                                    </span>
                              </div>
                        </aside>
                  </div>
                  
            @endforeach      
            </div>
            </div>     
            </div><!-- col-8 end -->
            <div class ="col-md-4">
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
</div>
		



@stop