<div class="section sm:mr-15 sm:ml-15">
    <div class="masthead py-0">
                @if($row->getGallery())
                <div class="relative d-flex justify-center overflow-hidden masthead-slider h-399 js-masthead-slider-7">
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
                                        {{ __('All :count Photos',['count'=>count($row->getGallery())]) }}
                                    </a>
                                @else
                                    <a href="{{$item['large']}}" class="js-gallery" data-gallery="gallery2"></a>
                                @endif
                            @endforeach 
                    @endif
                </div>

                @endif 
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
</div>
