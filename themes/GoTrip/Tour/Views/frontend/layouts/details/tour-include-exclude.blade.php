@php
    if(!empty($translation->include)){
        $title = __("Included");
    }
    if(!empty($translation->exclude)){
        $title = __("Excluded");
    }
    if(!empty($translation->exclude) and !empty($translation->include)){
        $title = __("Included/Excluded");
    }
@endphp
@if(!empty($title)) 

    <div class="row x-gap-40 y-gap-40">
        @if($translation->include)
            <div class="col-md-6 text-green-2">
		<div class="fw-500 mb-10">Included</div>
                @foreach($translation->include as $item)
                    <div class="list-item check-list">
                        <i class="icon-check mr-10"></i> {{$item['title']}}
                    </div>
                @endforeach
            </div>
        @endif

        @if($translation->exclude)
            <div class="col-md-6 text-red-1">
		<div class="fw-500 mb-10">Exclusions</div>
                @foreach($translation->exclude as $item)
                    <div class="list-item cancel-list">
                        <i class="icon-close mr-10"></i> {{$item['title']}}
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endif
