@extends('master')
@section('content')
<script src="{{ asset('ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<div class="box_p">
    <div class="titel_bar clear">
        <div class="p_titel">Edit Package Details</div>
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
        {!! Form::model($package_detail,['method'=>'PATCH','action'=>['PackagedetailController@update',$package_detail->id]]) !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Package Day:</label>
                    <div class="col-md-8">
                        {!! Form::text('package_day',null,['class'=>'tbox','readonly' => 'true'])!!}
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Country:</label>
                    <div class="col-md-8">
                        {!! Form::select('country_id', $country_arr,$package_detail->country_id,['id'=>'country_id','class'=>"chosen-select-no-single"]) !!}

                    </div>
                </div>
            </div>             
        </div>
        <div class="row">    
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">State:</label>
                    <div class="col-md-8">
                        {!! Form::select('state_id', $states,$package_detail->state_id,['id'=>'state_id','class'=>"chosen-select-no-single"]) !!}                 
                    </div>
                </div>                                        
            </div>  
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">City:</label>
                    <div class="col-md-8">
                        {!! Form::select('city_id', $cities,$package_detail->city_id,['id'=>'city_id','class'=>"chosen-select-no-single"]) !!}                 
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">    
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Location:</label>
                    <div class="col-md-8">                                

                        {!! Form::select('location_id', $locations,$package_detail->location_id,['id'=>'location_id','class'=>"chosen-select-no-single"]) !!}

                    </div>
                </div>                                                      
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Hotel:</label>
                    <div class="col-md-8">
                        {!! Form::select('hotel_id', $hotel_arr,$package_detail->hotel_id,['id'=>'hotel_id','class'=>"chosen-select-no-single"]) !!}
                    </div>
                </div>
            </div>
        </div> 
                <div class="row">  
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Night Stay:</label>
                    <div class="col-md-8">
                        <span class="rd_box">
                            {!!Form::radio('night_stay', 'Y')!!}

                            <span></span>
                            <label>Yes</label>
                        </span> 
                        <span class="rd_box">
                            {!!Form::radio('night_stay', 'N')!!}

                            <span></span>
                            <label>No</label>
                        </span>                     
                    </div>
                </div>
            </div>                
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-2">Sightseeing:</label>
                    <div class="col-md-10">
                        {!! Form::textarea('sightseeing',null,['class'=>'t_area'])!!}
                    </div>
                </div>
            </div>

        </div>  
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-2">Meal:</label>
                    <div class="col-md-10">
                        {!! Form::textarea('meal',null,['class'=>'t_area','id'=>'meal'])!!}
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 tar">
                {!! Form::hidden('package_id')!!}
                {!! Form::submit('Update',['class'=>'btn_small bg_blue'])!!}
            </div>
        </div>  
        {!!  Form::close()  !!}
    </div>
</div>
<script>
    jQuery(".select").chosen();
    CKEDITOR.config.allowedContent = true;
    CKEDITOR.replace( 'meal', {
    enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
    });
    CKEDITOR.replace( 'sightseeing', {
    enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
    });
    $("#country_id").change(function() {
        $(".loading").show();
        var country_id = $("#country_id").val();
        $.ajax({
            method: "GET",
            url: '<?php echo url('getHotelState/'); ?>/' + country_id,
            success: function(data) {
                $("#state_id").html(data);
                $("#state_id").trigger("chosen:updated");
                $("#state_id").trigger('change');
                $("#city_id").trigger("chosen:updated");
            }
        });
    });

    $("#state_id").change(function() {

        $(".loading").show();
        var state_id = $("#state_id").val();
        $.ajax({
            method: "GET",
            url: '<?php echo url('getHotelCity/'); ?>/' + state_id,
            success: function(data) {
                $("#city_id").html(data);
                $("#city_id").trigger("chosen:updated");
                $("#city_id").trigger('change');
                $("#location_id").trigger("chosen:updated");

            }
        });
    });

    $("#city_id").change(function() {
        $(".loading").show();
        var city_id = $("#city_id").val();
        $.ajax({
            method: "GET",
            url: '<?php echo url('getHotelLocation/'); ?>/' + city_id,
            success: function(data) {
                $("#location_id").html(data);
                $("#location_id").trigger("chosen:updated");
            }
        });
        
        $.ajax({
            method: "GET",
            url: '<?php echo url('getHotelName/'); ?>/' + city_id,
            success: function(data) {
                $("#hotel_id").html(data);
                $("#hotel_id").trigger("chosen:updated");
            }
        });
    });




</script>

@stop