<div class="box_p">
    <div class="titel_bar clear">
        <div class="p_titel">Create New Hotel</div>

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
        {!! Form::open(array('url' => 'hotel')) !!}
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
                    <label class="col-md-4">Hotel Name:</label>
                    <div class="col-md-8">

                        {!! Form::text('hotel_name',null,['class'=>'tbox'])!!}

                    </div>
                </div> 
            </div>
        </div>
        
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Location:</label>
                    <div class="col-md-8">
                        {!! Form::select('location_id', $locations,'',['id'=>'location_id','class'=>"chosen-select-no-single"]) !!}

                    </div>
                </div>
            </div>
            

        </div>
        <div class="row">
            <div class="col-md-12 tar">
                {!! Form::submit('Add Hotel',['class'=>'btn_small bg_blue'])!!}
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
        
        $("#city_id").change(function() {
            $(".loading").show();
            var city_id = $("#city_id").val();
            $.ajax({
                method: "GET",
                url: '<?php echo url('getLocation/'); ?>/' + city_id,
                success: function(data) {
                    $("#location_id").html(data);
                    $("#location_id").trigger("chosen:updated");
                }
            });
        });
        
        
        
        
    </script>

</div>

