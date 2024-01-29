@extends('layouts.app',['container_class'=>'container-fluid','header_right_menu'=>true])
@push('css')
    <link href="{{ asset('dist/frontend/module/car/css/car.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <style type="text/css">
        .bravo_topbar, .footer {
            display: none
        }
    </style>
@endpush
@section('content')
    @php $disable_subscribe_default = true @endphp
    <section class="halfMap bravo_search_car">
        <h1 class="d-none">
            {{setting_item_with_lang("car_page_search_title")}}
        </h1>
        <div class="halfMap__content">
            <div class="bravo_form_search_map form-search-all-service">
                <div class="mainSearch bg-white pr-10 py-10 lg:px-20 lg:pt-5 lg:pb-20 bg-light-2 rounded-4">
                    @include('Car::frontend.layouts.search.form-search', ['style' => 'map'])
                </div>
            </div>
            <div class="bravo_filter_search_map">
                @include('Car::frontend.layouts.search-map.filter-search-map')
            </div>
            @include('Car::frontend.layouts.search-map.list-item')
        </div>
        <div class="halfMap__map position-relative">
            <div class="results_map">
                <div class="map-loading d-none">
                    <div class="st-loader"></div>
                </div>
                <div id="bravo_results_map" class="results_map_inner"></div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        var bravo_map_data = {
            markers:{!! json_encode($markers) !!},
            map_lat_default:{{setting_item('car_map_lat_default','0')}},
            map_lng_default:{{setting_item('car_map_lng_default','0')}},
            map_zoom_default:{{setting_item('car_map_zoom_default','6')}},
        };
    </script>
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/car/js/car-map.js?_ver='.config('app.asset_version')) }}"></script>
    <script type="text/javascript" src="{{ asset('themes/gotrip/module/car/js/car-map.js?_ver='.config('app.asset_version')) }}"></script>
@endpush
