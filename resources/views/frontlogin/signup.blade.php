@extends('front_master')
@section('content')
<div class="content_pan bdrt">

<div class="wraper"> 
	<div class="log_box clear">
         @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        {!! Form::open(array('url' => 'signup')) !!}
    	<div class="col-5 col-bdr-right">
        	<h4>Create Your MyTravelDesk Account</h4>
            <p class="separator">Enter the email address associated with Yatra.com and click <strong>Submit</strong></p>
            <div class="fg">
            <label>First Name</label>
            {!! Form::text('fname',null,['class'=>'tbox'])!!}
            </div>
            <div class="fg">
            <label>Last Name</label>
            {!! Form::text('lname',null,['class'=>'tbox'])!!}
            </div>            
            <div class="fg">
            <label>Mobile Number</label>
            {!! Form::text('phone',null,['class'=>'tbox'])!!}
            </div>              
            <div class="fg">
            <label>Email Address</label>
            {!! Form::text('email',null,['class'=>'tbox'])!!}
            </div>              
            <div class="fg">
            <label>Password</label>
            <!-- {!! Form::password('password',null,['class'=>'tbox']) !!}  -->
            <input type="password" class="tbox" name="password">
            </div>             
            <div class="fg">
            <label>Confirm Password</label>
            <input type="password" class="tbox" name="password_confirmation">
            <!--<input type="password" name="confirm_password" class="tbox"/>-->
            </div>             
            <div class="fg">
            <p><span class="ck_box">
                {!! Form::checkbox('check_box',null,['class'=>'tbox'])!!}
                <span></span></span> I would like to be kept informed of special promotions and offers by TravelDesk. </p>
            </div>              
            <input type="submit" value="Register" class="btn_small bg_black fc_white">
        </div>
        {!!  Form::close()  !!}
        <div class="col-6 fr hide_col" style="float:right">
        	<h4>Do more with a MyTravelDesk Account</h4>
            <ul class="yt-list">
                <li><i class="ico ico-book-large"></i> Access booking history with upcoming trips</li>
                <li><i class="ico ico-print-large"></i> Print tickets and invoices</li>
                <li><i class="ico ico-checkout-large"></i> Make checkouts simpler</li>
                <li><i class="ico ico-email-large"></i> Enter your contact details only once</li>
                <li><i class="ico ico-alert-large"></i> Get alerts for low fares</li>
            </ul>
        </div>
    </div>
</div>      
</div>
@stop