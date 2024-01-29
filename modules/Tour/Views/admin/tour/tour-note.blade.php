<div class="panel">
    <div class="panel-title ptitle"><strong>{{__("Tour Notes")}}</strong></div>
    <div class="panel-body pbody">
        <div class="form-group-item">
            <div class="g-items-header">
                <div class="row">
                <div class="col-md-5">{{__("Title")}}</div>
                <div class="col-md-1"></div>
                </div>
            </div>
            <div class="g-items">
                @if(!empty($row->meta->notes))
                    @foreach($row->meta->notes as $key=>$note)
                        <div class="item" data-number="{{$key}}">
                        <div class="row">
                            <div class="col-md-11">
                                <input type="text" name="notes[{{$key}}][title]" class="form-control" value="{{$note['title']}}" placeholder="{{__('Eg: When and where does the tour end?')}}">
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
                    <input type="text" __name__="notes[__number__][title]" class="form-control" placeholder="{{__('Eg: When and where does the tour end?')}}">                        </div>
                    <div class="col-md-1">
                        <span class="btn btn-danger btn-sm btn-remove-item"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
