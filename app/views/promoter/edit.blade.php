@extends('master')

@section('title', 'Edit Profile')

@section('content')
<h1>Edit Profile</h1>

  @if (Session::has('flash_message'))
    <div class="form-group">
      <p style="padding: 5px" class="bg-success">{{ Session::get('flash_message') }}</p>
    </div>
  @endif

  {{ Form::model($user, ['method' => 'PATCH', 'files' => true , 'route' => ['promoter.update', $user->id]]) }}

    <!-- email Field -->
    <div class="form-group">
      {{ Form::label('email', 'Email:') }}
      {{ Form::email('email', null, ['class' => 'form-control']) }}
      {{ errors_for('email', $errors) }}
    </div>


    <!-- name Field -->
    <div class="form-group">
      {{ Form::label('name', 'Name:') }}
      {{ Form::text('name', null, ['class' => 'form-control']) }}
      {{ errors_for('name', $errors) }}
    </div>

    <!-- Title Field -->
    <div class="form-group">
      {{ Form::label('title', 'Title:') }}
      {{ Form::text('title', null, ['class' => 'form-control']) }}
      {{ errors_for('title', $errors) }}
    </div>

    <!-- DOB Field -->
    <div class="form-group">
      {{ Form::label('dob', 'DOB:') }}
      {{ Form::text('dob', null, ['class' => 'form-control']) }}
      {{ errors_for('dob', $errors) }}
    </div>

    <!-- Gender Field -->
    <div class="form-group">
      {{ Form::label('gender', 'Gender:') }}
      {{ Form::select('gender',['male','female']) }}
      {{ errors_for('gender', $errors) }}
    </div>

    <!-- contact Field -->
    <div class="form-group">
      {{ Form::label('contact', 'Contact:') }}
      {{ Form::text('contact', null, ['class' => 'form-control']) }}
      {{ errors_for('contact', $errors) }}
    </div>

    <!-- country Field -->
    <div class="form-group">
      {{ Form::label('country', 'Country:') }}
      {{ Form::text('country', null, ['class' => 'form-control']) }}
      {{ errors_for('country', $errors) }}
    </div>

    <!--  Field -->
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

    <!-- city Field -->
    <div class="form-group">
      {{ Form::label('city', 'City:') }}
      {{ Form::text('city', null, ['class' => 'form-control']) }}
      {{ errors_for('city', $errors) }}
    </div>

    <!-- Password field -->
    <div class="form-group">
      {{ Form::label('password', 'Password:') }}
      {{ Form::password('password', ['class' => 'form-control']) }}
      <p class="help-block">Leave password blank to NOT edit the password.</p>
      {{ errors_for('password', $errors) }}
    </div>

    <!-- Password Confirmation field -->
    <div class="form-group">
      {{ Form::label('password_confirmation', 'Repeat Password:') }}
      {{ Form::password('password_confirmation', ['class' => 'form-control'] )}}
    </div>

    <!-- profile image field -->
    <div class="form-group">
      {{ Form::file('profileimage') }}
    </div>



    <!-- Update Profile Field -->
    <div class="form-group">
      {{ Form::submit('Update Profile', ['class' => 'btn btn-primary']) }}
    </div>
  {{ Form::close() }}

@stop