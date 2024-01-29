<section class="layout-pt-lg layout-pb-md">
    <div data-anim-wrap class="container">
        <div class="row justify-center text-center">
            <div class="col-auto">
                <div class="sectionTitle">
                    <h2 class="sectionTitle__title">{{ $title ?? '' }}</h2>
                    <p class=" sectionTitle__text mt-5 sm:mt-0">{{ $sub_title ?? '' }}</p>
                </div>
            </div>
        </div>

        <div class="row justify-center pt-50 md:pt-30">
                <div class="col">
                    <div class="overflow-hidden js-cardImage-slider" data-scrollbar data-slider-cols="lg-3 md-3 sm-2 base-1">
                        <div class="swiper-wrapper"> 
                            @if(!empty($list_item))
                @foreach($list_item as $k => $item)
                                <div class="swiper-slide"> 
                                            <?php $image_url = get_file_url($item['icon_image'], 'full') ?>  
                                         <div class="featureIcon -type-1 px-50 py-50 lg:px-24 lg:py-15">
                                <div class="d-flex justify-center">
                                    <img src="{{$image_url}}" alt="{{$item['title'] ?? ''}}">
                                </div>

                                <div class="text-center mt-30">
                                    <h4 class="text-18 fw-500">{{$item['title'] ?? ''}}</h4>
                                    <p class="text-15 mt-10">{{$item['sub_title'] ?? ''}}</p>
                                </div>
                            </div>
                                    </div>
									@endforeach
							@endif
                                </div> 
                        </div> 
                        <div class="pt-20 lg:pt-20 sm:pt-20"> 
                             <div class="d-flex x-gap-15 items-center justify-center pt-40 sm:pt-20"> 
                <div class="col-auto">
                    <div class="pagination -dots text-border js-pagination"></div>
                </div> 
            </div> 	 
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
