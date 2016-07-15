@extends('master')
@section('content')


<div class="box_p">
    <div class="titel_bar clear">
        <div class="p_titel">Create New Customer</div>
       
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
        {!! Form::open(array('url' => 'customer')) !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Customer Name:</label>
                    <div class="col-md-8">

                        {!! Form::text('name',null,['class'=>'tbox'])!!}
                    </div>
                </div> 
            </div>

        </div>
		<div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Email:</label>
                    <div class="col-md-8">

                        {!! Form::text('email',null,['class'=>'tbox'])!!}
                    </div>
                </div> 
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 tar">
                {!! Form::submit('Add Customer',['class'=>'btn_small bg_blue'])!!}

            </div>
        </div>                     
        {!!  Form::close()  !!}

    </div>
</div>
@stop