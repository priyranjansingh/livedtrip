@extends('master')
@section('content')

<script src="{{ asset('ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<div class="box_p">
    <div class="titel_bar clear">
        <div class="p_titel">Create New Location</div>

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
        {!! Form::open(array('url' => 'location', 'files'=>true)) !!}
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
                    <label class="col-md-4">City:</label>
                    <div class="col-md-8">
                        {!! Form::select('city_id', $cities,'',['id'=>'city_id','class'=>"chosen-select-no-single"]) !!}

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Location Name:</label>
                    <div class="col-md-8">

                        {!! Form::text('location_name',null,['class'=>'tbox'])!!}

                    </div>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-4">Destination Details:</label>
                    <div class="col-md-8">
                        {!! Form::textarea('destination_details',null,['class'=>'t_area','id'=>'destination_details'])!!}                   
                    </div>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Meta description:</label>
                    <div class="col-md-8">
                        {!! Form::textarea('meta_desc',null,['class'=>'t_area'])!!}  
                    </div>
                </div>    
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Meta tag:</label>
                    <div class="col-md-8">
                        {!! Form::textarea('metatag',null,['class'=>'t_area'])!!}           
                    </div>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Meta Title:</label>
                    <div class="col-md-8">
                        {!! Form::text('meta_title',null,['class'=>'tbox'])!!}
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Location image (550X336):</label>
                    <div class="col-md-8">                                
                        <span class="file">
                            {!! Form::file('location_image',['class'=>'upload']) !!}
                        </span>
                    </div>
                </div>                                                      
            </div> 
        </div>
        <div class="row">  
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
                {!! Form::submit('Add Location',['class'=>'btn_small bg_blue'])!!}
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
                url: '<?php echo url('getState/'); ?>/' + country_id,
                success: function(data) {
                    $("#state_id").html(data);
                    $("#state_id").trigger("chosen:updated");
                }
            });
        });
        
        $("#state_id").change(function() {
            $(".loading").show();
            var state_id = $("#state_id").val();
            $.ajax({
                method: "GET",
                url: '<?php echo url('getCity/'); ?>/' + state_id,
                success: function(data) {
                    $("#city_id").html(data);
                    $("#city_id").trigger("chosen:updated");
                }
            });
        });
        CKEDITOR.replace( 'destination_details', {
            enterMode : CKEDITOR.ENTER_BR,
                shiftEnterMode: CKEDITOR.ENTER_P
        });
        
        
        
    </script>

</div>
@stop