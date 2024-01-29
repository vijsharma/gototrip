<section class="layout-pb-md"> 
				<div class="section-bg layout-pb-md" id="about">
<div class="container pt-15"> 
	   
        <div class="">
            <div class="row y-gap-10 items-center justify-between">
                <div class="col-auto">
                    <div class="row x-gap-10 y-gap-5 items-center text-14 text-light-1">
                        <div class="col-auto">
                            <div class=""><a href="https://tr-tester.exploragoa.com"> <i class="fa fa-home"></i> Home</a></div>
                        </div>
                        <div class="col-auto"><div class="">&gt;</div></div>
                                                    <div class="col-auto active">
                                                                    <div class="text-dark-1">Contact</div>
                                                            </div>
                                                                        </div>
                </div>
            </div>
        </div> 
	  </div>
      <div class="section-bg__item col-12">
	  <div class="effect"></div>
                    <img src="https://tr-tester.exploragoa.com/uploads/demo/location/banner-detail/banner-location-1.jpg" alt="Paris" class="col-12 rounded-4">
              </div> 
      <div class="container pt-30">
        <div class="row x-gap-60 y-gap-20 items-center pt-20">
                                        <div class="col-lg-6 col-md-6 text-center text-center">
                <a href="/user/booking-history" class="bg-white button px-20 py-15 rounded-4 text-16">
                    <i class="icofont-ticket text-25 mr-10"></i>
                    Check Booking Status
                </a>
            </div>
                                <div class="col-lg-6 col-md-6 text-center text-center">
                <a href="/user/booking-history" class="bg-white button px-20 py-15 rounded-4 text-16">
                    <i class="icofont-island-alt text-25 mr-10"></i>
                    Modify Booking
                </a>
            </div>
            </div>
      </div>
	  
	  
    </div>  
		</section> 
    <div class="ratio ratio-16:9 d-none">
        <div class="map-ratio">
            <div class="iframe_map">
                {!! ( setting_item("page_contact_iframe_google_map")) !!}
            </div>
        </div>
    </div>
	<section class="layout-pb-md" id="faqs">
    <div class="container">
	<h2 class="text-22 fw-500">FAQs </h2>
        <div class="row y-gap-20 mt-15"> 
            <div class="col-auto">
                <div class="accordion -simple tr-style y-gap-20 js-accordion">
         
                <div class="accordion__item tr-style">
                    <div class="pl-15 accordion__button justify-between d-flex items-center">
                        <div class="text-dark-1 lh-16">When and where does the tour end?</div>
						<div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-10">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-chevron-up"></i>
                        </div>  
                    </div>

                    <div class="accordion__content">
                        <div class="pt-10 pl-15">
                            <p>Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you're free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!</p>
                        </div>
                    </div>
                </div> 
         
                <div class="accordion__item tr-style">
                    <div class="pl-15 accordion__button justify-between d-flex items-center">
                        <div class="text-dark-1 lh-16">When and where does the tour start?</div>
						<div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-10">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-chevron-up"></i>
                        </div>  
                    </div>

                    <div class="accordion__content">
                        <div class="pt-10 pl-15">
                            <p>Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.</p>
                        </div>
                    </div>
                </div> 
         
                <div class="accordion__item tr-style">
                    <div class="pl-15 accordion__button justify-between d-flex items-center">
                        <div class="text-dark-1 lh-16">Do you arrange airport transfers?</div>
						<div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-10">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-chevron-up"></i>
                        </div>  
                    </div>

                    <div class="accordion__content">
                        <div class="pt-10 pl-15">
                            <p>Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.</p>
                        </div>
                    </div>
                </div> 
         
                <div class="accordion__item tr-style">
                    <div class="pl-15 accordion__button justify-between d-flex items-center">
                        <div class="text-dark-1 lh-16">What is the age range</div>
						<div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-10">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-chevron-up"></i>
                        </div>  
                    </div>

                    <div class="accordion__content">
                        <div class="pt-10 pl-15">
                            <p>This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.</p>
                        </div>
                    </div>
                </div> 
            </div>

            </div>
        </div>
    </div>
</section>

<section class="layout-pb-md" id="faqs">
    <div class="container"> 
        <div class="row y-gap-20 mt-15"> 
            <div class="col-auto"></div>
			</div>
			</div>
</section>
    <section class="layout-pb-md"> 
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <form method="post" action="{{ route("contact.store") }}" class="bravo-contact-block-form">
                        {{csrf_field()}}
                        <div style="display: none;">
                            <input type="hidden" name="g-recaptcha-response" value="">
                        </div>
                        <div
                            class="px-40 pt-40 pb-30 lg:px-30 lg:py-30 md:px-24 md:py-24 bg-white rounded-4 shadow-4">
                            <div class="text-22 fw-500">
                                {{ __("Send a message") }}
                            </div>
                            <div class="row y-gap-20 pt-20">
                                <div class="col-12">
                                    <div class="form-input ">
                                        <input type="text" required name="name">
                                        <label class="lh-1 text-16 text-light-1">{{ __("Full Name") }}</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-input ">
                                        <input type="text" required name="email">
                                        <label class="lh-1 text-16 text-light-1">{{ __("Email") }}</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-input ">
                                        <textarea required rows="4" name="message"></textarea>
                                        <label class="lh-1 text-16 text-light-1">{{ __('Your Messages') }}</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    {{recaptcha_field('contact')}}
                                </div>
                                <div class="col d-flex justify-content-lg-start">
                                    <button type="submit" class="button px-24 h-50 -dark-1 bg-blue-1 text-white">
                                        {{ __("Send a Messsage") }}
                                        <i class="fa fa-spinner fa-pulse fa-fw d-none"></i>
                                        <div class="icon-arrow-top-right ml-15"></div>
                                    </button>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-mess"></div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row x-gap-80 y-gap-20 justify-between">
                <div class="col-12">
                    <div class="text-30 sm:text-24 fw-600">{{ setting_item_with_lang("page_contact_title") }}</div>
                </div>
                @if(!empty($contact_lists = setting_item_with_lang("page_contact_lists")))
                    @php  $contact_lists = json_decode($contact_lists,true) @endphp

                    @foreach( $contact_lists as $item)
                        <div class="col-md-6 col-lg-3">
                            <div class="text-14 text-light-1">{{ $item['title'] }}</div>
                            <div class="text-18 fw-500 d-flex items-center mt-10">{!! clean($item['content'] ?? "") !!}</div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    @if(!empty( $page_contact_why_choose_us = setting_item_with_lang('page_contact_why_choose_us')))
        @php $page_contact_why_choose_us = json_decode($page_contact_why_choose_us,true) @endphp
        <section class="layout-pt-lg layout-pb-lg bg-blue-2">
            <div class="container">
                <div class="row justify-center text-center">
                    <div class="col-auto">
                        <div class="sectionTitle -md">
                            <h2 class="sectionTitle__title">{{ setting_item_with_lang('page_contact_why_choose_us_title') }}</h2>
                            <p class=" sectionTitle__text mt-5 sm:mt-0">{{ setting_item_with_lang('page_contact_why_choose_us_desc') }}r</p>
                        </div>
                    </div>
                </div>
                <div class="row y-gap-40 justify-between pt-50">
                    @foreach($page_contact_why_choose_us as $key=>$item)
                        <div class="col-lg-3 col-sm-6">
                            <div class="featureIcon -type-1 ">
                                <div class="d-flex justify-center">
                                    <img src="{{ get_file_url($item['image_id'],'full') }}" alt="{{$item['title']}}">
                                </div>
                                <div class="text-center mt-30">
                                    <h4 class="text-18 fw-500">{{$item['title']}}</h4>
                                    <p class="text-15 mt-10">{{$item['desc']}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif 
