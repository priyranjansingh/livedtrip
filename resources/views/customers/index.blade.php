@extends('master')
@section('content')
<div class="box_p">
      <div class="titel_bar clear">
        <div class="p_titel">Customer Management</div>
       <!--<a class="btn_o fr" href="customer/create"><i class="fa fa-plus"></i> Add Customer</a>-->
      </div>
      <div class="from_p"> 
      	<div class="res_table">
      	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table table-striped">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Customer Details</th>
                <th class="tac">Action</th>
            </tr>
        </thead>
        <tbody>
       @foreach ($customers as $content)
       @if($content->id != Auth::user()->id)
        <tr>
            <td>{{$content->name}}</td>
            <td>{{$content->email}}</td>
            <td class="tac action">
                <a class="marr15" title="Edit" href="{{url('customer',$content->id)}}/edit"><i class="fa fa-edit fc_blue"></i></a>
				
                <a class='delete_link' class="marr15" title="Delete" href="#"><i class="fa fa-trash"></i></a>
                <!-- TODO: Delete Button -->
                {!! Form::open([
                'method' => 'DELETE',
                'class' => 'delete_class',
                'route' => ['customer',$content->id]
                
                ]) !!}
                
                {!! Form::close() !!}
				
				
            </td>                        
        </tr> 
        @endif
        @endforeach
        </tbody>
    </table>
    	</div>
      </div>
    </div>
@stop

