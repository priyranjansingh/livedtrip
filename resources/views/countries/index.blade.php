@extends('master')
@section('content')
<div class="box_p">
      <div class="titel_bar clear">
        <div class="p_titel">Country Management</div>
        <a class="btn_o fr" href="country/create"><i class="fa fa-plus"></i> Add Country</a>
      </div>
      <div class="from_p"> 
      	<div class="res_table">
      	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table table-striped">
        <thead>
            <tr>
                <th>Country Name</th>
                <th class="tac">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($countries as $country)
        <tr>
            <td>{{$country->country_name}}</td>
            <td class="tac action">
                <a class="marr15" title="Edit" href="{{url('country',$country->id)}}/edit"><i class="fa fa-edit fc_blue"></i></a>
                <a class='delete_link' class="marr15" title="Delete" href="#"><i class="fa fa-trash"></i></a>
                <!-- TODO: Delete Button -->
                {!! Form::open([
                'method' => 'DELETE',
                'class' => 'delete_class',
                'route' => ['country',$country->id]
                
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

