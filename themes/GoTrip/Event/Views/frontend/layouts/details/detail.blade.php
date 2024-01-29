<?php
$review_score = $row->review_data
?>
<div class="row justify-between items-end">
    <div class="col-auto">
        <h1 class="text-26 fw-600">{{$translation->title}}</h1>
        <div class="row x-gap-10 y-gap-20 items-center pt-10">
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
                    @if($translation->address)
                        <div class="col-auto">
                            <div class="d-flex x-gap-5 items-center">
                                <i class="icon-location-2 text-16 text-light-1"></i>
                                <div class="text-15 text-light-1">{{$translation->address}}</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-auto d-none">
        <div class="row x-gap-10 y-gap-10">
            <div class="col-auto">
                <div class="dropdown">
                    <button class="button px-15 py-10 -blue-1 dropdown-toggle" type="button" id="dropdownMenuShare" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-share mr-10"></i>
                        {{__('Share')}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuShare">
                        <a class="dropdown-item facebook" href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Facebook")}}">
                            <i class="fa fa-facebook"></i> {{ __('Facebook') }}
                        </a>
                        <a class="dropdown-item twitter" href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Twitter")}}">
                            <i class="fa fa-twitter"></i> {{ __('Twitter') }}
                        </a>
                    </div>
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
<div class="border-top-light mt-10 mb-15"></div> 
<div class="row y-gap-30 h_swap">

    <div class="col-auto">
        <div class="d-flex">
            <i class="icofont-wall-clock text-24 text-blue-1 mr-10"></i>
            <div class="text-15 lh-15">
               {{ $row->start_time }}
            </div>
        </div>
    </div>
    @if($row->duration)
        <div class="col-auto">
            <div class="d-flex">
                <i class="icofont-infinite text-24 text-blue-1 mr-10"></i>
                <div class="text-15 lh-15">
                 {{duration_format($row->duration)}}
                </div>
            </div>
        </div>
    @endif

    <div class="col-auto">
        <div class="d-flex">
            <i class="icofont-heart-beat text-24 text-blue-1 mr-10"></i>
            <div class="text-15 lh-15">
                {{ __("People interest: :number",['number'=>$row->getNumberWishlistInService()]) }}
            </div>
        </div>
    </div>
        @if(!empty($row->location->name))
            @php $location =  $row->location->translate() @endphp

            <div class="col-auto">
                <div class="d-flex">
                    <i class="icon-route text-24 text-blue-1 mr-10"></i>
                    <div class="text-15 lh-15">
                     {{$location->name ?? ''}}
                    </div>
                </div>
            </div>
        @endif

</div>
<div class="border-top-light mt-10 mb-15"></div>

<div class="row x-gap-40 y-gap-40 tr-overview pt-20" id="nav-overview">
                <div class="col-12">
                    <h3 class="text-22 fw-500">{{__('Overview')}}</h3>

                    <div class="text-dark-1 mt-20">
                        {!! clean($translation->content) !!}
                    </div>
                </div>
            </div>
