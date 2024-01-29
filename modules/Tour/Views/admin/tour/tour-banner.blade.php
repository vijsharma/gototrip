<div class="panel">
    <div class="panel-title ptitle"><strong>{{__("Banner")}}</strong></div>
    <div class="panel-body pbody">
        <div class="form-group">
            <label class="control-label">{{__("Banner Image")}}</label>
            <div class="form-group-image">
            {!! \Modules\Media\Helpers\FileHelper::fieldUpload('adv_banner_image_id',@$row->meta->adv_banner_image_id) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-image">
                <input type="text" name="adv_banner_url" class="form-control" placeholder="{{__("Banner url")}}" value="{!! @$row->meta->adv_banner_url !!}" />
            </div>
        </div>
    </div>
</div>
