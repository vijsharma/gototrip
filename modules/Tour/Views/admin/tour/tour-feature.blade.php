<div class="panel">
    <div class="panel-title ptitle"><strong>{{__("Tour Feature")}}</strong></div>
    <div class="panel-body pbody">
        <div class="form-group-item">
            <div class="g-items-header">
                <div class="row">
                <div class="col-md-5">{{__("Title")}}</div>
                <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                @if(!empty($meta->tour_feature))
                    @foreach($meta->tour_feature as $key=>$tour_feature)
                        <div class="item" data-number="{{$key}}">
                        <div class="row">
                            <div class="col-md-11">
                                <input type="text" name="tour_feature[{{$key}}][title]" class="form-control" value="{{$tour_feature['title']}}" placeholder="{{__('Eg: When and where does the tour end?')}}">
                            </div>
                            <div class="col-md-1">
                                <span class="btn btn-danger btn-sm btn-remove-item">
                                    <i class="fa fa-trash"></i>
                                </span> </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="text-right">
                <span class="btn btn-info btn-sm btn-add-item" onclick="update_editor()">
                <i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
            </div>
            <div class="g-more hide">
                <div class="item" data-number="__number__">
                <div class="row">
                    <div class="col-md-11">
                    <input type="text" __name__="tour_feature[__number__][title]" class="form-control" placeholder="{{__('Eg: When and where does the tour end?')}}">                        </div>
                    <div class="col-md-1">
                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
