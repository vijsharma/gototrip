<div class="panel">
    <div class="panel-title ptitle"><strong>{{__("FAQs")}}</strong></div>
    <div class="panel-body pbody">
        <div class="form-group-item">
            <label class="control-label">{{__('FAQs')}}</label>
            <div class="g-items-header">
                <div class="row">
                    <div class="col-md-5">{{__("Title")}}</div>
                    <div class="col-md-5">{{__('Content')}}</div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                @if(!empty($translation->faqs))
                    @php if(!is_array($translation->faqs)) $translation->faqs = json_decode($translation->faqs); @endphp
                    @foreach($translation->faqs as $key=>$faq)
                        <div class="item" data-number="{{$key}}">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="faqs[{{$key}}][title]" class="form-control" value="{{$faq['title']}}" placeholder="{{__('Eg: When and where does the tour end?')}}">
                                </div>
                                <div class="col-md-6">
                                    <textarea name="faqs[{{$key}}][content]" class="form-control full-h" placeholder="...">{{$faq['content']}}</textarea>
                                </div>
                                <div class="col-md-1">
                                    <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="text-right">
                <span class="btn btn-info btn-sm btn-add-item"><i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" __name__="faqs[__number__][title]" class="form-control" placeholder="{{__('Eg: When and where does the tour end?')}}">
                        </div>
                        <div class="col-md-6">
                            <textarea __name__="faqs[__number__][content]" class="form-control full-h" placeholder="..."></textarea>
                        </div>
                        <div class="col-md-1">
                            <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
