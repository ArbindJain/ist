@extends('master')

@section('title', 'Home')

@section('content')
<style type="text/css">
	.card-blocks {
		padding: 15px 15px;
		-webkit-box-shadow: 0px 0px 6px 0px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 0px 6px 0px rgba(0,0,0,0.75);
		box-shadow: 0px 0px 6px 0px rgba(0,0,0,0.75);
	}
	.thumbnail {
  display: block;
  padding: 4px;
  margin-bottom: 20px;
  line-height: 1.42857143;
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
  border-radius: 0;
  border: none;
  background-color: none;
}

.carousel-control {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  width: 15%;
  opacity: .5;
  font-size: 20px;
  color: #515151;
  text-align: center;
  text-shadow: none;
}
.carousel-control.left {
	background-image: none;
}
.carousel-control.right {
  left: auto;
  right: 0;
  background-image: none;
}

.carousel-control {
  padding-top:10.25%;
  width:5%;
}
</style>
<div class="row" style="margin-top:30px;">
	
	<div class="col-md-3">
		<div class="card-blocks">
			<div class="card-header">
				<h1 class="text-capitalize text-center ">You</h1>
			</div>
			<div class="card-image">
				<img src="{{url()}}/hompageimage/first.png" width="250px" height="250px">
			</div>	
			<div class="card-description">
				<p class = "text-center">simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
			</div>		
		</div>
	</div>
	<div class="col-md-3">
		<div class="card-blocks">
			<div class="card-header">
				<h1 class="text-capitalize text-center ">Talent</h1>
			</div>
			<div class="card-image">
				<img src="{{url()}}/hompageimage/second.png" width="250px" height="250px">
			</div>	
			<div class="card-description">
				<p class = "text-center">simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card-blocks">
			<div class="card-header">
				<h1 class="text-capitalize text-center ">Opportunties</h1>
			</div>
			<div class="card-image">
				<img src="{{url()}}/hompageimage/third.png" width="250px" height="250px">
			</div>	
			<div class="card-description">
				<p class = "text-center">simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card-blocks">
			<div class="card-header">
				<h1 class="text-capitalize text-center ">Perform!</h1>
			</div>	
			<div class="card-image">
				<img src="{{url()}}/hompageimage/fourth.png" width="250px" height="250px">
			</div>	
			<div class="card-description">
				<p class = "text-center">simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </p>
			</div>
		</div>
	</div>
</div>
	<div class="col-md-12" style="margin-top: 60px;">
		
				<h1 class="text-capitalize text-center ">Our Promoters</h1>
				<hr style="width:200px; background-color:#f18c1c; height: 2px;">
	</div>
    <div class="col-md-12" style="">

        <div class="well-none">
            <div id="myCarousel" class="carousel slide">
                
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6"><a href="#x"><img src="{{url()}}/promoterlogo/akar.png" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x"><img src="{{url()}}/promoterlogo/akk.png" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x"><img src="{{url()}}/promoterlogo/vibez.png" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x"><img src="{{url()}}/promoterlogo/vibezfashion.png" alt="Image" class="img-responsive"></a>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/item-->
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6"><a href="#x"><img src="{{url()}}/promoterlogo/akar.png" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x"><img src="{{url()}}/promoterlogo/akk.png" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x"><img src="{{url()}}/promoterlogo/vibez.png" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x"><img src="{{url()}}/promoterlogo/vibezfashion.png" alt="Image" class="img-responsive"></a>
                            </div>
                            
                        </div>
                        <!--/row-->
                    </div>
                    <!--/item-->
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6"><a href="#x"><img src="{{url()}}/promoterlogo/akar.png" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x"><img src="{{url()}}/promoterlogo/akk.png" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x"><img src="{{url()}}/promoterlogo/vibez.png" alt="Image" class="img-responsive"></a>
                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x"><img src="{{url()}}/promoterlogo/vibezfashion.png" alt="Image" class="img-responsive"></a>
                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/item-->
                </div>
                <!--/carousel-inner--> 
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-left fa-4"></i></a>

                <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-right fa-4"></i></a>
            </div>
            <!--/myCarousel-->
        </div>
        <!--/well-->
    </div>
<script type="text/javascript">
	$(document).ready(function() {
	$('#myCarousel').carousel({
	interval: 0
	})
    
    $('#myCarousel').on('slid.bs.carousel', function() {
    	//alert("slid");
	});
    
    
});


</script>
@stop