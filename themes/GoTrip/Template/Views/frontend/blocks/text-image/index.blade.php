<section class="layout-pt-lg d-flex layout-pb-lg"> 
	<div class="row y-gap-30 justify-between items-center">
    @if(!empty($bg_image_1) || !empty($bg_image_2))
        @php
            $image_url1 = get_file_url($bg_image_1, 'full');
            $image_url2 = get_file_url($bg_image_2, 'full');
            $class = 'col-sm-6';
            if(empty($image_url1) || empty($image_url2)){
                $class = 'col-sm-12';
            }
        @endphp
        <div class="col-lg-6 col-md-6">
            <div class="row y-gap-30">
                @if($image_url1)
                    <div class="{{ $class }}">
                        <img src="{{ $image_url1 }}" alt="image">
                    </div>
                @endif

                @if($image_url2)
                    <div class="{{ $class }}">
                        <img src="{{ $image_url2 }}" alt="image">
                    </div>
                @endif
            </div>
        </div>
    @endif

    <div class="col-lg-6 col-md-6 px-40">  
                <h2 class="text-30 fw-600">{{ $title ?? '' }}</h2>
                @if(!empty($desc))
                    <p class="text-dark-1 mt-40 lg:mt-20 sm:mt-15">{{ $desc }}</p>
                @endif

                @if(!empty($link_title))
                <div class="d-inline-block mt-40 lg:mt-30 sm:mt-20">

                    <a href="{{ $link_more ?? '' }}" class="button -md -blue-1 bg-yellow-1 text-dark-1">
                        {{ $link_title }} <div class="icon-arrow-top-right ml-15"></div>
                    </a>

                </div>
                @endif 
    </div>
	</div>
</section>
