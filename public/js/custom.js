// sagnikdebnath@gmail.com
$(document).ready(function(){
  $('.menu_toggle').click(function(event) {  
  	$('.side_menu').slideToggle();
  });	
  
	$('.d_menu').click(function(event){
		event.stopPropagation();
		$('.topsub-menu').slideToggle();
		event.startpropagation();
	});

  $('html').click(function(event) {  
  	$('.topsub-menu').slideUp();
  });
  
  $('.st1_btn').click(function(event) {  
  	$('.step-1').fadeOut();
	$('.step-2').fadeIn();
  });
  
	$('.st2_btn').click(function(event) {  
	$('.step-2').fadeOut();
	$('.step-3').fadeIn();
	});  
	
	//Select box 
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

	
	//File Upload
	$('.file').append('<input type="text" readonly="" class="file_tbox"> <button class="btn-file"></button>');
	$('.file').click(function() {
		//alert('y');
	$(this).find('.upload').show();
	$(this).find('.btn-file').prop('disabled', false);
	
		$(this).find('.upload').change(function() {
			//alert(this.vall());
			var filename = $(this).val();
			$(this).next('.file_tbox').val(filename);
			alert(filename.attr('src'));
		});	
	});	

//Accordian		
		
	$(".accordian li > .a_con").hide();
	$(".accordian li:first-child").addClass('active');
	$(".accordian li:first-child > .a_con").show();
	$(".accordian li > .a_menu").click(function(){
	if($(this).parent('li').hasClass('active')){
			$(this).parent('li').removeClass('active').addClass('t');
			$(this).parent('li').siblings().removeClass('active').addClass('t');
		}else{
			$(this).parent('li').removeClass('t').addClass('active');
			$(this).parent('li').siblings().removeClass('active').addClass('t');
		}
		$('li.active > .a_con').slideDown();
		$('li.t > .a_con').slideUp();	
	
		})	
});

