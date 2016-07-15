@extends('front_master')
@section('content')
<script>
    $(function() {
    $("#price-range").slider({
    range: true,
            min: {{$min_price}},
            max: {{$max_price}},
            values: [ {{$min_price}}, {{$max_price}} ],
            stop: function(event, ui) {
            var min_night = {{$min_night}};
                    var max_night = $("#duration_hidden").val();
                    var class_arr = $("#hid_class").val();
                    var theme_arr = $("#hid_theme").val();
                    var hid_sort = $("#hid_sort").val();
                    var package_type = $("#hid_package_type").val();
                    $.ajax({
                    method: "POST",
                            url: '<?php echo url('searchCriteria/'); ?>',
                            data:{min_night: min_night, max_night: max_night, min_price: ui.values[ 0 ], max_price: ui.values[ 1 ], class_arr:class_arr, theme_arr:theme_arr, hid_sort:hid_sort, package_type:package_type},
                            dataType:'json',
                            success: function(data) {
                            $(".r_pan").html(data.srch_html);
                                    $("#srch_pkg_count").html(data.srch_count);
                            }
                    });
                    $("#amount-min").val("Rs " + ui.values[ 0 ]);
                    $("#amount-max").val("Rs " + ui.values[ 1 ]);
            }
    });
            $("#amount-min").val("Rs " + $("#price-range").slider("values", 0));
            $("#amount-max").val("Rs " + $("#price-range").slider("values", 1));
    });
            $(function() {
            $("#slider-range-min").slider({
            range: "min",
                    value: {{$max_night}},
                    min: {{$min_night}},
                    max: {{$max_night}},
                    stop: function(event, ui) {
                    var min_price = $("#price-range").slider("values", 0);
                            var max_price = $("#price-range").slider("values", 1);
                            var class_arr = $("#hid_class").val();
                            var theme_arr = $("#hid_theme").val();
                            var hid_sort = $("#hid_sort").val();
                            var package_type = $("#hid_package_type").val();
                            $.ajax({
                            method: "POST",
                                    url: '<?php echo url('searchCriteria/'); ?>',
                                    data:{min_night: {{$min_night}}, max_night: ui.value, min_price : min_price, max_price : max_price, class_arr:class_arr, theme_arr:theme_arr, hid_sort:hid_sort, package_type:package_type},
                                    dataType:'json',
                                    success: function(data) {
                                    $(".r_pan").html(data.srch_html);
                                            $("#srch_pkg_count").html(data.srch_count);
                                    }
                            });
                            $("#duration").val("<=" + ui.value + " Nights");
                            $("#duration_hidden").val(ui.value);
                    }
            });
                    $("#duration").val("<=" + $("#slider-range-min").slider("value") + " Nights");
                    $("#duration_hidden").val($("#slider-range-min").slider("value"));
            });</script>
<div class="content_pan">
    <div id="goToTop">
        <i class="fa fa-arrow-up"></i>
        Top
    </div>
    <!---->
    <div class="floatmenu">
        <div class="i_box">
            <a href="#"><i class="fa fa-phone"></i></a>
            <ul class="social-share">
                <li>
                    <i class="fa fa-phone"></i>
                </li>
                <li class="text-center call-us ng-binding">
                    Call us at 1860 200 1800
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
                    {!! Form::text('going_from',$going_from,['id'=>'going_from','class'=>'tbox','placeholder'=>'Leaving from (optional)'])!!}
                </li> 
                <li>
                    <i class="fa fa-map-marker"></i>
                    {!! Form::text('going_to',$going_to,['id'=>'going_to','class'=>'tbox','placeholder'=>'Going to'])!!}
                </li>
                <li>
                    {!! Form::select('travel_month',$month,$travel_month,['id'=>'travel_month','class'=>"chosen-select-no-single"]) !!}
                </li>
                <li>
                    {!! Form::submit('Search',['class'=>'btn_small bg_yellow fc_black'])!!}
                </li>
            </ul>
        </div>
    </div>   
    <!--Search box--> 
    <div class="wraper"> 
        <div class="res_cat">
            <a href="#" class="btn_small bg_yellow fc_black">All packages({{ count($package_arr) }}) <i class="fa fa-arrow-circle-o-down"></i></a> | <a href="#" class="btn_small bg_white fc_black">Group packages({{ count($package_arr) }})</a>
        </div>
        <div class="res_hide">
            <div class="row">
                <!--Bredcomb-->
                <ul class="page-breadcrumb">
                    <li><a href="{{url('home')}}"><i class="fa fa-home"></i> Home</a></li><li><a href="#"><i class="fa"></i>Holidays-India&Abroad</a></li><li>Holidays in {{$going_to}}</li>
                </ul>
                <!--Bredcomb-->    
            </div>
            <h4 class="fw400">Showing <strong><span id="srch_pkg_count">{{ count($package_arr) }}</span> of {{ count($package_arr) }}</strong> packages for {{ $going_to  }}</h4>  
            <div class="t_bar clear">
                <div class="col-5">
                    <span class="r_hide">You are viewing : </span><a id="all_package" href="#" class="btn_small bg_yellow fc_black package_type">All packages({{ count($package_arr) }}) </a> | <a id="group_package"  href="#" class="btn_small bg_white fc_black package_type">Group packages({{ $group_package_count }})</a>
                    <input type="hidden" name="hid_package_type" id="hid_package_type" value="all_package">
                </div>
                <div class="col-3 tac">
                    <span class="view">Grid View:</span> <span class="list_v rc" title="List View"><i class="fa fa-list"></i></span> | <span class="grid_v rc active" title="Grid View"> <i class="fa fa-th-large"></i> </span>
                </div>
                <div  class="col-4 tar Sort_p">
                    Sort By :
<!--                    <span id="popular_filter" class="active down filter_class">Popular</span>-->
                    <span id="duration_filter" class="active down filter_class" >Duration</span>
                    <span id="price_filter" class="filter_class">Price</span>
                    <input type="hidden" name="hid_sort" id="hid_sort" value="duration_desc" >
                </div>
            </div>
        </div>
        <div class="clear list_box">
            <div class="l_pan close_P">
                <div class="list_filter_mn">
                    <div class="list_filter_handelar">
                        <i class="fa fa-arrow-left"></i>

                    </div>
                    <div class="list_filter_ico">
                        <a href="#" title="Price"><i class="fa fa-inr"></i></a>
                        <a href="#" title="Duration"><i class="fa fa-clock-o"></i></a>
                        <a href="#" title="Hotel Star Rating"><i class="fa fa-star"></i></a>
                        <a href="#" title="Transportation"><i class="fa fa-plane"></i></a>
                        <a href="#" title="Themes"><i class="fa fa-heart"></i></a>
                    </div>
                </div>
                <div class="list_filter_ex">
                    <div class="box"><a href="#"><h4 id="reset_filter"><i class="fa fa-filter"></i> RESET FILTERS <i class="fa fa-repeat"></i></h4></a></div>
                    <div class="box">
                        <h5><i class="fa fa-inr"></i> Price </h5>
                        <p>
                            <label for="amount">Price range:</label>
                            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                        </p>

                        <div id="price-range"></div>

                        <div class="clear">
                            <input type="text" id="amount-min" readonly class="dib fl" >
                            <input type="text" id="amount-max" readonly class="dib fr tar">
                        </div>
                    </div>
                    <div class="box">
                        <h5><i class="fa fa-clock-o"></i> Duration </h5>
                        <div id="slider-range-min"></div>
                        <input type="text" id="duration" readonly >
                        <input type="hidden" id="duration_hidden" value="{{$max_night}}" >
                    </div>

                    <div class="box">
                        <h5><i class="fa fa-star"></i> Hotel Star Rating </h5>
                        <ul class="l_tag">
                            @if(!empty($budget_count))
                            <li id="1" class="bg_ash cat"><a href="#"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></a>
                                <div>BUDGET <span class="db">({{$budget_count}})</span> </div>
                            </li>
                            @endif
                            @if(!empty($standard_count))
                            <li id="2" class="bg_ash cat"><a href="#"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></a>
                                <div>STANDARD <span class="db">({{$standard_count}})</span>  </div>
                            </li>
                            @endif
                            @if(!empty($premium_count))
                            <li id="3" class="bg_ash cat"><a href="#"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></a>
                                <div>PREMIUM <span class="db">({{$premium_count}})</span>  </div>
                            </li>
                            @endif
                            @if($luxury_count)
                            <li id="4" class="bg_ash cat"><a href="#"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></a>
                                <div>LUXURY<span class="db">({{$luxury_count}})</span> </div>
                            </li>
                            @endif
                            @if($deluxe_count)
                            <li id="5" class="bg_ash cat"><a href="#"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></a>
                                <div>DELUXE<span class="db">({{$deluxe_count}})</span> </div>
                            </li>
                            @endif
                        </ul>
                        <input type="hidden" id="hid_class" name="class" >
                    </div> 
                    <!--                    <div class="box">
                                            <h5><i class="fa fa-plane"></i> Transportation from departure city</h5>
                                            <ul class="l_tag">
                                                <li><div>LANDONLY</div><a href="#" class="dib bg_ash pad15 r_cornar"><i class="fa fa-car"></i></a></li>
                                            </ul>                     
                                        </div>-->
                    <div class="box">
                        <h5><i class="fa fa-heart"></i> Themes</h5>
                        <ul class="l_tag them">
                            @foreach($themes_array as $theme)
                            <li id="{{$theme->id}}" class="theme"><div>{{$theme->theme_title}}</div><a href="javascript:void(0)" class="dib bg_ash pad15 r_cornar"><i class="{{!empty($theme->css_class)?$theme->css_class:'fa-car'}}"></i></a></li>
                            @endforeach    
                        </ul>   
                        <input type="hidden" id="hid_theme" name="theme" >
                    </div>                
                </div>                                                
            </div>
            <div class="r_pan">
                <ul class="l_box v_grid">

                    @foreach ($package_arr as $package)

                    <li>
                        <div class="lv_l">
                            <h3>{{$package['main']->package_title}}</h3>
                            <!--<p class="flL vendor mt-10 mb10"><strong>Seller</strong> :<a style="color:#000!important" class="vendor ng-binding">mytraveldesk.in</a></p>-->
                            <p class="bg_white customi_p dib">
                                @if($package['customizable']=='YES')
                                <i class="fa fa-sliders"></i> Customizable 
                                @endif
                                @if($package['group']=='YES')
                                <i class="fa fa-sliders"></i> Group Package
                                @endif
                                <span class="bg_black fc_white">{{$package['main']->totalnight}} Nights</span></p>
                            <p class="city">
                                <?php $ct = 1; ?>
                                @foreach ($package['package_nights'] as $nights)
                                <span >@if($ct!=1)<i class="fa fa-long-arrow-right"></i>@endif{{$nights->city_name}}({{ $nights->night_count }})</span>
                                <?php $ct++; ?>
                                @endforeach
                            </p>
                            <div class="sec_boder">
                                <div class="t_gallery">
                                    <ul class="res-addons">
                                        <li><a href="#" title="Share"><i class="fa fa-share-alt"></i></a></li>
                                        <li><a href="#" title="Add to Favourites"><i class="fa fa-thumbs-up"></i></a></li>
                                        <li><a href="#" title="Submit Query"><i class="fa fa-comment"></i></a></li>
                                    </ul>
                                    <img src="{{url('/images/package_gallery/'. $package['package_gallery']->image_name) }}" />
                                </div>
                                @if(!empty($package['inclusions']))
                                <h6>Inclusions</h6>
                                <div class="facility clear">
                                    <ul>
                                        @foreach ($package['inclusions'] as $inclusion)
                                        <li><span><i class="{{ isset($inclusion->css_class) ? $inclusion->css_class : 'fa-bed' }}"></i></span> <div>{{$inclusion->inclusion_title}}</div></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="lv_r">
                            <div class="amount_pan row">
                                <div class="col-12">
                                    <div class="dib valigntop padr15 st_t">Starting From:</div>
                                    <div class="dib valigntop">
                                        <h1 class="fw600">₹{{$package['main']->package_cost}}</h1>
                                        <p>(Per Person on twin sharing)</p>
<!--                                            <p><span class="fc_yellow">EMI</span> from ₹614</p> -->
                                    </div>
                                </div>
                            </div>
                            <!--                                <h5 class="select_dt">
                                                                <span>Select a date: </span>
                                                                <span class="fw600"> <i class="fa fa-calendar fc_yellow"></i> Feb - Mar</span>
                                                            </h5>-->

                            <div class="clear mart15">
                                <a href="{{url('holidays/details/'.$package['main']->package_title,$package['main']->id)}}" class="btn_big bg_yellow fc_black fl">View Details </a>
                                <!--<a href="#" class="compare_ico fr" title="Add to Compare"><i class="fa fa-balance-scale"></i></a>-->
                            </div>
                        </div>
                    </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div> 
</div>      
</div>
<script>
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
            $(document).ready(function(){
    var min_night = {{$min_night}};
            var max_night = $("#duration_hidden").val();
            var class_arr = $("#hid_class").val();
            var theme_arr = $("#hid_theme").val();
            var hid_sort = $("#hid_sort").val();
            var min_price = $("#price-range").slider("values", 0);
            var max_price = $("#price-range").slider("values", 1);
            var package_type = $("#hid_package_type").val();
            $.ajax({
            method: "POST",
                    url: '<?php echo url('searchCriteria/'); ?>',
                    data:{min_night: min_night, max_night: max_night, min_price: min_price, max_price: max_price, class_arr:class_arr, theme_arr:theme_arr, hid_sort:hid_sort, package_type:package_type},
                    dataType:'json',
                    success: function(data) {
                    $(".r_pan").html(data.srch_html);
                            $("#srch_pkg_count").html(data.srch_count);
                    }
            });
            $(".cat").click(function(){
    var arr = new Array();
            $(this).toggleClass("active_cat");
            $(".active_cat").each(function(index) {
    arr.push($(this).attr('id'));
    });
            $("#hid_class").val(JSON.stringify(arr));
            var min_price = $("#price-range").slider("values", 0);
            var max_price = $("#price-range").slider("values", 1);
            var min_night = {{$min_night}};
            var max_night = $("#duration_hidden").val();
            var class_arr = $("#hid_class").val();
            var theme_arr = $("#hid_theme").val();
            var hid_sort = $("#hid_sort").val();
            var package_type = $("#hid_package_type").val();
            $.ajax({
            method: "POST",
                    url: '<?php echo url('searchCriteria/'); ?>',
                    data:{min_night: min_night, max_night: max_night, min_price : min_price, max_price : max_price, class_arr:class_arr, theme_arr:theme_arr, hid_sort:hid_sort, package_type:package_type},
                    dataType:'json',
                    success: function(data) {
                    $(".r_pan").html(data.srch_html);
                            $("#srch_pkg_count").html(data.srch_count);
                    }
            });
    });
            $(".theme").click(function(){
    var theme_arr = new Array();
            $(this).toggleClass("active_theme");
            $(".active_theme").each(function(index) {
    theme_arr.push($(this).attr('id'));
    });
            $("#hid_theme").val(JSON.stringify(theme_arr));
            var min_price = $("#price-range").slider("values", 0);
            var max_price = $("#price-range").slider("values", 1);
            var min_night = {{$min_night}};
            var max_night = $("#duration_hidden").val();
            var class_arr = $("#hid_class").val();
            var theme_arr = $("#hid_theme").val();
            var hid_sort = $("#hid_sort").val();
            var package_type = $("#hid_package_type").val();
            $.ajax({
            method: "POST",
                    url: '<?php echo url('searchCriteria/'); ?>',
                    data:{min_night: min_night, max_night: max_night, min_price : min_price, max_price : max_price, class_arr:class_arr, theme_arr:theme_arr, hid_sort:hid_sort, package_type:package_type},
                    dataType:'json',
                    success: function(data) {
                    $(".r_pan").html(data.srch_html);
                            $("#srch_pkg_count").html(data.srch_count);
                    }
            });
    });
            // for duration sorting
            $(".filter_class").click(function(){
    var filter_id = $(this).attr('id');
            if (filter_id == 'duration_filter')
    {
    if ($(this).hasClass('down'))
    {
    $("#hid_sort").val("duration_asc");
    }
    else if ($(this).hasClass('up'))
    {
    $("#hid_sort").val("duration_desc");
    }
    else
    {
    $("#hid_sort").val("duration_desc");
    }
    }
    else if (filter_id == 'price_filter')
    {
    if ($(this).hasClass('down'))
    {
    $("#hid_sort").val("price_asc");
    }
    else if ($(this).hasClass('up'))
    {
    $("#hid_sort").val("price_desc");
    }
    else
    {
    $("#hid_sort").val("price_desc");
    }
    }
    var min_night = {{$min_night}};
            var max_night = $("#duration_hidden").val();
            var class_arr = $("#hid_class").val();
            var theme_arr = $("#hid_theme").val();
            var hid_sort = $("#hid_sort").val();
            var min_price = $("#price-range").slider("values", 0);
            var max_price = $("#price-range").slider("values", 1);
            var package_type = $("#hid_package_type").val();
            $.ajax({
            method: "POST",
                    url: '<?php echo url('searchCriteria/'); ?>',
                    data:{min_night: min_night, max_night: max_night, min_price: min_price, max_price: max_price, class_arr:class_arr, theme_arr:theme_arr, hid_sort:hid_sort, package_type:package_type},
                    dataType:'json',
                    success: function(data) {
                    $(".r_pan").html(data.srch_html);
                            $("#srch_pkg_count").html(data.srch_count);
                    }
            });
    });
            // for package type sorting

            $(".package_type").click(function(){
    var id = $(this).attr('id');
            if (id == 'all_package')
    {
    $(this).removeClass('bg_white');
            $(this).addClass('bg_yellow');
            $("#group_package").addClass('bg_white');
            $("#hid_package_type").val('all_package');
    }
    else if (id == 'group_package')
    {
    $(this).removeClass('bg_white');
            $(this).addClass('bg_yellow');
            $("#all_package").addClass('bg_white');
            $("#hid_package_type").val('group_package');
    }
            var min_night = {{$min_night}};
            var max_night = $("#duration_hidden").val();
            var class_arr = $("#hid_class").val();
            var theme_arr = $("#hid_theme").val();
            var hid_sort = $("#hid_sort").val();
            var min_price = $("#price-range").slider("values", 0);
            var max_price = $("#price-range").slider("values", 1);
            var package_type = $("#hid_package_type").val();
            $.ajax({
            method: "POST",
                    url: '<?php echo url('searchCriteria/'); ?>',
                    data:{min_night: min_night, max_night: max_night, min_price: min_price, max_price: max_price, class_arr:class_arr, theme_arr:theme_arr, hid_sort:hid_sort, package_type:package_type},
                    dataType:'json',
                    success: function(data) {
                    $(".r_pan").html(data.srch_html);
                            $("#srch_pkg_count").html(data.srch_count);
                    }
            });
    });
            // end for package type sorting


    });
            $("#reset_filter").click(function(){
    $("#search").submit();
    });


</script>
@stop