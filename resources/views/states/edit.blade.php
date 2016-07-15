@extends('master')
@section('content')
    
<div class="box_p">
      <div class="titel_bar clear">
        <div class="p_titel">Edit:{!! $state->state_name !!}</div>
        
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
		{!! Form::model($state,['method'=>'PATCH','action'=>['StatesController@update',$state->id]]) !!}
			<div class="row">
            	<div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4">State Name:</label>
                        <div class="col-md-8">
                            {!! Form::text('state_name',null,['class'=>'tbox'])!!}
                        
                        </div>
                    </div> 
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                            <label class="col-md-4">Country:</label>
                                            <div class="col-md-8">
                                                {!! Form::select('country_id', $countries,$state->country_id,['class'=>"chosen-select-no-single"]) !!}

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