@extends('layouts.app')
@push('css')
    <link href="{{ asset('themes/gotrip/dist/frontend/module/tour/css/tour.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
@endpush
@section('content')
    <div class="bravo_detail_tour bravo_detail">
        @include('Layout::parts.bc')
        <div class="bravo_content">
            @php $review_score = $row->review_data @endphp
            @include('Tour::frontend.layouts.details.tour-detail')
            <section>
                <div class="container" id="nav-review">
                    @include('Layout::common.detail.review')
                </div>
            </section>

            <div class="container">
                <div class="mt-50 border-top-light"></div>
            </div>

            @include('Tour::frontend.layouts.details.tour-related')
            @if(!empty($meta->tour_links))
                <div class="container mt-40 mb-40">
                    <div class="border-top-light"></div>
                </div>
                <section id="nav-tour-link">
                    <div class="container">
                        <h2 class="text-22 fw-500">{{__('Nearest Things To Do')}}</h2>
                        <div class="row y-gap-20 mt-15">
                            <div class="col-auto">
                                @foreach($meta->tour_links as $tour_link)
                                    <a href="{!! $tour_link['link'] !!}" class="col-auto py-5 px-15 rounded-4 text-12 uppercase bg-blue-1 text-white single-tr-label">{{$tour_link['title']}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
                @endif

        </div>
    </div>
@endsection

@push('js')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        var bravo_booking_data = {!! json_encode($booking_data) !!}
        var bravo_booking_i18n = {
                no_date_select:'{{__('Please select Start and End date')}}',
                no_guest_select:'{{__('Please select at least one guest')}}',
                load_dates_url:'{{route('tour.vendor.availability.loadDates')}}',
                name_required:'{{ __("Name is Required") }}',
                email_required:'{{ __("Email is Required") }}',
            };
    </script>
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>

    <script type="text/javascript" src="{{ asset('module/tour/js/single-tour.js?_ver='.config('app.asset_version')) }}"></script>
    <script type="text/javascript" src="{{ asset('themes/gotrip/module/tour/js/single-tour.js?_ver='.config('app.asset_version')) }}"></script>
@endpush
