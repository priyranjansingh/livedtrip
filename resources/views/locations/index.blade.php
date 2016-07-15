@extends('master')
@section('content')
<div class="box_p">
      <div class="titel_bar clear">
        <div class="p_titel">Location Management</div>
        <a class="btn_o fr" href="location/create"><i class="fa fa-plus"></i> Add Location</a>
      </div>
      <div class="from_p"> 
      	<div class="res_table">
      	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table table-striped">
        <thead>
            <tr>
                <th>Location Name</th>
                <th>City Name</th>
                <th>State Name</th>
                <th>Country Name</th>
                <th class="tac">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($locations as $location)
        <tr>
            <th>{{$location->location_name}}</th>
            <th>{{$location->city_name}}</th>
            <td>{{$location->state_name}}</td>
            <td>{{$location->country_name}}</td>
            <td class="tac action">
                @if ($location->active === 'Y')
                <a class="stat" id="{!! $location->id !!}" href="#" title="active"><i class="fa fa-check-circle fc_blue"></i></a>
                @elseif ($location->active === 'N')
                <a class="stat" id="{!! $location->id !!}" href="#" title="inactive"><i class="fa fa-check-circle fc_grey"></i></a>
                @endif
                <a class="marr15" title="Edit" href="{{url('location',$location->id)}}/edit"><i class="fa fa-edit fc_blue"></i></a>
                <a class='delete_link' class="marr15" title="Delete" href="#"><i class="fa fa-trash"></i></a>
                <!-- TODO: Delete Button -->
                {!! Form::open([
                'method' => 'DELETE',
                'class' => 'delete_class',
                'action'=>['LocationsController@destroy',$location->id]
                ]) !!}
                {!! Form::close() !!}
                
               <!-- <a href="#" class="marr15" title="view" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>
                <a href="#" title="Active"><i class="fa fa-check-circle fc_blue"></i></a>-->
            </td>                        
        </tr> 
        @endforeach
        </tbody>
    </table>
    	</div>
      </div>
    </div>
<script>
    $(document).ready(function() {
        $(".stat").click(function() {
            var id = $(this).attr('id');
            $.ajax({
                method: "GET",
                url: '<?php echo url('locationChangeStatus/'); ?>/' + id,
                success: function(data) {
                    window.location.href = "<?php echo url('location'); ?>";
                }
            });
        });

    });
</script>
@stop

