@extends('front_master')
@section('content')
<div class="content_pan home_p"> 
  <!--home baner-->
  <div class="home_baner">
    <div class="home-slider">
      <div class="item" style="background-image:url({{ asset('front/images/s01.jpg') }})"></div>
      <div class="item" style="background-image:url({{ asset('front/images/s02.jpg') }})"></div>
    </div>
    <!--home Search-->
    <div class="h_search">
      <div class="s_top"><i class="fa fa-search"></i> Holidays</div>
      <div class="s_body">
        <h6 class="col-12 fc_white marb15">Find your escape</h6>
        {!! Form::open(array('url' => 'search')) !!}
        <div class="clear">
          <div class="scol-3">
<!--            <input type="text" placeholder="Leaving from (optional)" class="tbox"/>-->
            {!! Form::text('going_from',null,['id'=>'going_from','class'=>'tbox','placeholder'=>'Leaving from (optional)'])!!}
          </div>
          <div class="scol-3">
            <!--<input type="text" placeholder="Going to" class="tbox"/>-->
             {!! Form::text('going_to',null,['id'=>'going_to','class'=>'tbox','placeholder'=>'Going to'])!!}
          </div>
          <div class="scol-3">
<!--            <select data-placeholder="Month of Travel (Any)" class="chosen-select-no-single tbox">
              <option value=""></option>
              <option>1</option>
              <option>2</option>
            </select>-->
              {!! Form::select('travel_month',$month,'',['id'=>'travel_month','class'=>"chosen-select-no-single tbox"]) !!}
          </div>
          <div class="scol-1 tac">
<!--            <input type="submit" class="btn_small bg_yellow fc_black" value="Search" />-->
             {!! Form::submit('Search',['class'=>'btn_small bg_yellow fc_black'])!!}
          </div>
        </div>
         {!!  Form::close()  !!}
        <div class="clear">
          <div class="col-12 ad_search_pan"> <span class="btn_small bg_yellow fc_black ad_btn">Advanch Search</span>
            <div class="ad_search">
              <div class="row">
                <div class="scol-3">
                  <label>Search by themes(Optional)</label>
                  <select data-placeholder="All" class="chosen-select-no-single tbox">
                    <option value=""></option>
                    <option>1</option>
                    <option>2</option>
                  </select>
                </div>
                <div class="scol-3">
                  <label>Budget(Optional)</label>
                  <select data-placeholder="Any" class="chosen-select-no-single tbox">
                    <option value=""></option>
                    <option>1</option>
                    <option>2</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--home Search--> 
  </div>
  <!--home baner-->
  
  <div class="section_1">
    <div class="wraper">
      <div class="tac">
        <h2 class="s_titel">My Travel desk Bargain</h2>
      </div>
      <ul>
        <li> <a href="#"> <img src="{{ asset('front/images/s101.jpg') }}" /> <span class="i_titel clear">Delightful Himachal <span class="rs">₹ 23450</span></span> </a> </li>
        <li> <a href="#"> <img src="{{ asset('front/images/s102.jpg') }}" /> <span class="i_titel">Pleasant Andaman <span class="rs">₹ 28450</span></span> </a> </li>
        <li> <a href="#"> <img src="{{ asset('front/images/s103.jpg') }}" /> <span class="i_titel">Kashmir Super Savern <span class="rs">₹ 26450</span></span> </a> </li>
        <li> <a href="#"> <img src="{{ asset('front/images/s104.jpg') }}" /> <span class="i_titel clear">Simply Australia <span class="rs">₹ 129990</span></span> </a> </li>
        <li> <a href="#"> <img src="{{ asset('front/images/s105.jpg') }}" /> <span class="i_titel">Rajasthan <span class="rs">₹ 19450</span></span> </a> </li>
        <li> <a href="#"> <img src="{{ asset('front/images/s106.jpg') }}" /> <span class="i_titel">Westbengal <span class="rs">₹ 10450</span></span> </a> </li>
      </ul>
    </div>
  </div>
  <div class="section_2">
    <div class="tac">
      <h2 class="s_titel">Crazy Deals & Offers</h2>
    </div>
    <div class="i_list l4">
      <h4>Bhutan</h4>
      <div class="i_amount">Starting from <strong><span>₹</span> 20,999</strong></div>
      <img src="{{ asset('front/images/p1.jpg') }}" /> </div>
    <div class="i_list l4">
      <h4>Northeast</h4>
      <span class="i_amount">Starting from <strong><span>₹</span> 15,999</strong></span> <img src="{{ asset('front/images/p2.jpg') }}" /> </div>
    <div class="i_list l4">
      <h4>Kashmir</h4>
      <span class="i_amount">Starting from <strong><span>₹</span> 26,999</strong></span> <img src="{{ asset('front/images/p3.jpg') }}" /> </div>
    <div class="i_list l3">
      <h4>Andaman</h4>
      <span class="i_amount">Starting from <strong><span>₹</span> 36,999</strong></span> <img src="{{ asset('front/images/p4.jpg') }}" /> </div>
    <div class="i_list l3">
      <h4>Kerala</h4>
      <span class="i_amount">Starting from <strong><span>₹</span> 28,999</strong></span> <img src="{{ asset('front/images/p5.jpg') }}" /> </div>
    <div class="i_list l3">
      <h4>Nepal</h4>
      <span class="i_amount">Starting from <strong><span>₹</span> 24,999</strong></span> <img src="{{ asset('front/images/p6.jpg') }}" /> </div>
    <div class="i_list l3">
      <h4>Rajasthan</h4>
      <span class="i_amount">Starting from <strong><span>₹</span> 29,999</strong></span> <img src="{{ asset('front/images/p7.jpg') }}" /> </div>
  </div>
  <div class="section_3">
    <div class="wraper">
      <div class="row">
        <div class="col-4">
          <h4>Fresh Destinations</h4>
          <div class="bg_pan">
            <ul class="b_list">
              <li>
                <div class="thumb"><img src="{{ asset('front/images/t01.jpg') }}" /></div>
                <div class="t_con">
                  <h5>Magical Andamans - Super Saver from Bangalore</h5>
                  <p>6 Nights/ 7 Days </p>
                  <div>Starting from <span>₹36,999</span></div>
                </div>
              </li>
              <li>
                <div class="thumb"><img src="{{ asset('front/images/t02.jpg') }}" /></div>
                <div class="t_con">
                  <h5>Singapore - 3 Nights Getaway!</h5>
                  <p>6 Nights/ 7 Days </p>
                  <div>Starting from <span>₹36,999</span></div>
                </div>
              </li>
              <li>
                <div class="thumb"><img src="{{ asset('front/images/t03.jpg') }}" /></div>
                <div class="t_con">
                  <h5>Amazing Kashmir</h5>
                  <p>6 Nights/ 7 Days </p>
                  <div>Starting from <span>₹36,999</span></div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-4">
          <h4>Most Visited Destination</h4>
          <div class="bg_pan">
            <ul class="i_agll">
              <li><img src="{{ asset('front/images/th1.jpg') }}" /><span>Sikkim</span></li>
              <li><img src="{{ asset('front/images/th2.jpg') }}" /><span>Himachal</span></li>
              <li><img src="{{ asset('front/images/th3.jpg') }}" /><span>Simla</span></li>
              <li><img src="{{ asset('front/images/th4.jpg') }}" /><span>Darjeeling</span></li>
              <li><img src="{{ asset('front/images/th5.jpg') }}" /><span>Shillong</span></li>
              <li><img src="{{ asset('front/images/th6.jpg') }}" /><span>Singapore</span></li>
            </ul>
          </div>
        </div>
        <div class="col-4">
          <h4>My Travel Desk Guide</h4>
          <div class="bg_pan">
            <ul class="b_list">
              <li>
                <div class="thumb"><img src="{{ asset('front/images/thumb_02.jpg') }}" /></div>
                <div class="t_con">
                  <h5>Jaipur Lit Fest 2016</h5>
                  <p>April 30</p>
                </div>
              </li>
              <li>
                <div class="thumb"><img src="{{ asset('front/images/thumb_03.jpg') }}" /></div>
                <div class="t_con">
                  <h5>4-day Golden Triangle Tour From Delhi By Private Car</h5>
                  <p>April 30</p>
                </div>
              </li>
              <li>
                <div class="thumb"><img src="{{ asset('front/images/thumb_01.jpg') }}" /></div>
                <div class="t_con">
                  <h5>Overnight Agra Trip</h5>
                  <p>April 30</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section_4">
    <div class="tac">
      <h2 class="s_titel">Holiday Collections</h2>
    </div>
    <div class="h_table">
      <div class="h_cell">
        <div class="p_re"> <img src="{{ asset('front/images/eee53349f8499bb5092d3abed40bc716.jpg') }}" />
          <div class="titel">
            <h4>Family</h4>
            <p>Starting at <span class="rs">₹1,999</span></p>
          </div>
        </div>
      </div>
      <div class="h_cell">
        <div class="h_row p_re"> <img src="{{ asset('front/images/89456b757b71c5a2b071f8bf4dada466.jpg') }}" />
          <div class="titel">
            <h4>Beach</h4>
            <p>Starting at <span class="rs">₹2,500</span></p>
          </div>
        </div>
        <div class="h_row p_re"> <img src="{{ asset('front/images/0f1e9f7ac9446fc48929330b7c804531.jpg') }}" />
          <div class="titel">
            <h4>Hill Stations</h4>
            <p>Starting at <span class="rs">₹4,555</span></p>
          </div>
        </div>
      </div>
      <span class="brek_p"> &nbsp;</span>
      <div class="h_cell">
        <div class="p_re"><img src="{{ asset('front/images/5f2cf31c13e8fe6613a0cca5d0039013.jpg') }}" />
          <div class="titel">
            <h4>Honeymoon</h4>
            <p>Starting at <span class="rs">₹5,000</span></p>
          </div>
        </div>
      </div>
      <div class="h_cell">
        <div class="h_row p_re"> <img src="{{ asset('front/images/2019b009c38cf730cc5c39c605dfd3de.jpg') }}" />
          <div class="titel">
            <h4>Adventure</h4>
            <p>Starting at <span class="rs">₹2,250</span></p>
          </div>
        </div>
        <div class="h_row p_re"> <img src="{{ asset('front/images/0e03771051a6ce4adc8cfceabd1b2a7b.jpg') }}" />
          <div class="titel">
            <h4>Weekend Trips</h4>
            <p>Starting at <span class="rs">₹2,250</span></p>
          </div>
        </div>
      </div>
      <div class="h_cell">
        <div class="p_re"> <img src="{{ asset('front/images/bffbaf7f71a675e804c2daea03c00b39.jpg') }}" />
          <div class="titel">
            <h4>Romantic</h4>
            <p>Starting at <span class="rs">₹5,500</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section_5">
    <div class="wraper">
      <h3 class="tac">WHY We are Defarent</h3>
      <p>MYorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut efficitur ante. Donec dapibus dictum scelerisque. Maecenas semper erat et justo porta auctor nec lobortis elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut efficitur ante. Donec dapibus dictum scelerisque. Maecenas semper erat et justo porta auctor nec lobortis elit.</p>
      <ol>
        <li>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut efficitur ante.</p>
        </li>
        <li>
          <p>Dorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut efficitur ante.</p>
        </li>
        <li>
          <p>Sorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut efficitur ante.</p>
        </li>
        <li>
          <p>Qorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut efficitur ante.</p>
        </li>
        <li>
          <p>Rorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut efficitur ante.</p>
        </li>
        <li>
          <p>Borem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ut efficitur ante.</p>
        </li>
      </ol>
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
</script>
@stop