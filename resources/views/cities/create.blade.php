@extends('master')
@section('content')


<div class="box_p">
    <div class="titel_bar clear">
        <div class="p_titel">Create New City</div>
       
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
        {!! Form::open(array('url' => 'city')) !!}
        <div class="row">
            
            <div class="col-md-6">
                    <div class="form-group">
                                        <label class="col-md-4">Country:</label>
                                        <div class="col-md-8">
                                            {!! Form::select('country_id', $country_arr,'',['id'=>'country_id','class'=>"chosen-select-no-single"]) !!}
                                                           
                                        </div>
                                        </div>
            </div>
            <div class="col-md-6">
                    <div class="form-group">
                                        <label class="col-md-4">State:</label>
                                        <div class="col-md-8">
                                            {!! Form::select('state_id', $states,'',['id'=>'state_id','class'=>"chosen-select-no-single"]) !!}
                                                           
                                        </div>
                                        </div>
            </div>

        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">City Name:</label>
                    <div class="col-md-8">

                        {!! Form::text('city_name',null,['class'=>'tbox'])!!}
                        
                    </div>
                </div> 
            </div>

        </div>

        <div class="row">
            <div class="col-md-12 tar">
                {!! Form::submit('Add City',['class'=>'btn_small bg_blue'])!!}

            </div>
        </div>                     
        {!!  Form::close()  !!}

    </div>
    <script>
    jQuery(".select").chosen();
    
    $("#country_id").change(function() {
        $(".loading").show();
        var country_id = $("#country_id").val();
        $.ajax({
            method: "GET",
            url: '<?php echo url('getState/'); ?>/'+country_id,
            success: function(data) {
                $("#state_id").html(data);
                $("#state_id").trigger("chosen:updated");
            }
        });
    });
    </script>

</div>
@stop