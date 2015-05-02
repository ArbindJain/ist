@extends('masterwitheditor')

@section('title', 'Blog')

@section('content')


<div class="row">
      <div class="col-md-12">
            <div class="form-box">
            {{ Form::model($blog, ['method' => 'PATCH', 'files' => true , 'route' => ['blog.update',$blog->id]]) }}
                <fieldset>

                              @if (Session::has('flash_message'))
                                                <div class="form-group">
                                                      <p>{{ Session::get('flash_message') }}</p>
                                                </div>
                                          @endif
                                          
                                          <div class="form-group col-md-12">
                              {{ Form::label('title', 'Blog title',['class' => 'text-capitalize text-muted']) }}
                                                {{ Form::text('title', null, ['placeholder' => 'Post Title', 'class' => 'form-control', 'required' => 'required'])}}
                                                {{ errors_for('title', $errors) }}
                                          </div>

                                          <!-- post desc field -->
                                          <div class="form-group col-md-12">
                              {{ Form::label('bodydesc', 'Article body',['class' => 'text-capitalize text-muted']) }}
                                                <textarea name ="bodydesc" class="form-control" id="summernote">{{$blog->body}}</textarea>
                                               
                                                {{ errors_for('bodydesc', $errors) }}
                                          </div>

                                                                        <!--  Field -->
                                    <!--  <div class="form-group">
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

                                          </div>-->
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
                                          <!-- Submit field -->
                                          <div class="form-group col-md-12">
                                                {{ Form::submit('PUBLISH', ['class' => 'btn btn-md btn-default btn-block']) }}
                                          </div>



                              </fieldset>
                                    {{ Form::close() }}
                                    </div>

      </div>
            </div>
            



@stop