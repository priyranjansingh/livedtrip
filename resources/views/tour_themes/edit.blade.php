@extends('master')
@section('content')
    
<div class="box_p">
      <div class="titel_bar clear">
        <div class="p_titel">Edit:{!! $tour_theme->theme_title !!}</div>
        
      </div>
      <div class="from_p">
           @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
		{!! Form::model($tour_theme,['method'=>'PATCH','action'=>['TourThemesController@update',$tour_theme->id]]) !!}
			<div class="row">
            	<div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4">Tour Theme Title:</label>
                        <div class="col-md-8">
                            {!! Form::text('theme_title',null,['class'=>'tbox'])!!}
                        
                        </div>
                    </div> 
                </div>
            	           
            </div>

	<div class="row">
            	<div class="col-md-12 tar">
                    {!! Form::submit('Update',['class'=>'btn_small bg_blue'])!!}
					
                </div>
            </div>                     
        {!!  Form::close()  !!}

      </div>
  </div>
@stop