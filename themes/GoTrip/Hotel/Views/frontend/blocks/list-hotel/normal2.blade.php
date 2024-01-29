<section class="layout-pt-md layout-pb-md">
    <div data-anim-wrap class="container">
        <div data-anim-child="slide-up delay-1" class="row y-gap-20 justify-between items-end">
            <div class="col-auto">
                <div class="sectionTitle -md">
                    <h2 class="sectionTitle__title">{{$title ?? ''}}</h2>
                    <p class=" sectionTitle__text mt-5 sm:mt-0">{{ $desc ?? '' }}</p>
                </div>
            </div>
            <div class="col-auto">
                <a href="{{ route('hotel.search') }}" class="button -md -blue-1 bg-blue-1-05 text-blue-1">
                    {{ __("More") }} <div class="icon-arrow-top-right ml-15"></div>
                </a>
            </div>
        </div>
        <div class="row y-gap-30 pt-40 sm:pt-20">
            @foreach($rows as $k => $row)
                <div data-anim-child="slide-up delay-{{ $k }}" class="col-xl-3 col-lg-3 col-sm-6">
                    @include('Hotel::frontend.layouts.search.loop-grid')
                </div>
            @endforeach
        </div>
    </div>
</section>