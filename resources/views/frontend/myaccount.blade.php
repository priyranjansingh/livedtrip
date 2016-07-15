@extends('front_master')
@section('content')
<div class="content_pan bdrt">
<div class="wraper"> 
	<div class="log_box clear">
             My Account
    	<div class="col-5 col-bdr-right">
        	<?php echo session('user_email');  ?>
        </div>
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