@extends('layouts.user')
@section('content')
    <div class="row y-gap-20 justify-between items-end pb-20 lg:pb-40 md:pb-20">
        <div class="col-auto">
            <h1 class="text-30 lh-14 fw-600"> {{$row->id ? __('Edit: ').$row->title : __('Add new flight')}}</h1>
            <div class="text-15 text-light-1">{{ __('Lorem ipsum dolor sit amet, consectetur.') }}</div>
        </div>
        <div class="col-auto">
            @if($row->id)
                <a class="btn btn-info" href="{{route('flight.vendor.seat.index',['flight_id'=>$row->id])}}">
                    <i class="fa fa-hand-o-right"></i> {{__("Flight ticket")}}
                </a>
            @endif
        </div>
    </div>
    @include('admin.message')
    <div class="mb-2">
        @if($row->id)
            @include('Language::admin.navigation')
        @endif
    </div>
    <div class="lang-content-box">
        <form action="{{route('flight.vendor.store',['id'=>($row->id) ? $row->id : '-1','lang'=>request()->query('lang')])}}" method="post">
            @csrf
            <div class="form-add-service">
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a data-toggle="tab" href="#nav-tour-content" aria-selected="true" class="active">{{__("1. Content")}}</a>
                    @if(is_default_lang())
                        <a data-toggle="tab" href="#nav-attribute" aria-selected="false">{{__("4. Attributes")}}</a>
                    @endif
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-tour-content">
                        @include('Flight::admin.flight.form')
                    </div>
                    @if(is_default_lang())
                        <div class="tab-pane fade" id="nav-attribute">
                            @include('Tour::admin.tour.attributes')
                        </div>
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button class="button h-50 px-24 -dark-1 bg-blue-1 text-white" type="submit"><i class="fa fa-save mr-2"></i> {{__('Save Changes')}}</button>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script type="text/javascript" src="{{ asset('libs/tinymce/js/tinymce/tinymce.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/condition.js?_ver='.config('app.asset_version')) }}"></script>
    <script type="text/javascript" src="{{url('module/core/js/map-engine.js?_ver='.config('app.asset_version'))}}"></script>
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        $(document).ready(function () {
            $('.has-datetimepicker').daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                showCalendar: false,
                autoUpdateInput: false, //disable default date
                sameDate: true,
                autoApply: true,
                disabledPast: true,
                enableLoading: true,
                showEventTooltip: true,
                classNotAvailable: ['disabled', 'off'],
                disableHightLight: true,
                timePicker24Hour: true,
                locale:{
                    format:'YYYY/MM/DD HH:mm:ss'
                }
            }).on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('YYYY/MM/DD hh:mm:ss'));
            });
        })
        jQuery(function ($) {
            "use strict"
            new BravoMapEngine('map_content', {
                fitBounds: true,
                center: [{{$row->map_lat ?? setting_item('map_lat_default',51.505 ) }}, {{$row->map_lng ?? setting_item('map_lng_default',-0.09 ) }}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    @if($row->map_lat && $row->map_lng)
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {}
                    });
                    @endif
                    engineMap.on('click', function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                    engineMap.on('zoom_changed', function (zoom) {
                        $("input[name=map_zoom]").attr("value", zoom);
                    });
                    if(myTravel.map_provider === "gmap"){
                        engineMap.searchBox($('#customPlaceAddress'),function (dataLatLng) {
                            engineMap.clearMarkers();
                            engineMap.addMarker(dataLatLng, {
                                icon_options: {}
                            });
                            $("input[name=map_lat]").attr("value", dataLatLng[0]);
                            $("input[name=map_lng]").attr("value", dataLatLng[1]);
                        });
                    }
                    engineMap.searchBox($('.bravo_searchbox'),function (dataLatLng) {
                        engineMap.clearMarkers();
                        engineMap.addMarker(dataLatLng, {
                            icon_options: {}
                        });
                        $("input[name=map_lat]").attr("value", dataLatLng[0]);
                        $("input[name=map_lng]").attr("value", dataLatLng[1]);
                    });
                }
            });
        })
    </script>
@endpush
