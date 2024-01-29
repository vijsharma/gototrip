<section class="layout-pt-md layout-pb-lg">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                @include('Hotel::frontend.layouts.search.filter-search')
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="bravo-list-item">
                    <div class="row y-gap-10 items-center justify-between">
                        <div class="col-auto">
                            <div class="text-18">
                                <span class="fw-500">
                                    @if($rows->total() > 1)
                                        {{ __(":count hotels found",['count'=>$rows->total()]) }}
                                    @else
                                        {{ __(":count hotel found",['count'=>$rows->total()]) }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="row x-gap-20 y-gap-20">
                                @include('Hotel::frontend.layouts.search.orderby')
                            </div>
                        </div>
                    </div>
                    <div class="mt-30"></div>
                    <div class="list-service-item">
                        @if($layout == 'grid')
                        <div class="border-top-light mt-30 mb-30"></div>
                        @endif
                        <div class="row y-gap-30">
                            @if($rows->total() > 0)
                                @foreach($rows as $row)
                                    @if($layout == 'grid')
                                        <div class="col-lg-4 col-sm-6">
                                            @include('Hotel::frontend.layouts.search.loop-grid')
                                        </div>
                                    @else
                                        <div class="item col-12">
                                            <div class="border-top-light pt-20">
                                                @include('Hotel::frontend.layouts.search.loop-list')
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="col-lg-12">
                                    {{__("Hotel not found")}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="bravo-pagination">
                        {{$rows->appends(request()->query())->links()}}
                        @if($rows->total() > 0)
                            <div class="text-center mt-30 md:mt-10">
                                <div class="text-14 text-light-1">{{ __("Showing :from - :to of :total Hotels",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
