<section class="pt-10">
    <div class="container">
        <div class="row y-gap-15 justify-between items-end">
            <div class="col-auto">
                <h1 class="text-30 fw-600 md:text-25 sm:text-22">{!! clean($translation->title) !!}</h1>

                <div class="row x-gap-10 items-center mt-5">
                    @if(setting_item('tour_enable_review'))
                        <div class="col-auto">
                            <?php $reviewData = $row->getScoreReview(); $score_total = $reviewData['score_total'];?>
                            @include('Layout::common.rating',['score_total'=>$score_total])
                        </div>
                        <div class="col-auto">
                            <div class="text-14 lh-14 text-light-1">
                                @if($reviewData['total_review'] > 1)
                                    {{ __(":number Reviews",["number"=>$reviewData['total_review'] ]) }}
                                @else
                                    {{ __(":number Review",["number"=>$reviewData['total_review'] ]) }}
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="col-auto">
                        <div class="row x-gap-10 items-center">
                            <div class="col-auto">
                                <div class="d-flex x-gap-5 items-center">
                                    <i class="icon-placeholder text-16 text-light-1"></i>
                                    <div class="text-14 lh-14 text-light-1">{{$translation->address}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-auto d-none">
                <div class="row x-gap-10 y-gap-10">
                    <div class="col-auto">
                        <div class="dropdown">
                            <button class="button px-15 py-10 -blue-1" type="button" id="dropdownMenuShare" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-share mr-10"></i>
                                {{__('Web Share')}}
                            </button>

                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                            <button class="button px-15 py-10 -blue-1 bg-light-2">
                                <i class="icon-heart mr-10"></i>
                                {{__('Save')}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-20 js-pin-container" id="nav-slider">
    <div class="container">
        <div class="row y-gap-30">
            <div class="col-lg-8">
				<div class="masthead py-0">
                @if($row->getGallery())
                <div class="relative d-flex justify-center overflow-hidden masthead-slider js-masthead-slider-7">
                    <div class="swiper-wrapper">
                        @foreach($row->getGallery() as $key=>$item)
                            @if($key > 3) @break @endif
                            <div class="swiper-slide">
                                <img src="{{$item['large']}}" alt="{{ __("Gallery") }}" class="rounded-4 col-12 h-full object-cover">
                            </div>
                        @endforeach
                    </div>

                       <div class="masthead-slider__nav -prev js-prev">
                  <button class="button -outline-white text-white size-40 ro-full">
                  <i class="icon-arrow-left"></i>
                  </button>
               </div>
               <div class="masthead-slider__nav -next js-next">
                  <button class="button -outline-white text-white size-40 ro-full">
                  <i class="icon-arrow-right"></i>
                  </button>
               </div>
                    @if(count($row->getGallery()) > 4)
                            <div class="btn-group">
                                @if($row->video)
                                    <a href="#" class="btn btn-transparent has-icon bravo-video-popup" data-toggle="modal" data-src="{{ handleVideoUrl($row->video) }}" data-target="#myModal">
                                        <i class="input-icon field-icon fa">
                                            <svg height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                                            <g fill="#FFFFFF">
                                                <path d="M2.25,24C1.009,24,0,22.991,0,21.75V2.25C0,1.009,1.009,0,2.25,0h19.5C22.991,0,24,1.009,24,2.25v19.5
                                                    c0,1.241-1.009,2.25-2.25,2.25H2.25z M2.25,1.5C1.836,1.5,1.5,1.836,1.5,2.25v19.5c0,0.414,0.336,0.75,0.75,0.75h19.5
                                                    c0.414,0,0.75-0.336,0.75-0.75V2.25c0-0.414-0.336-0.75-0.75-0.75H2.25z">
                                                </path>
                                                <path d="M9.857,16.5c-0.173,0-0.345-0.028-0.511-0.084C8.94,16.281,8.61,15.994,8.419,15.61c-0.11-0.221-0.169-0.469-0.169-0.716
                                                    V9.106C8.25,8.22,8.97,7.5,9.856,7.5c0.247,0,0.495,0.058,0.716,0.169l5.79,2.896c0.792,0.395,1.114,1.361,0.719,2.153
                                                    c-0.154,0.309-0.41,0.565-0.719,0.719l-5.788,2.895C10.348,16.443,10.107,16.5,9.857,16.5z M9.856,9C9.798,9,9.75,9.047,9.75,9.106
                                                    v5.788c0,0.016,0.004,0.033,0.011,0.047c0.013,0.027,0.034,0.044,0.061,0.054C9.834,14.998,9.845,15,9.856,15
                                                    c0.016,0,0.032-0.004,0.047-0.011l5.788-2.895c0.02-0.01,0.038-0.027,0.047-0.047c0.026-0.052,0.005-0.115-0.047-0.141l-5.79-2.895
                                                    C9.889,9.004,9.872,9,9.856,9z">
                                                </path>
                                            </g>
                                        </svg>
                                        </i>{{__("Video")}}
                                    </a>
                                @endif
                            </div>
                            @foreach($row->getGallery() as $key=>$item)
                                @if($key == 0)
                                    <a href="{{$item['large']}}" class="gpcount button -blue-1 px-10 py-10 bg-white text-dark-1 js-gallery" data-gallery="gallery2">
                                        {{ __(':count Photos',['count'=>count($row->getGallery())]) }}
                                    </a>
                                @else
                                    <a href="{{$item['large']}}" class="js-gallery" data-gallery="gallery2"></a>
                                @endif
                            @endforeach
                    @endif
                </div>

                @endif
				</div>
				<div class="row x-gap-30 pt-30 pb-15 h_swap">

				@if($row->duration)
                    <div class="col-auto">
                        <div class="d-flex text-16 items-center">
                            <i class="icon-clock text-blue-1 mr-10"></i>
                            <div class="lh-15">{{duration_format($row->duration,true)}}</div>
                        </div>
                    </div>
                @endif

				@if($row->max_people)
                    <div class="col-auto">
                        <div class="d-flex text-16 items-center">
                            <i class="icon-customer text-blue-1 mr-10"></i>
                            <div class="lh-15">
                            @if($row->max_people > 1)
                                {{ __(":number persons",array('number'=>$row->max_people)) }}
                            @else
                                {{ __(":number person",array('number'=>$row->max_people)) }}
                            @endif</div>
                        </div>
                    </div>
                @endif

				@if(!empty($row->location->name))
                    @php $location =  $row->location->translate() @endphp
                    <div class="col-auto">
                        <div class="d-flex text-16 items-center">
                            <i class="icon-location-2 text-blue-1 mr-10"></i>
                            <div class="lh-15">{{$location->name ?? ''}}</div>
                        </div>
                    </div>
				@endif

				@if(!empty($row->category_tour->name))
                    @php $cat =  $row->category_tour->translate() @endphp
                    <div class="col-auto">
                        <div class="d-flex text-16 items-center">
                            <i class="icon-route text-blue-1 mr-10"></i>
                            <div class="lh-15">{{$cat->name ?? ''}}</div>
                        </div>
                    </div>
				@endif
                @if(!empty($meta->booking_form_label))
                    <div class="col-auto" id="nav-tour-message">
                        <div class="d-flex text-16 items-center">
                            <i class="icofont-bank-transfer-alt text-blue-1 mr-10"></i>
                            <div class="lh-15"><a href="{!! $meta->booking_form_url ? $meta->booking_form_url :"#" !!}">{{$meta->booking_form_label ?? ''}}</a></div>
                        </div>
                    </div>
				@endif
            </div>

            <div class="row x-gap-40 y-gap-40 tr-overview pt-20" id="nav-overview">
                <div class="col-12">
                    <h3 class="text-22 fw-500">{{__('Overview')}}</h3>

                    <div class="text-dark-1 mt-20">
                        {!! clean($translation->content) !!}
                    </div>
                </div>
            </div>
            <div class="mt-40 border-top-light" id="nav-included-excluded">
                <div class="row x-gap-40 y-gap-40 pt-40">
                    <div class="col-12">
                        @include('Tour::frontend.layouts.details.tour-include-exclude')
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4" id="nav-tour-booking-form">
            @include('Tour::frontend.layouts.details.tour-form-book')
        </div>
    </div>
    </div>
</section>

<section id="add-info" class="pt-20">
    <div class="container">
        <div class="pt-40 border-top-light">
            <div class="row x-gap-40 y-gap-40">
                <div class="col-auto">
                    <h3 class="text-22 fw-500">{{__('Important information')}}</h3>
                </div>
            </div>

            <div class="row x-gap-40 y-gap-40 pt-20">
                @include('Tour::frontend.layouts.details.tour-attributes')
            </div>
        </div>
    </div>
</section>

<div class="container mt-40 mb-40">
    <div class="border-top-light"></div>
</div>

<section id="itinerary">
    <div class="container" id="nav-tour-itinerary">
        <h3 class="text-22 fw-500 mb-20">{{__('Itinerary')}}</h3>

        <div class="row y-gap-30">
            <div class="col-auto">
                @include('Tour::frontend.layouts.details.tour-itinerary')
            </div>
        </div>
    </div>
</section>

<div class="container mt-40 mb-40">
    <div class="border-top-light"></div>
</div>

<section id="faqs">
    <div class="container" id="nav-faqs">
	<h2 class="text-22 fw-500">{{__('FAQs about')}}<br> {!! clean($translation->title) !!}</h2>
        <div class="row y-gap-20 mt-15">
            <div class="col-auto">
                @include('Tour::frontend.layouts.details.tour-faqs')

            </div>
        </div>
    </div>
</section>

@if(!empty($meta->notes))
<div class="container mt-40 mb-40">
    <div class="border-top-light"></div>
</div>
<section id="nav-good-to-know">
    <div class="container">
	<h2 class="text-22 fw-500">{{__('Good to know')}}</h2>
        <div class="row y-gap-20 mt-15">
            <div class="col-auto">
            <ul>
                @foreach($meta->notes as $note)
                    <li class="pb-1" style="list-style: disc">{{$note['title']}}</li>
                @endforeach
            </ul>
            </div>
        </div>
    </div>
</section>
@endif

@if(!empty($row->video))
<div class="container mt-40 mb-40">
    <div class="border-top-light"></div>
</div>
<section id="nav-tour-video">
    <div class="container">
	<h2 class="text-22 fw-500">{{__('Tour video')}}</h2>
        <div class="row y-gap-20 mt-15">
            <div class="col-auto">
                <div class="bravo_gallery">
                    <div class="video-container">
                        <iframe width="1000" height="500" src="{{ str_ireplace("watch?v=","embed/",$row->video) }}" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if(!empty($meta->brochure))
<div class="container mt-40 mb-40">
    <div class="border-top-light"></div>
</div>
<section id="nav-tour-brochure">
    <div class="container">
	<h2 class="text-22 fw-500">{{__('Read it Later !')}}</h2>
        <div class="row y-gap-20 mt-15">
            <div class="col-auto">
                Download this tour brochure and read offline.
                <a class="download col-md-4" href="{{asset('uploads/brochure/'.$meta->brochure)}}" download><button class="button -dark-1 py-15 px-35 h-50 col-12 rounded-4 bg-blue-1 text-white cursor-pointer btn-primary brochure_download"><i class="icofont-download" aria-hidden="true"></i>&nbsp;{{__("Download Brochure")}}</button></a>
            </div>
        </div>
    </div>
</section>
@endif

@if(!empty($meta->adv_banner_image_id))
<div class="container mt-40 mb-40">
    <div class="border-top-light"></div>
</div>
<section id="banner">
    <div class="container" id="nav-tour-banner">
        <div class="row y-gap-20 mt-15">
            <div class="col-auto">
                @if(!empty($meta->adv_banner_image_id))
                    @if(!empty($meta->adv_banner_url))
                        <a href="{{$meta->adv_banner_url}}"><img src="{!! get_file_url($meta->adv_banner_image_id) !!}" alt="{{$row->title}}" /></a>
                    @else
                        <img src="{!! get_file_url($meta->adv_banner_image_id) !!}" />
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>
@endif

<div class="container mt-40 mb-40">
    <div class="border-top-light"></div>
</div>

{{--video banner modal--}}
<div class="container">
    <div class="video_popup_modal">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item bravo_embed_video" src="" allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mbook md:d-block d-none">
    <button data-x-click="book-x" onClick="document.getElementById('bravo_tour_book_app').scrollIntoView();" class="rounded-50 button -sm bg-blue-1 text-white"><i class="icon-calendar-2 text-18 mr-10"></i> Book Now</button>
</div>
<div class="webshare md:d-block d-none">
    <button data-x-click="book-x" class="rounded-100 button px-10 py-10 whtsp"> <i class="fa fa-share-alt text-25 text-white"></i></button>
</div>

<div class="footernav">
    <ul class="d-flex text-15 items-center h_swap">
        @if(!empty($meta->tour_mobile_menus))
            @foreach($meta->tour_mobile_menus as $index=>$menu)
                <li> <a href="#{{$menu['id']}}"><i class="{{$menu['icon']}}"></i> {{$menu['title']}}</a> </li>
            @endforeach
        @else
            <li> <a href="#nav-overview"><i class="icon-search"></i> Tour Details</a> </li>
            <li> <a href="#nav-included-excluded"><i class="icon-location"></i> Includes</a> </li>
            <li> <a href="#nav-slider"><i class="icon-ticket"> </i> Photos </a> </li>
            <li> <a href="#nav-faqs"><i class="icon-heart"></i> Tour FAQs </a> </li>
        @endif
    </ul>
</div>
