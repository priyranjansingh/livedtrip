@extends('master')
@section('content')
<div class="box_p">
      <div class="titel_bar clear">
        <div class="p_titel">Tour Category Management</div>
        <a class="btn_o fr" href="tour-category/create"><i class="fa fa-plus"></i> Add Tour Category</a>
      </div>
      <div class="from_p"> 
      	<div class="res_table">
      	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table table-striped">
        <thead>
            <tr>
                <th>Tour Category Name</th>
                <th class="tac">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tour_categories as $tour_category)
        <tr>
            <td>{{$tour_category->category_title}}</td>
            <td class="tac action">
                @if ($tour_category->active === 'Y')
                <a class="stat" id="{!! $tour_category->id !!}" href="#" title="active"><i class="fa fa-check-circle fc_blue"></i></a>
                @elseif ($tour_category->active === 'N')
                <a class="stat" id="{!! $tour_category->id !!}" href="#" title="inactive"><i class="fa fa-check-circle fc_grey"></i></a>
                @endif
               <!--<a class="marr15" title="Edit" href="{{url('tour-category',$tour_category->id)}}/edit"><i class="fa fa-edit fc_blue"></i></a>-->
                <a class='delete_link' class="marr15" title="Delete" href="#"><i class="fa fa-trash"></i></a>
                <!-- TODO: Delete Button -->
                {!! Form::open([
                'method' => 'DELETE',
                'class' => 'delete_class',
                'action'=>['TourCategoriesController@destroy',$tour_category->id]
                
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
                url: '<?php echo url('tourcatagoryChangeStatus/'); ?>/' + id,
                success: function(data) {
                    window.location.href = "<?php echo url('tour-category'); ?>";
                }
            });
        });

    });
</script>
@stop

