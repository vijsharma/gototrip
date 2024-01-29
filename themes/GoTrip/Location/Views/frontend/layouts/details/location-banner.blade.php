<div class="section-bg layout-pb-md" id="about">
<div class="container pt-15"> 
	  @if(!empty($breadcrumbs)) 
        <div class="">
            <div class="row y-gap-10 items-center justify-between">
                <div class="col-auto">
                    <div class="row x-gap-10 y-gap-5 items-center text-14 text-light-1">
                        <div class="col-auto">
                            <div class=""><a href="{{ url("/") }}"> <i class="fa fa-home"></i> {{ __('Home')}}</a></div>
                        </div>
                        <div class="col-auto"><div class="">></div></div>
                        @foreach($breadcrumbs as $breadcrumb)
                            <div class="col-auto {{$breadcrumb['class'] ?? ''}}">
                                @if(!empty($breadcrumb['url']))
                                    <div><a href="{{url($breadcrumb['url'])}}">{{$breadcrumb['name']}}</a></div>
                                @else
                                    <div class="text-dark-1">{{$breadcrumb['name']}}</div>
                                @endif
                            </div>
                            @if(!empty($breadcrumb['url']))
                                <div class="col-auto"><div class="">></div></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div> 
@endif
	  </div>
@php $banner = $row->getBannerImageUrlAttribute('full') @endphp
      <div class="section-bg__item col-12">
	  <div class="effect"></div>
        @if(!empty($banner))
            <img src="{{ $banner }}" alt="{{$translation->name}}" class="col-12 rounded-4">
        @else
            <div class="w-100 min-height-300 bg-dark-1"></div>
        @endif
      </div> 
      <div class="container pt-30">
        <div class="row justify-center text-center">
          <div class="col-xl-6 col-lg-8 col-md-10">
            <h1 class="text-50 fw-600 text-white">{{$translation->name}}</h1>
            <div class="text-white">{{ __("Explore deals, travel guides and things to do in :text",['text'=>$translation->name]) }}</div>
          </div>
        </div>
      </div>
	  
	  
    </div> 
	
	<section class="service-type">
	<div class="container">
	<div class="row x-gap-20 y-gap-20 items-center pt-20">
    @php $types = get_bookable_services() @endphp
    @if(!empty($types))
        @foreach($types as $type=>$moduleClass)
            @php
                if(!$moduleClass::isEnable()) continue;
            @endphp
            <div class="col">
                <a href="{{ $moduleClass::getLinkForPageSearch(false,['location_id'=>$row->id]) }}" class="d-flex items-center flex-column justify-center px-20 py-15 rounded-4 border-light text-16 lh-14 fw-500 col-12">
                    <i class="{{ call_user_func([$moduleClass,'getServiceIconFeatured']) }} text-25 mb-10"></i>
                    {{ call_user_func([$moduleClass,'getModelName']) }}
                </a>
            </div>
        @endforeach
    @endif
</div>
</div>
	</section> 