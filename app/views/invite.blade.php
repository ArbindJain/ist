@extends('master')

@section('title', 'Profile')

@section('content')

<div class="row">
  <div class="col-md-12">
    <h2 class="text-center" style="color:#515151;">Invite a Friend</h2>
    <hr style=" border-bottom: 2px solid #f18c1c; width:150px; ">
    <div class=" text-center">
      <p class="text-capitalize" style="font-size: 14px;">not finding who you're looking for? Invite friend <br> to Itsshowtime via email</p>
   	  <form class="form-horizontal">
	  <div class="form-group">
	    <label for="exampleInputName2">Name</label>
	    <input type="text" class="form-control" style="width: 20%; margin: 0 auto;" id="exampleInputName2" placeholder="Arbind Jain">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail2">Email</label>
	    <input type="email" class="form-control" style="width: 20%; margin: 0 auto;" id="exampleInputEmail2" placeholder="arbind.jain@example.com">
	  </div>
	  <br>
	  <button type="submit" class="btn btn-default">Send invitation</button>
	</form>
    </div>
  </div>
</div>

@stop