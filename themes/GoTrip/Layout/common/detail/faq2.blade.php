<div class="row y-gap-20" style="border:none;">
    <div class="col-lg-4">
        <h2 class="text-22 fw-500">{{__('FAQs about')}}<br> {{$translation->title}}</h2>
    </div>
    @if($translation->faqs)
    <div class="accordion -simple row y-gap-20 js-accordion">
        @foreach($translation->faqs as $item) 
                <div class="accordion__item">
                    <div class="accordion__button d-flex items-center">
                        <div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-20">
                            <i class="icon-chevron-right"></i>
                            <i class="icon-chevron-left"></i>
                        </div>

                        <div class="button text-dark-1">{{$item['title']}}</div>
                    </div>

                    <div class="accordion__content">
                        <div class="pt-20 pl-60">
                            <p class="text-15">{!! clean($item['content']) !!}</p>
                        </div>
                    </div>
                </div> 
        @endforeach
    </div>
@endif

</div>
