<ul class="l_box v_grid">

    @foreach ($package_arr as $package)

    <li>
        <div class="lv_l">
            <h3>{{$package['main']->package_title}}</h3>
            <!--<p class="flL vendor mt-10 mb10"><strong>Seller</strong> :<a style="color:#000!important" class="vendor ng-binding">mytraveldesk.in</a></p>-->
            <p class="bg_white customi_p dib">
                @if($package['group']=='YES')
                <i class="fa fa-sliders"></i> Group Package
                @endif
                @if($package['customizable']=='YES')
                <i class="fa fa-sliders"></i> Customizable 
                @endif
                <span class="bg_black fc_white">
                {{$package['main']->totalnight}} Nights</span>
            </p>
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
                <a href="{{url('details/'.$package['main']->package_title,$package['main']->id)}}" class="btn_big bg_yellow fc_black fl">View Details </a>
                <!--<a href="#" class="compare_ico fr" title="Add to Compare"><i class="fa fa-balance-scale"></i></a>-->
            </div>
        </div>
    </li>

    @endforeach
</ul>

