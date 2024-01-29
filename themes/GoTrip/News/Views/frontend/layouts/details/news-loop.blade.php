@php $translation = $row->translate();@endphp
<div class="row y-gap-30 gx-sm-0 gx-xl-4"> 
        <div class="row y-gap-15 gx-sm-0 gx-xl-4 items-center md:justify-center">
            <div class="col-xl-4 col-md-4 px-0">
                <div class="blogCard__image rounded-4">
                    <div class="ratio ratio-1:1">
					<a href="{{$row->getDetailUrl()}}" class="blogCard -type-1 col-12">
                        {!! get_image_tag($row->image_id,'medium',['class'=>'img-ratio rounded-4','alt'=>$translation->title,'lazy'=>false]) !!}
						</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-8 y-gap-5"> 
                <h3 class="text-22 text-dark-1">
                    {!! clean($translation->title) !!}
                </h3>
				<ul class="d-flex x-gap-10">
                        <li> @php $category = $row->category; @endphp
                        @if(!empty($category))
                            @php $t = $category->translate(); @endphp
                            {{$t->name ?? ''}}
                        @endif </li> 
                        <li><i class="fa fa-clock-o"></i> {{$row->created_at->diffForhumans()}}</li>
                    </ul>  
                <div class="text-light-1">
                    {!! get_exceprt($translation->content) !!}  
                </div>
				<a href="{{$row->getDetailUrl()}}" class="text-16 d-block read_link">{{ __('Read More')}}</a>
            </div>
        </div> 
</div>
