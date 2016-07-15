@extends('master')
@section('content')


<div class="box_p">
    <div class="titel_bar clear">
        <div class="p_titel">Create New Tour Category</div>
       
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
        {!! Form::open(array('url' => 'tour-category')) !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Tour Category Title:</label>
                    <div class="col-md-8">

                        {!! Form::text('category_title',null,['class'=>'tbox'])!!}
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Active:</label>
                    <div class="col-md-8">
                        <span class="rd_box">
                            {!!Form::radio('active', 'Y')!!}

                            <span></span>
                            <label>Yes</label>
                        </span> 
                        <span class="rd_box">
                            {!!Form::radio('active', 'N')!!}

                            <span></span>
                            <label>No</label>
                        </span>                     
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 tar">
                {!! Form::submit('Add Tour Category',['class'=>'btn_small bg_blue'])!!}

            </div>
        </div>                     
        {!!  Form::close()  !!}

    </div>
</div>
@stop