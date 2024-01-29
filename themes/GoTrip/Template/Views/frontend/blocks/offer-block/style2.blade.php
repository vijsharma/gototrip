<div class="bravo-offer layout-pt-lg layout-pb-md">
	<div data-anim-wrap class="container">
        @if(!empty($title))
            <div class="row justify-center text-center pb-20">
			<div class="col-auto">
				<div class="sectionTitle">
					<h2 class="sectionTitle__title">{{ $title ?? '' }}</h2>
					<p class=" sectionTitle__text mt-5 sm:mt-0">{{ $subtitle ?? '' }}</p>
				</div>
			</div>
		</div>
        @endif
       @if(!empty($list_item))
<div class="relative overflow-hidden js-section-slider" data-gap="20" data-scrollbar data-slider-cols="xl-3 lg-3 md-2 sm-2">
			<div class="swiper-wrapper">
				  @foreach($list_item as $key=>$item)
                     <div class="swiper-slide">
					<a href="{{$item['link_more']}}" class="">
						<div class="tc">
							<img class="rounded-4" src="{{ get_file_url($item['background_image'],'full') ?? " " }}" alt="image"> 
                           </div>
						</a>
					</div> 
					 @endforeach
                  </div>
				   
			</div>
			   @endif
    </div>
	</div>