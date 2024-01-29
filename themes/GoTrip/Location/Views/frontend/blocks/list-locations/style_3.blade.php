<section class="layout-pt-lg layout-pb-md">
    <div data-anim-wrap class="container">
        <div class="row y-gap-20 pb-30 justify-center text-center">
            <div class="col-auto">
                <div class="sectionTitle">
                    <h2 class="sectionTitle__title">{{$title ?? ''}}</h2>
                    <p class=" sectionTitle__text mt-5 sm:mt-0">{{$desc ?? ''}}</p>
                </div>
            </div>
        </div>
        <div class="relative js-section-slider" data-gap="20" data-slider-cols="xl-5 lg-4 md-3 sm-3 base-1">
            <div class="swiper-wrapper">
                @if($rows)
                    @foreach($rows as $row)
                        @php $translation = $row->translate(); @endphp
                        <div class="swiper-slide">
                            @if($to_location_detail) <a href="{{$row->getDetailUrl()}}"> @endif
                                <div class="citiesCard -type-2">
                                    @if($row->image_id)
                                        <div class="citiesCard__image rounded-4 ratio ratio-3:4">
                                            <img class="img-ratio rounded-4 js-lazy" data-src="{{ $row->getImageUrl() }}" src="{{ $row->getImageUrl() }}" alt="{{ $translation->name }}">
                                        </div>
                                    @endif
                                    <div class="citiesCard__content absolute d-flex pl-20 top-75 flex-column text-white">
                                        <h4 class="text-18 lh-13 fw-500">{{ $translation->name }}</h4>
                                        <div class="text-14">
                                            @if(is_array($service_type))
                                                @php $count_all = 0; @endphp
                                                @foreach($service_type as $k => $type)
                                                    @php $count_all += (int) $row->getDisplayNumberServiceInLocation($type) @endphp
                                                @endforeach
                                                @if(!empty($count_all))
                                                    <span>{{$count_all}} {{ __("Tours ") }}</span>
                                                @endif
                                            @else
                                                @if(!empty($text_service = $row->getDisplayNumberServiceInLocation($service_type)))
                                                    <span>{{$text_service}}</span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @if($to_location_detail) </a> @endif
                        </div>
                    @endforeach
                @endif
            </div>
            <button class="section-slider-nav -prev flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-prev">
                <i class="icon icon-chevron-left text-12"></i>
            </button>
            <button class="section-slider-nav -next flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-next">
                <i class="icon icon-chevron-right text-12"></i>
            </button>
        </div>
    </div>
</section>
