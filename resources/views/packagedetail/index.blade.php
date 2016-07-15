@extends('master')
@section('content')
<div class="box_p">
      <div class="titel_bar clear">
        <div class="p_titel">Package Details</div>
        @if(count($existing_packages) < $totalday->totalday )
        <a class="btn_o fr" href="{{url('packagedetail/create',$package_id)}}"><i class="fa fa-plus"></i> Add More</a>
        @endif
      </div>
        @if(count($existing_packages) >= $totalday->totalday )
        <div class="clear"></div>  
        <div class="row">
            <div class="col-sm-12" style="padding-top: 6px;">
                <p class="text-center" style="color:green">You have completed the Package details entry for {{$totalday->totalday}} days package. You can't Add More Day.</p> 
            </div>    
        </div>
        @endif
      <div class="from_p"> 
      	<div class="res_table">
        @if ($existing_packages)
        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table table-striped">
            <thead>
                <tr>
                    <th>Day</th>                   
                    <th>Country Name</th>
                    <th>State Name</th>
                    <th>City Name</th>
                    <th>Location Name</th>
                    <th class="tac">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($existing_packages as $existing_package)
                <tr>
                    <th>{{$existing_package->package_day}}</th>
                    <td>{{$existing_package->country_name}}</td>
                    <td>{{$existing_package->state_name}}</td>
                    <th>{{$existing_package->city_name}}</th>                    
                    <td>{{$existing_package->location_name}}</td>
                    <td class="tac action">
                        <a class="marr15" title="Edit" href="{{url('packagedetail',$existing_package->id)}}/edit"><i class="fa fa-edit fc_blue"></i></a>
                        <!--<a class='delete_link' class="marr15" title="Delete" href="#"><i class="fa fa-trash"></i></a>-->
                        <!-- TODO: Delete Button -->
                        <!--{!! Form::open([
                        'method' => 'DELETE',
                        'class' => 'delete_class',
                        'route' => ['packagedetail',$existing_package->id]
                        ]) !!}
                        {!! Form::close() !!}-->

<!-- <a href="#" class="marr15" title="view" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i></a>
<a href="#" title="Active"><i class="fa fa-check-circle fc_blue"></i></a>-->
                    </td>                        
                </tr> 
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

      </div>
    </div>
@stop

