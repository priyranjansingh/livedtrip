@extends('master')
@section('content')
<div class="box_p">
      <div class="titel_bar clear">
        <div class="p_titel">Tour Theme Management</div>
        <a class="btn_o fr" href="tour-theme/create"><i class="fa fa-plus"></i> Add Tour Class</a>
      </div>
      <div class="from_p"> 
      	<div class="res_table">
      	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table table-striped">
        <thead>
            <tr>
                <th>Tour Theme Name</th>
                <th class="tac">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tour_themes as $tour_theme)
        <tr>
            <td>{{$tour_theme->theme_title}}</td>
            <td class="tac action">
                <!--<a class="marr15" title="Edit" href="{{url('tour-theme',$tour_theme->id)}}/edit"><i class="fa fa-edit fc_blue"></i></a>-->
                <a class='delete_link' class="marr15" title="Delete" href="#"><i class="fa fa-trash"></i></a>
                <!-- TODO: Delete Button -->
                {!! Form::open([
                'method' => 'DELETE',
                'class' => 'delete_class',
                'action'=>['TourThemesController@destroy',$tour_theme->id]
                
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
@stop

