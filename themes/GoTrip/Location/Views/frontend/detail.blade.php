@extends('layouts.app')
@push('css')
    <link href="{{ asset('dist/frontend/module/location/css/location.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset(" libs ion_rangeslider css ion.rangeSlider.min.css") }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset(" libs fotorama fotorama.css") }}"/>
@endpush
@section('content')
    <div class="bravo_detail_location">
		<section class="layout-pb-md"> 
				@include('Location::frontend.layouts.details.location-banner') 
		</section>
		<section class="layout-pb-md">
			<div class="container">
				@include('Location::frontend.layouts.details.location-overview')
				 </div>
		</section> 
		  <section class="layout-pb-md">
			<div class="container">
				@include('Location::frontend.layouts.details.location-map')
				 </div>
		</section>  
		@include('Location::frontend.layouts.details.location-service')
		@include('Location::frontend.layouts.details.location-trip-idea') 
		<section class="layout-pb-md">
			<div class="container">
				@include('Location::frontend.layouts.details.location-general-info')

			    </div>
		</section>
		<div class="footernav">
            <ul class="d-flex text-15 items-center h_swap">
               <li> <a href=""><i class="icon-search"></i> Details</a> </li>
               <li> <a href=""><i class="icon-ticket"> </i> Tours </a> </li>
               <li> <a href=""><i class="icon-heart"></i> Events </a> </li>
               <li> <a href=""><i class="icon-menu-2"></i> Attractions </a> </li> 
               <li> <a href=""><i class="icon-location"></i> Menu </a> </li>
            </ul>
         </div>
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
                        icon_options: {}
                    });
                }
            });
            @endif
        })
    </script>
	<script type="text/javascript" src="{{ asset(" libs ion_rangeslider js ion.rangeSlider.min.js") }}">< script>
	<script type="text/javascript" src="{{ asset(" libs fotorama fotorama.js") }}">< script>
	<script type="text/javascript" src="{{ asset(" libs sticky jquery.sticky.js") }}">< script> @endpush