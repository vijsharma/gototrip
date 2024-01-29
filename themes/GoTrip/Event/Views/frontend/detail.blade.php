@extends('layouts.app')
@push('css')

@endpush
@section('content')
    <div class="bravo_detail bravo_detail_event">
        @include('Layout::parts.bc')
        @include('Layout::common.detail.gallery4',['galleries'=>$row->getGallery()])
        <div class="bravo_content pt-20">
            <div class="container">
                <div class="row y-gap-30">
                    <div class="col-md-12 col-lg-8">
                        @include('Event::frontend.layouts.details.detail')
                    </div>
                    <div class="col-md-12 col-lg-4">
                        @include('Event::frontend.layouts.details.form-book')
                    </div>
                    <div class="col-md-12">
                        <div class="mb-40">
                            @include('Event::frontend.layouts.details.attributes')
                        </div>
                        <div class="border-top-light mt-40 mb-40"></div>
                        @include('Layout::map.detail.map',['class_container'=>'container-full'])
                        @if($translation->faqs)
                            <div class="py-40">
                                @include('Layout::common.detail.faq2',['faqs'=>$translation->faqs])
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="border-top-light py-40">
                <div class="container">
                    @include('Layout::common.detail.review')
                </div>
            </div>
            <div class="container">
                @include('Event::frontend.layouts.details.related')
            </div>
        </div>
    </div>
	<div class="mbook md:d-block d-none"> 
               <button data-x-click="book-x" onClick="document.getElementById('bravo_event_book_app').scrollIntoView();" class="rounded-50 button -sm bg-blue-1 text-white"><i class="icon-calendar-2 text-18 mr-10"></i> Book Now</button> 
         </div>
<div class="webshare md:d-block d-none"> 
               <button data-x-click="book-x" class="rounded-100 button px-10 py-10 whtsp"> <i class="fa fa-share-alt text-25 text-white"></i></button> 
         </div>
		 
<div class="footernav">
            <ul class="d-flex text-15 items-center h_swap">
               <li> <a href=""><i class="icon-search"></i> Details</a> </li>
               <li> <a href=""><i class="icon-location"></i> Includes</a> </li>
               <li> <a href=""><i class="icon-ticket"> </i> Photos </a> </li>
               <li> <a href=""><i class="icon-heart"></i> FAQs </a> </li>
               <li> <a href=""><i class="icon-menu-2"></i> Menu </a> </li>
            </ul>
         </div>
@endsection

@push('js')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            @if($row->map_lat && $row->map_lng)
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [{{$row->map_lat}}, {{$row->map_lng}}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {
                            iconUrl:"{{get_file_url(setting_item("event_icon_marker_map"),'full') ?? url('images/icons/png/pin.png') }}"
                        }
                    });
                }
            });
            @endif
        })
    </script>
    <script>
        var bravo_booking_data = {!! json_encode($booking_data) !!}
        var bravo_booking_i18n = {
			no_date_select:'{{__('Please select Start and End date')}}',
            no_guest_select:'{{__('Please select at least one number')}}',
            load_dates_url:'{{route('event.vendor.availability.loadDates')}}'
        };
    </script>
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/event/js/single-event.js?_ver='.config('app.asset_version')) }}"></script>
@endpush
