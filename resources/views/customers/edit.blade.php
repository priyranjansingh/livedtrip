@extends('master')
@section('content')
<script src="{{ asset('ckeditor/ckeditor.js') }}" type="text/javascript"></script>   
<div class="box_p">
    <div class="titel_bar clear">
        <div class="p_titel">Edit:{!! $customer->name !!}</div>

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
        {!! Form::model($customer,['method'=>'PATCH','action'=>['CustomersController@update',$customer->id]]) !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">First Name:</label>
                    <div class="col-md-8">
                        {!! Form::text('fname',null,['class'=>'tbox'])!!}
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Last Name:</label>
                    <div class="col-md-8">
                        {!! Form::text('lname',null,['class'=>'tbox'])!!}
                    </div>
                </div> 
            </div>
        </div>
		<div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Phone:</label>
                    <div class="col-md-8">
                        {!! Form::text('phone',null,['class'=>'tbox'])!!}
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Email:</label>
                    <div class="col-md-8">
                        {!! Form::text('email',null,['class'=>'tbox','disabled' => 'disabled'])!!}
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
<script>
CKEDITOR.replace( 'content_body', {
    enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
});
</script>


@stop