@if($translation->faqs)
    <div class="accordion -simple tr-style y-gap-20 js-accordion">
        @foreach($translation->faqs as $item) 
                <div class="accordion__item tr-style">
                    <div class="pl-15 accordion__button justify-between d-flex items-center">
                        <div class="text-dark-1 lh-16">{{$item['title']}}</div>
						<div class="accordion__icon size-40 flex-center bg-light-2 rounded-full mr-10">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-chevron-up"></i>
                        </div>  
                    </div>

                    <div class="accordion__content">
                        <div class="pt-10 pl-15">
                            <p>{!! clean($item['content']) !!}</p>
                        </div>
                    </div>
                </div> 
        @endforeach
    </div>
@endif
