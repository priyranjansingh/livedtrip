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
        {!! Form::open(array('url' => 'login')) !!}
    	<div class="col-5 col-bdr-right">
        	<h4>Sign in to MyTravelDesk securely</h4>
            <div class="fg">
            <label>Email Address</label>
            {!! Form::text('email',null,['class'=>'tbox'])!!}
            </div>
            <div class="fg">
            <label>Password</label>
            <input type="password" class="tbox" name="password">
            <a href="{{url('forgot_password')}}">Forgot Password?</a>
            </div> 
            
            <input type="submit" value="Submit" class="btn_small bg_black fc_white">
            <div class="my-or"><span>or</span></div>
            <a href="#" class="btn_big bg_blue fc_white"><i class="fa fa-facebook-small"></i> Login with Facebook</a>
            <h5>Don't have MyTravelDesk Account? Create it now!</h5>
            <a href="{{url('signup')}}" class="btn_big bg_yellow fc_black">Sign Up</a>
        </div>
         {!!  Form::close()  !!}
        <div class="col-5 fr hide_col" style="float:right">
        	<h4>Why Sign in?</h4>
            <ul class="yt-list">
                <li><i class="ico ico-book-large"></i> Book faster with pre-filled forms</li>
                <li><i class="ico ico-clock-large"></i> Check booking history</li>
                <li><i class="ico ico-manage-large"></i> Manage cancellation &amp; refunds</li>
                <li><i class="ico ico-print-large"></i> Print e-tickets</li>
            </ul>
        </div>
    </div>
</div>      
</div>
@stop