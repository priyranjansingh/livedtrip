$(document).ready(function() {				
	//Date picker
	$( "#datepicker" ).datepicker();
	$( "#datepicker1" ).datepicker();
		
	//inar-details
	$(".feedback").magnificPopup({
  		type:'inline',
  		midClick: true 
	});
	
	//home
	$(".ad_btn").click(function(){
		$('.ad_search').slideToggle();
	});
	
	$(".totaltoplinks").click(function(){
		$('#toplinkstoggle').slideToggle();
	});	
	$(".log_btn").click(function(){
		$('.reg_form').hide();
		$('.forgot_form').hide();
		$('.log_form').fadeIn();
		
		return false;
	});	
		
	$("#forget_btn").click(function(){
		$('.log_form').hide();
		$('.forgot_form').fadeIn();
		return false;
	});		
	
	$("#reg_btn").click(function(){
		$('.log_form').hide();
		$('.reg_form').fadeIn();
		return false;
	});	
		
	
	
	//common
	$(".top_menu>li>a").click(function(){
		$('.dl-submenu').slideUp();
		if($(this).next('.t_sub').hasClass('active')){
			$(this).next('.t_sub').removeClass('active');
			$(this).next('.t_sub').slideUp();
			
		}else{
			$(this).next('.t_sub').addClass('active');
			$(this).next('.t_sub').slideDown();		
		}
	});
	
/*06-02*/	
	$('.dl-submenu').prev('a').addClass('r_arrow');	
	
	$('.r_arrow').click(function(){
		$(this).parent('li').siblings().find('.dl-submenu').slideUp();	
		$(this).next('.dl-submenu').slideToggle();
	});
	
/*06-02*/	

	$('.i_box >a').click(function(){
		$(this).next('.tool').fadeToggle();
		
		setTimeout(function(){
		  $('.tool').fadeOut();
		}, 2000);
		return false;
	});	
	
	$('.i_box >a').click(function(){
		
		$(this).next('.m_box').fadeToggle();
		return false;
	});	
		
	$('.m_box .close').click(function(){
		$('.m_box').fadeOut();
		return false;
	});	
	
	// responsive navbar
/*	$('.navbar-toggle').click(function(e){
	$('.top_menu > ul').slideToggle("1000");
	});
	//
	$('.myaccount').click(function() {
		$('.myacc-panel').toggle("slow");
	});*/
	//	



//listing page	
	$(".Sort_p > span").click(function(){
		$(this).siblings().removeClass('active up down');
		//$(this).addClass('active down');
		if($(this).hasClass('active down')){
			$(this).removeClass('active down').addClass('active up');
		}else{
			$(this).removeClass('active up').addClass('active down');
		}
		

	});
	
	$(".list_v").click(function(){
		$('.rc').removeClass('active');
		$(this).addClass('active');
		$('.view').html('List View');
		$('.l_box').removeClass('v_grid').addClass('v_list');
			$('.l_pan').removeClass('close_P').addClass('open_p');
			$('.r_pan').removeClass('one_cole').addClass('two_col');		
	});
	$(".grid_v").click(function(){
		$('.rc').removeClass('active');
		$(this).addClass('active');
		$('.view').html('Grid View');
		$('.l_box').removeClass('v_list').addClass('v_grid');
		
			$('.l_pan').removeClass('open_p').addClass('close_P');
			$('.r_pan').removeClass('two_col').addClass('one_cole');		
	});	
	
//list left panel	
	$(".list_filter_mn").click(function(){
		if($('.l_pan').hasClass('close_P')){
			$(this).children('.list_filter_handelar').html('<i class="fa fa-arrow-right"></i>');
			$('.l_pan').removeClass('close_P').addClass('open_p');
			$('.r_pan').removeClass('one_cole').addClass('two_col');			
		}else{
			$(this).children('.list_filter_handelar').html('<i class="fa fa-arrow-left"></i>');
			$('.l_pan').removeClass('open_p').addClass('close_P');
			$('.r_pan').removeClass('two_col').addClass('one_cole');
		}
	});	
	

//Listing Details

$('.more').click(function(){
	if($(this).parent().find('.exp').hasClass('min')){
		$(this).parent().find('.exp').removeClass('min');
		$(this).html('More -');
	}else{
		$(this).parent().find('.exp').addClass('min');
		$(this).html('More +');
	}
	return false;
});



	$(".dt_menu li a").click(function() {
		//alert($(this).attr('data-type'));
		$(".dt_menu li a").removeClass('active');
		$(this).addClass('active');
		$('html, body').animate({
			scrollTop: $('#'+$(this).attr('data-type')).offset().top-150
		}, 2000);
	});	

$('#goToTop').click(function(){
	$("html, body").animate({scrollTop: 0}, 2000)
});
//Timeline	
	$('.timeline >li a').click(function(){
		$('.timeline >li a').removeClass('active');
		$(this).addClass('active');
		
		$("html, body").animate({scrollTop: $('.'+$(this).attr('data-type')).offset().top-190}, 2000);
		
		return false;
	});
	
	$('.a_title').click(function(){
		if(!$(this).hasClass('active')){
			$(this).addClass('active');
			$(this).next('.a_con').slideUp();
		}else{
			$(this).removeClass('active');
			$(this).next('.a_con').slideDown();
			
		}
	});
	
//alert($('.d_fixed').height());
	
	}); // Document ready Close
	
	
	

$(window).scroll(function() {   

//detail top fixd	
    if ($(window).scrollTop() > 170 ) {
        $('body').addClass("fixed_p");
    }else{
		
		$('body').removeClass("fixed_p");
	}


//Timeline fixd
	var offset = $(".sedule_con").offset().top;
	var posY = offset - $(window).scrollTop();
	var sd_h =$(".sedule_con").outerHeight();
	var offB =sd_h-450;

	
    if (posY < 200 && posY >-offB ) {
        $(".timeline").addClass("strick");
    }else{
		
		$(".timeline").removeClass("strick");
	}
	
	
	/*var pot=$('.place_2').offset().top
	var potY=pot- $(window).scrollTop();
	
	console.log(potY);
	if(potY<400){
		alert('y');
		
	}*/
	
	
	
}); 

	//Owl Slider
	$('.home-slider').owlCarousel({
	loop:true,	
    animateOut: 'fadeOut',
    items:1,
	autoplay:true,
	autoplayTimeout:5000
	})


	//Owl Slider package	
	$('.package').owlCarousel({
      autoPlay: 3000, //Set AutoPlay to 3 seconds
      items : 3,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
	});	
	

$('.owl-carousel-p').owlCarousel({
    loop:true,
    margin:15,
    nav:true,
	navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})	
	
	// Select box		
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
	if($(selector).length>0)	
		
      $(selector).chosen(config[selector]);
    }	