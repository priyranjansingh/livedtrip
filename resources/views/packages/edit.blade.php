@extends('master')
@section('content')
<link href="{{ asset('datepicker/jquery-ui.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('datepicker/jquery-ui.js') }}" type="text/javascript"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<div class="box_p">
      <div class="titel_bar clear">
        <div class="p_titel">Edit:{!! $package->package_title !!}</div>
        
      </div>
      <div class="from_p">
        	<div class="tac marb15"><h4>Package Information</h4></div>
                       @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
        	{!! Form::model($package,['method'=>'PATCH','action'=>['PackagesController@update',$package->id]]) !!}
		<div class="row">
            	<div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4">Package Title:</label>
                        <div class="col-md-8">
                           {!! Form::text('package_title',null,['class'=>'tbox'])!!}
                        </div>
                    </div> 
                </div>
            	<div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4">Package Cost:</label>
                        <div class="col-md-8">
                           {!! Form::text('package_cost',null,['class'=>'tbox'])!!}
                        </div>
                    </div> 
                </div>                
            </div>
            <div class="row">    
                <div class="col-md-6">
                    <div class="form-group">
                                        <label class="col-md-4">Valid - From:</label>
                                        <div class="col-md-8">
					{!! Form::text('validfrom',null,['id'=>'validfrom','class'=>'tbox datepicker'])!!}                   
                                        </div>
                                        </div>
                </div>
                <div class="col-md-6">
                	<div class="form-group">
                	<label class="col-md-4">Valid - To:</label>
                    <div class="col-md-8">
                        {!! Form::text('validto',null,['id'=>'validto','class'=>'tbox datepicker'])!!}                   
                    </div>
                    </div>                                        
                </div>                
            </div>
                    <div class="row">    
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Total Days:</label>
                    <div class="col-md-8">
                        {!! Form::text('totalday',null,['class'=>'tbox'])!!}                   
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Total Nights:</label>
                    <div class="col-md-8">
                        {!! Form::text('totalnight',null,['class'=>'tbox'])!!}                   
                    </div>
                </div>                                        
            </div>                
        </div>
            <div class="row">    
                <div class="col-md-12">
                    <div class="form-group">
                    <label class="col-md-4">Terms:</label>
                    <div class="col-md-8">
                       {!! Form::textarea('terms',null,['class'=>'t_area','id'=>'terms'])!!}               
                    </div>
                    </div>
                </div>             
            </div>            
            <div class="row">
            	<div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4">Inclusions:</label>
                        <div class="col-md-8">
			{!! Form::textarea('inclusions',null,['class'=>'t_area','id'=>'inclusions'])!!}                   
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row">
            	<div class="col-md-12">
                    <div class="form-group">
                        <label class="col-md-4">Exclusions:</label>
                        <div class="col-md-8">
			{!! Form::textarea('exclusions',null,['class'=>'t_area','id'=>'exclusions'])!!}                    
                        </div>
                    </div> 
                </div>
             </div>  
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-4">Cancellation Policy:</label>
                    <div class="col-md-8"> 
                        {!! Form::textarea('cancellation_policy',null,['class'=>'t_area','id'=>'cancellation_policy'])!!}                    
                    </div>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-4">Payment Policy:</label>
                    <div class="col-md-8">
                        {!! Form::textarea('payment_policy',null,['class'=>'t_area','id'=>'payment_policy'])!!}                   
                    </div>
                </div> 
            </div>

        </div> 
        <div class="row">    
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-4">Detailed Day Wise Itinerary:</label>
                    <div class="col-md-8">
                    {!! Form::textarea('detail_itinerary',null,['class'=>'t_area','id'=>'detail_itinerary'])!!} 
                    </div>
                </div>
            </div> 
       </div>
        <div class="row">    
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-4">Package Overview:</label>
                    <div class="col-md-8">
                    {!! Form::textarea('package_overview',null,['class'=>'t_area','id'=>'package_overview'])!!} 
                    </div>
                </div>
            </div> 
        </div>        
              
             <div class="row">  
                <div class="col-md-6">
                	<div class="form-group">
                	<label class="col-md-4">Package ordering:</label>
                    <div class="col-md-8">
                    	{!! Form::text('package_ordering',null,['class'=>'tbox'])!!}
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="form-group">
                	<label class="col-md-4">Last Date of booking:</label>
                    <div class="col-md-8">
                    	{!! Form::text('lastbooking_date',null,['class'=>'tbox datepicker'])!!}
                    </div>
                    </div>
                </div>                
            </div>
             <div class="row">  
                <div class="col-md-6">
                	<div class="form-group">
                	<label class="col-md-4">Promotional:</label>
                    <div class="col-md-8">
                            <span class="rd_box">
                                {!!Form::radio('promotional', 'Y')!!}
                                <span></span>
                                <label>Yes</label>
                            </span> 
                            <span class="rd_box">
                                {!!Form::radio('promotional', 'N')!!}
                                <span></span>
                                <label>No</label>
                            </span>                     
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4">Package tag:</label>
                        <div class="col-md-8">
                    	{!! Form::text('package_tag',null,['class'=>'tbox'])!!}
                    </div>
                    </div>
                </div>                
            </div>     
        <div class="row">    
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Tour Theme:</label>
                    <div class="col-md-8">
                    {!! Form::select('theme_id[]', $tour_themes,$package_themes,['class'=>"chosen-select-no-single",'multiple'=>"multiple"]) !!}
                    </div>
                </div>
            </div>  
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Tour Class:</label>
                    <div class="col-md-8">
                        {!! Form::select('class_id', $tour_classes,$package_classes,['class'=>"chosen-select-no-single"]) !!}
                    </div>
                </div>                                        
            </div>                
        </div>
        <div class="row"> 
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Tour Category:</label>
                    <div class="col-md-8">
                        {!! Form::select('cat_id[]', $tour_categories,$package_cats,['class'=>"chosen-select-no-single",'multiple'=>"multiple"]) !!}
                    </div>
                </div>                                        
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4">Tour Inclusions:</label>
                    <div class="col-md-8">
                        {!! Form::select('inclusion_id[]', $tour_inclusions,$package_inclusions,['class'=>"chosen-select-no-single",'multiple'=>"multiple"]) !!}
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
                	<label class="col-md-4">Keywords:</label>
                    <div class="col-md-8">
                            {!! Form::text('keywords',null,['class'=>'t_area'])!!}                    
                    </div>
                    </div>
                </div>
            </div>        
			<div class="row">
            	<div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-4">Meta tag:</label>
                        <div class="col-md-8">
                            {!! Form::textarea('metatag',null,['class'=>'t_area'])!!}           
                        </div>
                    </div> 
                </div>
                <div class="col-md-6">
                <div class="form-group">
                	<label class="col-md-4">Meta description:</label>
                    <div class="col-md-8">
                    	{!! Form::textarea('meta_desc',null,['class'=>'t_area'])!!}  
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
			<input type="submit" value="Continue" class="btn_small bg_blue st1_btn">
                </div>
            </div>                     
        </form>       		
      </div>
  </div>
<script language="javascript">
$(function() {
    $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    });
    $(".chosen-container-multi").css('width','100%');
});
CKEDITOR.config.allowedContent = true;
CKEDITOR.replace( 'package_overview', {
    enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
});
CKEDITOR.replace( 'inclusions', {
    enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
});
CKEDITOR.replace( 'exclusions', {
    enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
});
CKEDITOR.replace( 'payment_policy', {
    enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
});
CKEDITOR.replace( 'cancellation_policy', {
    enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
});
CKEDITOR.replace( 'detail_itinerary', {
    enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
});
CKEDITOR.replace( 'terms', {
    enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
});
CKEDITOR.replace( 'service_policy', {
    enterMode : CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P
});

</script>
@stop