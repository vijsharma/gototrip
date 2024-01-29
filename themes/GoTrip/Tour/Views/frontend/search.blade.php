@extends('layouts.app')
@push('css')

@endpush
@section('content')
    <div class="bravo_search bravo_search_tour">
        @if($layout == 'normal')
            <section class="pt-40 pb-40 bg-light-2">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h1 class="text-30 fw-600">{{setting_item_with_lang("tour_page_search_title")}}</h1>
                            </div>
                            @include('Tour::frontend.layouts.search.form-search', ['style' => 'default'])
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @include('Tour::frontend.layouts.search.list-item')
		<div class="mbook md:d-block d-none bottom-50"> 
               <button data-x-click="book-x" class="rounded-50 button -sm whtsp text-white"><i class="fa fa-whatsapp text-18 mr-10"></i> Chat Online</button> 
         </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('module/tour/js/tour.js?_ver='.config('app.asset_version')) }}"></script>
@endpush
