@extends('front_master')
@section('content')
<!--Content-->
<div class="content_pan">
	<div id="goToTop">
    	<i class="fa fa-arrow-up"></i>
        Top
    </div>
	<div class="floatmenu">
    	<div class="i_box">
        	<a href="#"><i class="fa fa-phone"></i></a>
            <ul class="social-share">
            <li>
              <i class="fa fa-phone"></i>
            </li>
            <li class="text-center call-us ng-binding">
             Call us at 94770 77777
            </li>
          </ul>
        </div>
        <div class="i_box">
        	<a class="feedback" href="#myModal"><i class="fa fa-commenting"></i></a>
        </div>
        <div class="i_box"><a href="#"><i class="fa fa-star"></i></a>
        	<div class="tool">
            	You have not shortlisted any Package. Choose atleast two packages for comparsion.
            </div>        
        </div>
        <div class="i_box">
        	<a href="#"><i class="fa fa-share-alt"></i></a>
            <ul class="social-share">
                <li>Share On: </li>
                <li>
                  <a title="Google" href="#"><i class="fa fa-google-plus"></i></a>
                </li>
                <li>
                  <a title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                  <a title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                  <a title="Email" href="#"><i class="fa fa-envelope"></i></a>
                </li>
            </ul>        
        </div>
        <div class="i_box">
        	<a href="#" title="View Favourites"><i class="fa fa-thumbs-up"></i></a>
        	<div class="m_box">
            	<span class="close"><i class="fa fa-times-circle"></i></span>
                <p>Now you can save your favourite packages to view them later.</p>
                
            </div>
        </div>        
        
    </div>
<!---->

<!--Search box-->
    <div class="inner_search_bar">
        <div class="wraper">
            <ul class="row s-menu">
                {!! Form::open(array('url' => 'search','id'=>'search')) !!}
                <li class="ico_p"><i class="fa fa-globe "></i></li>
                <li>
                    <i class="fa fa-map-marker"></i>
                    {!! Form::text('going_from',session('going_from'),['id'=>'going_from','class'=>'tbox','placeholder'=>'Leaving from (optional)'])!!}
                </li> 
                <li>
                    <i class="fa fa-map-marker"></i>
                    {!! Form::text('going_to',session('going_to'),['id'=>'going_to','class'=>'tbox','placeholder'=>'Going to'])!!}
                </li>
                <li>
                    {!! Form::select('travel_month',session('month'),session('travel_month'),['id'=>'travel_month','class'=>"chosen-select-no-single"]) !!}
                </li>
                <li>
                    {!! Form::submit('Search',['class'=>'btn_small bg_yellow fc_black'])!!}
                </li>
            </ul>
        </div>
    </div>    
<!--Search box--> 

      <div class="wraper">
        <div class="row">
        <ul class="page-breadcrumb">
                    <li><a href="{{url('home')}}"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="#"><i class="fa"></i>Holidays-India &amp; Abroad</a></li>
                    <li><a href="{{url('search/'.session('going_to'))}}"><i class="fa"></i>Holidays in {{session('going_to')}}</a></li>
                    <li>{{$package->package_title}}</li>
        </ul>
        </div>
     </div>
 
<div class="d_fixed">
    <div class="wraper">
        
        <div class="row">
            <div class="col-9">
                <div class="row d_top">
                    <div class="col-9">
                        <h1 class="fw600 marb15 d_titel">{{$package->package_title}}</h1>
                        <div class="res_hide"><!--Seller : My Travel Desk--> <span class="bg_black fc_white btn_small">{{$package->totalnight}} Nights </span></div>
                    </div>
                    <div class="col-13">
                                <div class="sf">Starting From</div>
                                <h2 class="fw800"><i class="rup">₹</i>{{$package->package_cost}}</h2>
                    </div>            	
                </div>
            </div>    
            <div class="col-3 res_hide">
                        <div class="book_p"><a href="#" class="btn_big bg_yellow fc_black">Book Now</a> <span class="dib">OR</span> <h4 class="dib fw400"> Call us at: <strong>9477077777</strong></h4></div>
                      <!--  <p>You can now directly communicate with the Seller of this package.</p> -->
            </div>
        </div>
        
        <div class="dt_menu">
        	<ul>
            	<li><a href="#photos" class=" active">Photos</a></li>
                <li><a href="#hotels">Hotels</a></li>
                <li><a href="#inclusions">Inclusions</a></li>
                <li><a href="#detailed">Detailed Itinerary</a></li>
                <li><a href="#about">About the Place</a></li>
            </ul>
        </div>
    </div>
</div> 
<div class="wraper detail_p"> 
	<section id="photos">     
    <div class="row">
    	<div class="col-9">
        	<div class="detail_slider ">
            <div class="big-images">
                @foreach ($package_gallery as $img_gallery)
                <div class="item"><img src="{{url('/images/package_gallery/'. $img_gallery->image_name) }}"></div>  
                @endforeach
                
            </div>
            <div class="thumbs">
                @foreach ($package_gallery as $img_gallery)
                <div class="item"><img src="{{url('/images/package_gallery/'. $img_gallery->image_name) }}"></div>    
                @endforeach
                
            </div>  
            </div>
        </div>
		<div class="col-3">
          <div class="box">
          <h5 class=" fw600 marb5"><i class="fa fa-sliders"></i> Independent Tour</h5>
          <p>Customisable itineraries where you may choose transport, stay & sightseeing as per your taste & comfort</p>
          </div>
          <div class="box">
          <h5 class="fw600 marb5"><i class="fa fa-home"></i> Stay Plan</h5>
          <p>
          @if(!empty($package_slot))
            @foreach ($package_slot as $slot)
                 {{$slot['city_name']}} - {{ $slot['night_count'] }} Nights<br />
            @endforeach
          @endif
          </p>
           </div> 
           <div class="box">
            <div class="clear">
            	<div class="fl pad15 bg_ash marr15"><i class="fa fa-thumbs-up"></i></div>
                <div class="fl">
                	<h3 class=" fw600">Favourite 3 Star</h3>
                    <div class=" fc_yellow"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></div>
                </div>
            </div>
            <p>Favourite of 1 people | <a href="#"> Add to your list!</a></p>
            </div>
        </div>
    </div>
    
    <div class="row res_inc">
        <div class="col-5">
            <h5 class="fw600 mart15">Inclusions</h5>
            @if(!empty($package_inclusions))
            <ul class="facility_in clear">
                @foreach ($package_inclusions as $package_inclusion)
                <li><i class="{{ $package_inclusion->css_class != '' ? $package_inclusion->css_class : 'fa-bed' }}"></i> <span>{{$package_inclusion->inclusion_title}}</span></li>
                @endforeach
            </ul>
            @endif
            

        </div>
        <div class="col-7 devider">
            @if(!empty($package_themes))
            <h5 class="fw600 mart15">Themes</h5>
            <ul class="facility_in clear">
                @foreach ($package_themes as $package_theme)
                <li><i class="{{ $package_theme->css_class != '' ? $package_theme->css_class : 'fa-bed' }}"></i> <span>{{$package_theme->theme_title}}</span></li>
                @endforeach
            </ul> 
            @endif
        </div>
    </div>
    
    <div class="row h_devider">
    <div class="col-12">
    <h5 class="fw600 mart15">Overview</h5>
    <p class="overdet">
        {!!$package->package_overview!!}
    </p>
    </div>
    </div>
    </section>
    <section id="hotels"> 
    <div class="row">
    <div class="col-12">
    <h5 class="fw600 mart15">Package Itinerary</h5>
    <div class="p_itinerary ">
    	<div class="col-1">
            @if(!empty($package_details))            
        	<ul class="timeline">
                    @for ($count=1;$count<=$package->totalday; $count++)
                        <li><a href="#place_{{$count}}"><span class="Day">Day-{{$count}}</span></a></li>                   
                    @endfor
                </ul>
            @endif
        </div>
    	<div class="col-11">
            @if(!empty($package_details))
        	<div class="sedule_con">
                    <?php $slot_count=1;
                    $slot_loop_count=1;
                    $day=1;
                    $state_name='';
                    ?>
                @foreach ($package_details as $package_detail)
                @if($slot_loop_count==1)
            	<div class="a_title">
                	<div class="place">{{$package_slot[$slot_count]['city_name']}}</div><div class="p_from">
                            <?php $to_day=$day+$package_slot[$slot_count]['day_count']-1;?>
                            {{ $package_slot[$slot_count]['day_count'] == 1 ? 'Day - '.$day : 'From: DAY-'.$day. ' to DAY-'.$to_day }}
                           
                        </div>
                </div>
                @endif
                <div class="a_con">   
                    <h4 id="place_{{$day}}">DAY-{{$day}}</h4>
                    <div class="day_p">
                    <div class="row">
                    	<div class="col-3">
                            
                            <div class="hotel_ico">
                            <h6>HOTEL</h6>
                            @if($slot_loop_count==1)
                            <p class="ithotel">CHECK IN FOR {{$package_slot[$slot_count]['night_count']}} NIGHTS</p>
                            
                            @endif                            
                           <?php if($slot_loop_count==$package_slot[$slot_count]['day_count']){
                            $slot_loop_count=1;
                            $slot_count++;
                            echo '<p class="ithotel">CHECK OUT</p>';
                            }
                            else{
                            $slot_loop_count++;
                            }?>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="clear">
                            <div class="h_thumb">
                                 @if($package_detail->hotel_image != '')
                                 <img src="{{url('/images/hotel_image/'. $package_detail->hotel_image ) }}" width="70" height="70" />
                                @else
                                <img src="{{url('/images/location_image/no-image.jpg') }}" width="70" height="70" />
                                @endif
     
                            </div>
                            <div class="h_con">
                        	<h6><a href="#hotel_modal{{$package_detail->hotel_id}}" class="open-popup-link">{{$package_detail->hotel_name}}</a></h6>
                            	<div class="ico-rating s{{$package_detail->star_rating}}"></div>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="day_p">
                     <div class="row">
                    	<div class="col-3">
                            <div class="sightt_ico">
                            <h6>SIGHTSEEING</h6>
                            </div>
                        </div>
                        <div class="col-9">
                            {!!$package_detail->sightseeing!!}
                        </div>
                    </div> 
                    </div>   
                    <div class="day_p">
                     <div class="row">
                    	<div class="col-3">
                            <div class="meal_ico">
                            <h6>MEAL</h6>
                            </div>
                        </div>
                        <div class="col-9">
                            {!!$package_detail->meal!!}
                        </div>
                    </div> 
                    </div> 
                    <?php $day++;
                     
                    $state_name=$package_detail->state_name;
                    ?>
                </div>
                @endforeach                               
            </div>
            @endif
        </div>
    </div>
    </div>
    </div>
    </section>
    <section id="inclusions"> 
    <div class="row  h_devider">
        <div class="col-6">
            <h5 class="fw600 mart15">Inclusions</h5>
            
            {!! $package->inclusions !!}
        </div>
        <div class="col-6">
            <h5 class="fw600 mart15">Exclusions</h5>
            {!! $package->exclusions !!}
        </div>
    </div>

    <div class="row policy_p">
        <div class="col-6">
            <h5 class="fw600 mart15">Payment Policy</h5>
            {!! $package->payment_policy !!}
            
        </div>
        <div class="col-6">
            <h5 class="fw600 mart15">Cancellation Policy</h5>
            <div class="scroll_p">
            <div class="exp min">
            
                {!! $package->cancellation_policy !!}
            </div>
            </div> 
            <span class="more">More +</span>  
                                  
        </div>
    </div>
    <div class="row policy_p">
        <div class="col-12">
            <h5 class="fw600 mart15">Package Terms & Conditions</h5>
            <div class="scroll_p">
            <div class="exp min">
            
                {!! $package->terms !!}
            </div>
            </div> 
            <span class="more">More +</span>  
                                  
        </div>
    </div>
    </section>
    <section id="detailed"> 
    <div class="row h_devider">
    <div class="col-12">
    <h5 class="fw600 mart15">Detailed Day Wise Itinerary</h5>
    	<div class="exp min">
        {!! $package->detail_itinerary !!}
    	</div>
        <span class="more">More +</span>        
    </div>
    </div>    
    </section>
    <section id="about">
    <div class="row ">
    @if(!empty($package_locations))   
    <h5 class="fw600 mart15 " id="about">About Destination</h5>
    <ul class="tmenu" >
    @foreach ($package_locations as $locations)
        <li><a href="#" deta-name="{{$locations->location_id}}">About {{$locations->location_name}}</a></li>
     @endforeach
    </ul>
     @foreach ($package_locations as $locations)
         <div class="tc about_p" id="{{$locations->location_id}}">
        <p class="overdet">
           @if($locations->location_image != '')
            <img src="{{url('/images/location_image/'. $locations->location_image ) }}" class="fl marr15 about_p" width="200" />
            @else
            <img src="{{url('/images/location_image/no-image.jpg') }}" class="fl marr15 about_p" width="200" />
            @endif
            {{$locations->destination_details}}</p>
        </div>
    
    @endforeach
    @endif
    </div>
    </section>
       
</div>      
</div>
<!--Content-->
@foreach($package_hotels as $hotel)
    <div class="white-popup mfp-hide" id="hotel_modal{{$hotel->id}}">
    <div class="modal-content">
        <div class="modal-body">
<div class="row h_photo">
    <div class="col-4">
        <div class="pop_big">
            <div  id="tbanner">
                @if (!empty($hotel->hotel_image))
            <img src="{{url('/images/hotel_image/'. $hotel->hotel_image ) }}"/>
            @else
            <img src="{{url('/images/location_image/no-image.jpg') }}"/>
            @endif
                
            </div>           
        </div>               
    </div>
    <div class="col-4">
    	<ul class="pop_thumbs">
            @if (!empty($hotel_gallery[$hotel->id]))
            @foreach($hotel_gallery[$hotel->id] as $hg)
            @if (!empty($hg->image_name))
            <li class="item"><a href="{{url('/images/hotel_gallery/'. $hg->image_name ) }}"><img src="{{url('/images/hotel_gallery/'. $hg->image_name ) }}"></a></li>
           
             @else
             <li class="item"><a href="{{url('/images/location_image/no-image.jpg') }}"><img src="{{url('/images/location_image/no-image.jpg') }}"></a></li>           
            @endif
             @endforeach 
             @endif
        </ul>
    </div>
    <div class="col-4">
        <h4 class="modal-title fw600">{{$hotel->hotel_name}} </h4>
        <p>{{$hotel->hotel_address}}</p>
        <div class="ico-rating s{{$hotel->star_rating}}"></div>
    </div>
</div>

            <h5 class="mart15 fw600">Hotel description </h5>
        	<div class="scroll_p">
{{$hotel->hotel_description}}
            </div>
        
        </div>
    </div>
</div>
@endforeach

<div class="white-popup mfp-hide" id="myModal">
      <div class="modal-content">
        <div class="modal-header">
          <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
          <h4 class="modal-title fw600">Get the Best Holiday Planned by Experts!</h4>
        </div>
        <div class="modal-body">
          <div class="row">
          	<div class="col-8">
            	<h5><i class="fa fa-phone round"></i> <strong>Call 94770 77777</strong></h5>
                <div class="or_p"><span>OR</span></div>
                <p>Enter your contact details and we will plan the best holiday suiting all your requirements.</p>
                <div class="row">
                	<div class="col-6 marb15"><input type="text" class="tbox" placeholder="Your Name" /></div>
                    <div class="col-6 marb15"><input type="email" class="tbox" placeholder="Your E-mail" /></div>
                	<div class="col-6 marb15">
                    	<div class="c_left">
                    		<input type="tel" class="tbox col-1" value="91" />
                    	</div>
                    	<div class="c_right">
                     		<input type="tel" class="tbox col-11" placeholder="Mobile Number" />
                        </div>    
                     </div>
                    <div class="col-6 marb15">
                    <select data-placeholder="Month of Travel (Any)" class="chosen-select-no-single tbox">
                    	<option>Your City</option>
                        <option>Kolkata</option>
                    </select></div>                    
                    <div class="col-4 marb15"><input type="text" class="tbox" id="datepicker1" /></div>
                    <div class="col-8 marb15"><span class="ck_box valigntop"><input type="checkbox" /><span></span></span> Travelling with more than 10 passengers</div>
                    <div class="col-12 tar"><input type="submit" class="btn_small bg_yellow fc_black" /></div>
                </div>
                
            </div>
            <div class="col-4">
            	<img src="{{ asset('front/images/eee53349f8499bb5092d3abed40bc716.jpg') }}" />
            </div>
          </div>
        </div>
        <div class="modal-footer tal">
           By submitting this form, you authorize MyTravelDesk.in to contact you for this enquiry.
 Know More
        </div>
      </div>
  </div>
<script>
//Slide Carosol	
            $(function() {
            $("#going_from").autocomplete({
            minLength: 3,
            source: '<?php echo url('auto'); ?>',
            });
                    $("#going_to").autocomplete({
            minLength: 3,
            source: '<?php echo url('auto'); ?>',
            });
            });
jQuery(document).ready(function ($) {
    
    	$('.open-popup-link').magnificPopup({
	  type:'inline',
	  midClick: true,
	/*callbacks: {
		open: function() {
			alert(); 
			pop_gallery()
			}
		 
		}*/
	  
	});


	var $sync1 = $(".big-images"),
		$sync2 = $(".thumbs"),
		flag = false,
		duration = 300;

	$sync1
		.owlCarousel({
			items: 1,
			margin: 0,
			nav: true,
			navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
			dots: false,
			center: false,
			loop: false
		})
		.on('changed.owl.carousel', function (e) {
			if (!flag) {
				flag = true;
				$sync2.trigger('to.owl.carousel', [e.item.index, duration, true]);
				flag = false;
			}
		});

	$sync2
		.owlCarousel({
			margin: 0,
			items: 10,
			nav: false,
			center: false,
			dots: false,
			navText : ["&lsaquo;", "&rsaquo;"]

		})
		.on('click', '.owl-item', function () {
			$sync1.trigger('to.owl.carousel', [$(this).index(), duration, true]);

		})
		.on('changed.owl.carousel', function (e) {
			if (!flag) {
				flag = true;		
				$sync1.trigger('to.owl.carousel', [e.item.index, duration, true]);
				flag = false;
			}
		});
		
		
	
	
		
		
});
$("#bck").click(function(){
    $("#search").submit();
    });
</script>
@stop