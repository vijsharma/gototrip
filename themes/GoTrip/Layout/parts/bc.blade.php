@if(!empty($breadcrumbs))
    <div class="py-10 bg-light-2">
        <div class="container">
            <div class="row y-gap-10 items-center justify-between">
                <div class="col-auto">
                    <ul class="breadcrumb d-flex row x-gap-10 y-gap-5 items-center text-12 text-light-1 list-unstyled nowrap" itemscope itemtype="https://schema.org/BreadcrumbList">
                        <li class="col-auto" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <a href="{{url('/')}}" itemprop="item"><span itemprop="name">{{__('Home')}}</span></a>
                            <meta itemprop="position" content="1" />
                        </li>
                        <li class="col-auto">
                            <div class="">-</div>
                        </li>
                        @foreach($breadcrumbs as $k=>$breadcrumb)
                            @if($k)
                                <li class="col-auto">
                                    <div class="">-</div>
                                </li>
                            @endif
                            <li class="col-auto {{$breadcrumb['class'] ?? ''}}" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                @if(!empty($breadcrumb['url']))
                                    <a href="{{url($breadcrumb['url'])}}" itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="{{url($breadcrumb['url'])}}"><span itemprop="name">{{$breadcrumb['name']}}</span></a>
                                @else
                                    <span itemprop="name">{{$breadcrumb['name']}}</span>
                                @endif
                                <meta itemprop="position" content="{{$k + 2}}" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
