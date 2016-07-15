<!doctype html>
<html>
<head>
<?php session_start();  ?>    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="_token" content="{!! csrf_token() !!}"/>

@if(Request::is('search*'))
<title>{{$going_to}} Holiday Packages - Book {{$going_to}} Packages, {{$going_to}} Vacations and Tour Packages with MyTravelDesk.in</title>
<meta name="description" content="{{$going_to}} Holidays - Book {{$going_to}} Tours & {{$going_to}} travel packages at MyTravelDesk.in, India. {{$going_to}} Tour & holiday Packages can be customized. Plan a travel to {{$going_to}} and its various tourist attractions at lowest prices. Explore exciting {{$going_to}} Tourism with best deals from MyTravelDesk.in" />
<meta name="keywords" content=“{{$going_to}} Packages, {{$going_to}} Holiday Packages, {{$going_to}} Tours, {{$going_to}} Vacation, {{$going_to}} Vacation Packages, {{$going_to}} Holidays, {{$going_to}} Trip, {{$going_to}} Honeymoon Packages" lang="en-US" />
<meta property="og:title" content="{{$going_to}} Holiday Packages - Book {{$going_to}} Packages, {{$going_to}} Vacations and Tour Packages with MyTravelDesk.in, India" />
<meta property="og:site_name" content=“MyTravelDesk.in" />
<meta property="og:description" content="{{$going_to}} Holidays - Book {{$going_to}} Tours & {{$going_to}} travel packages at MyTravelDesk.in, India. {{$going_to}} Tour & holiday Packages can be customized. Plan a travel to {{$going_to}} and its various tourist attractions at lowest prices. Explore exciting {{$going_to}} Tourism with best deals from MyTravelDesk.in" />
@else
    <title>@if(isset($meta_title)){{$meta_title}}@else My Travel Desk @endif</title>
    <meta name="description" content=@if(isset($meta_description))"{{$meta_description}}"@else"My Travel Desk"@endif/>
    <meta name="keywords" content=@if(isset($meta_keywords))"{{$meta_keywords}}"@else"My Travel Desk"@endif/>
    @if(isset($metatag))
        {!! $metatag !!}
    @endif
@endif
<link href="{{ asset('front/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('front/css/chosen.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('front/css/magnific-popup.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('front/css/owl.carousel.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('front/css/jquery-ui.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('front/css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('front/css/travel_ico.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('front/css/responsive.css') }}" rel="stylesheet" type="text/css">

<script type="text/javascript" src="{{ asset('front/js/jquery-1.11.2.min.js') }}"></script>    
<script src="{{ asset('front/js/jquery-ui.js') }}"></script>
</head>

<body>
<!--Header-->
<div class="h_top">
  <div class="wraper">
    <div class="row">
        <div class="col-4 logo_p"><a href="{{url('/home')}}"><img src="{{ asset('front/images/logo.png') }}"  alt="My Travel Desk"></a>
      <span class="toggle_menu"><i class="fa fa-navicon"></i></span>
      </div>
      <div class="col-8 tar">
        <ul class="top_menu">
          <li><a href="#"><i class="fa fa-cc-visa"></i> Save Big!! <i class="fa fa-info-circle"></i> </a>
          <div class="t_sub t_menu info-content pad15">Select Visa card holders can check their eligibility and unlock exclusive deals. <small class="visa-applicable-txt">* Applicable for flights &amp; hotels</small></div>
          </li>
          <li> <a href="#">My Account <?php //echo $_SESSION['FULLNAME'];  ?> <i class="fa fa-angle-down"></i></a> 
          	<ul class="t_sub t_menu acc_drop">
                <?php if(!session('user_email')){  ?>    
            	<li>
                	<div class="clear padm">
                        <a href="{{url('user/login')}}" class="fl btn_small bg_yellow fc_black">Login</a>
                        <a href="{{url('user/signup')}}" class="fr btn_small bg_black fc_white">Signup</a>
                    </div>
                </li>
                <li>
            	<div class="padm"><a href="{{url('user/facebook')}}" class="tac btn_small bg_blue fc_white db"><i class="fa fa-facebook"></i> Login</a></div>
                </li>
                <li>
            	<div class="padm"><a href="{{url('user/google')}}" class="tac btn_small bg_yellow fc_white db"><i class="fa fa-google"></i> Login</a></div>
                </li>
                <?php }else{   ?>
                <li><a href="#">My Bookings</a></li>
                <li><a href="#">Cancel Bookings</a></li>
                <li><a href="#">Re-schedule Bookings</a></li>
                <li><a href="#">Print E-tickets</a></li>
                 <li><a href="{{url('user/logout')}}">Logout</a></li>
                <?php  } ?>
            </ul>
          
          </li>
          <li><!--<div class="hotlineno">
              <p>call +91.9477077777,</p>
              <p>+91.8335856622</p>
            </div>--> 
            <a href="#"> Customer Support <i class="fa fa-angle-down"></i></a>
            <ul class="t_sub t_menu tal">
              <li><a title="My Bookings" href="#">My Bookings</a></li>
              <li><a title="Cancel Bookings" href="#">Cancel Bookings</a></li>
              <li><a title="Print E-tickets" href="#">Print E-tickets</a></li>
              <li><a title="Customer Forums" href="#">Customer Forums</a></li>
              <li><a title="Contact Us" href="#">Contact Us</a></li>
              <li><a title="Make a Payment" href="#">Make a Payment</a></li>
              <li><a title="Complete Booking" href="#">Complete Booking</a></li>
              <li><a title="Retail Offices" href="#">Retail Offices</a></li>
              <li><a title="Assurance Claim" href="#">Assurance Claim</a></li>
            </ul>
          </li>
          <li> <a href="#" class="btn_radious bg_ash fc_black mart5"><i class="fa fa-list"></i></a>
            <ul class="t_sub dl-menuwrapper">
              <li><a href="http://mytraveldesk.in/index.html" title="MyTravelDesk | Hotels, Flights, Domestic &amp; International Holiday Packages, Activities" target="_parent"><span id="home"></span>Home</a></li>
              <li><a href="http://mytraveldesk.in/flight.html" title=">MyTravelDesk | Book Domestic &amp; International Flights" target="_parent"><span id="flight"></span>Flights</a> </li>
              <li><a href="http://mytraveldesk.in/hotel.html" title="MyTravelDesk | Book Hotels, Domestic &amp; International Hotels, Book Hotels at Best Rates, Hotel Deals"><span id="hotel"></span>Hotels</a></li>
              <li><a href="http://mytraveldesk.in/activities.html" title="MyTravelDesk - Activities, Sightseeing"><span id="activity"></span>Activities</a></li>
              <li><a href="http://mytraveldesk.in/transfer.html" title="MyTravelDesk - Worldwide Transfer"><span id="transfer"></span>Transfers</a></li>
              <li><a href="http://mytraveldesk.in/holiday.html" title="MyTravelDesk | Domestic &amp; International Holiday Packages, Customised Holidays"><span id="holiday"></span>Holiday</a></li>
              <li><a href="http://mytraveldesk.in/insurance.html" title="MyTravelDesk | Travel Insurance Online 24 x 7"><span id="insurance"></span>Insurance</a></li>
              <li><a href="http://mytraveldesk.in/collection.html" title="Holiday Collection by MyTravelDesk"><span id="collection"></span>Holiday Collection</a></li>
              <li class=""><a href="#"><span id="aboutussite"></span>About Site </a>
                <ul class="dl-submenu">
                  <li><a href="http://mytraveldesk.in/about.php" title="MyTravelDesk | About Us"><span id="aboutus"></span>About Us</a></li>
                  <li><a href="http://mytraveldesk.in/feedback.php" title="MyTravelDesk | Feedback"><span id="feedback"></span>Feedback</a></li>
                  <li><a href="http://mytraveldesk.in/privacy.php" title="MyTravelDesk | Privacy Policy"><span id="privacy"></span>Privacy Policy</a></li>
                  <li><a href="http://mytraveldesk.in/terms.php" title="MyTravelDesk | Terms Conditions"><span id="termscondition"></span>Terms &amp; Conditions</a></li>
                  <li><a href="http://mytraveldesk.in/sitemap.php" title="MyTravelDesk | Sitemap"><span id="sitemap"></span>Site Map</a></li>
                </ul>
              </li>
              <li><a href="#"><span id="customersupport"></span>Customer Support</a>
                <ul class="dl-submenu">
                  <li><a href="http://mytraveldesk.in/userlogin.php" title="MyTravelDesk | Account"><span id="signin"></span>Sign In</a></li>
                  <li><a href="http://mytraveldesk.in/userregistration.aspx" title="MyTravelDesk | Sign Up"><span id="signup"></span>Sign Up</a></li>
                  <li><a href="http://mytraveldesk.in/userlogin.php" title="MyTravelDesk | Account"><span id="managebooking"></span>Manage Booking</a></li>
                  <li><a href="http://www.flightstats.com/go/FlightTracker/flightTracker.do?guid=f62c4e5c14d7e552:-65a16d75:147f1d32e7e:-1ac2"><span id="flightstatus"></span>Check Flight Status</a></li>
                  <li><a href="http://mytraveldesk.in/faq.php" title="MyTravelDesk | FAQ"><span id="faq"></span>FAQ's</a></li>
                  <li><a href="http://mytraveldesk.in/userlogin.php" title="MyTravelDesk | Account"><span id="print"></span>Print E-Ticket</a></li>
                  <li><a href="http://mytraveldesk.in/userlogin.php"><span id="cancellation"></span>Cancellation</a></li>
                </ul>
              </li>
              <li><a href="#"><span id="mytravel"></span>MyTravelDesk</a>
                <ul class="dl-submenu">
                  <li><a href="http://mytraveldesk.in/clientreviews.php" title="MyTravelDesk | Client Reviews"><span id="review"></span>Client Reviews</a></li>
                  <li><a href="http://mytraveldesk.in/travelguide.php" title="MyTravelDesk | Travel Guide"><span id="travelguide"></span>Travel Guide</a></li>
                </ul>
              </li>
              <li><a href="#"><span id="travelpartner"></span>Travel Partners</a>
                <ul class="dl-submenu">
                  <li><a href="http://partner.mytraveldesk.in/" title="Partner Login | MyTravelDesk" target="_blank"><span id="travelpartnersprogram"></span>Travel Partners Program</a></li>
                  <li><a href="http://partner.mytraveldesk.in/registration.aspx" title="Partner Sign Up | MyTravelDesk" target="_blank"><span id="travelpartnerssignup"></span>Travel Partners Sign Up</a></li>
                </ul>
              </li>
              <li class="last"><a href="http://mytraveldesk.in/contact.php" title="MyTravelDesk | Contact Us"><span id="contactus"></span>Contact Us</a></li>
            </ul>
          </li>
        </ul>
        </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--Header--> 
<!--Content-->
 @yield('content')
<!--Content--> 
<!--Footer-->
<div class="footer">
  <div class="footer_top">
    <div class="wraper">
      <div class="row">
        <div class="f_col">
        <h5>Corporate Information</h5>
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">The MyTravelDesk Team</a></li>
            <li><a href="#">Our Investors</a></li>
            <li><a href="#">MyTravelDesk Blog</a></li>
            <li><a href="#">Sitemap</a></li>
          </ul>
        </div>
        <div class="f_col">
        <h5>Traveldesk Services</h5>
          <ul>
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Fare Rules</a></li>
            <li><a href="#">User Agreement</a></li>
            <li><a href="#">Some Useful Links</a></li>
          </ul>
        </div>
        <div class="f_col">
        <h5>Customer Care</h5>
          <ul>
            <li><a href="#">Help & FAQs</a></li>
            <li><a href="#">MyTravelDesk in Your City</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Visa Information</a></li>
            <li><a href="#">Reschedule Flights</a></li>
            <li><a href="#">eCash - FAQs</a></li>
            <li><a href="#">Hold For Free-FAQs</a></li>
          </ul>
        </div>
        <div class="f_col">
        <h5>Why Buy With Traveldesk</h5>
          <ul>
            <li><a href="#">Testimonials</a></li>
            <li><a href="#">Awards Won</a></li>
            <li><a href="#">MyTravelDesk in the News</a></li>
            <li><a href="#">Press Releases</a></li>
            <li><a href="#">Airfare Assurance - FAQs</a></li>
          </ul>
        </div>
        <div class="f_col">
        <h5>Partner With Us</h5>
          <ul>
            <li><a href="#">Become an Affiliate</a></li>
            <li><a href="#">Become a Channel Partner</a></li>
            <li><a href="#">Register Your Hotel</a></li>
            <li><a href="#">Advertise With Us</a></li>
            <li><a href="#">Holiday Advisors</a></li>
            <li><a href="#">Sell Holiday Packages</a></li>
          </ul>
        </div>
        <div class="f_col">
        <h5>Products</h5>
          <ul>
            <li><a href="http://mytraveldesk.in/flight.html">Flights</a></li>
            <li ><a title="MyTravelDesk | Book Hotels, Domestic &amp; International Hotels, Book Hotels at Best Rates, Hotel Deals" href="http://mytraveldesk.in/hotel.html">Hotels</a></li>
            <li ><a title="MyTravelDesk - Activities, Sightseeing" href="http://mytraveldesk.in/activities.html">Activities</a></li>
            <li ><a title="MyTravelDesk - Worldwide Transfer" href="http://mytraveldesk.in/transfer.html">Transfers</a></li>
            <li ><a title="MyTravelDesk | Domestic &amp; International Holiday Packages, Customised Holidays" href="http://mytraveldesk.in/holiday.html">Holiday</a>
              </p>
            <li ><a title="MyTravelDesk | Travel Insurance Online 24 x 7" href="http://mytraveldesk.in/insurance.html">Insurance</a></li>
          </ul>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-6 f_logo"> <span><img src="{{ asset('front/images/f_logo_01.png') }}" /></span> <span><img src="images/f_logo_02.png" /></span> </div>
        <div class="col-2 tar">
          <div class="social"> <a target="_blank" title="MyTravelDesk Facebook" href="https://www.facebook.com/mytraveldesk"><i class="fa fa-facebook"></i></a> <a target="_blank" title="MyTravelDesk Twitter" href="https://twitter.com/mytraveldeskin"><i class="fa fa-twitter"></i></a> <a target="_blank" title="MyTravelDesk Linkedin" href="https://www.linkedin.com/company/mytraveldesk"><i class="fa fa-linkedin"></i></a> <a target="_blank" title="MyTravelDesk google+" href="https://plus.google.com/+MytraveldeskIn"><i class="fa fa-google-plus"></i></a> </div>
        </div>
        <div class="col-4 f_cart">
          <div class="car_l">
            <div class="card7"><a></a></div>
            <div class="card8"><a></a></div>
          </div>
          <div class="car_r">
            <div class="acpt">We Accept</div>
            <div class="card_s">
              <div class="card2"><a></a></div>
              <div class="card3"><a></a></div>
              <div class="card4"><a></a></div>
              <div class="card5"><a></a></div>
              <div class="card6"><a></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <div class="wraper"> &copy; 2016 mytraveldesk.in. All Rights Reserved. </div>
  </div>
</div>
<!--Footer--> 
<!-- jquery --> 


<script src="{{ asset('front/js/owl.carousel.js') }}"></script>
<script src="{{ asset('front/js/chosen.jquery.js') }}"></script> 
<script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('front/js/custom.js') }}"></script>    
<script type="text/javascript">
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>

<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"/Ca6j1a4ZP00yg", domain:"mytraveldesk.in",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=/Ca6j1a4ZP00yg" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->
<script>

	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	ga('create', 'UA-46092484-1', 'auto');
	ga('send', 'pageview');
	
	</script> 
        
<script type="application/ld+json">
	{
	"@context" : "http://schema.org",
	"@type" : "Organization",
	"name" : "MyTravelDesk",
	"logo" : "http://mytraveldesk.in/images/logo.png",
	"url" : "http://mytraveldesk.in",
	"sameAs" : [
	"https://www.facebook.com/mytraveldesk",
	"https://twitter.com/mytraveldeskin",
	"https://plus.google.com/+MytraveldeskIn",
	"https://in.linkedin.com/company/mytraveldesk"],
	"contactPoint" : [{
	"@type" : "ContactPoint",
	"telephone" : "+919477077777",
	"contactType" : “Customer Support"
	}]
	
	}
	
</script>

</body>
</html>
