@extends('master')
@section('content')
<script src="{{ asset('ckeditor/ckeditor.js') }}" type="text/javascript"></script>   
<div class="box_p">
    <div class="titel_bar clear">
        <div class="p_titel">Edit:{!! $content->content_title !!}</div>

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
        {!! Form::model($content,['method'=>'PATCH','action'=>['ContentsController@update',$content->id]]) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">

                    <div class="col-md-12">
                        {!! Form::textarea('content_body',null,['class'=>'t_area','id'=>'content_body'])!!}

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
CKEDITOR.config.allowedContent = true;
CKEDITOR.replace( 'content_body', {
    enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
});
</script>


@stop