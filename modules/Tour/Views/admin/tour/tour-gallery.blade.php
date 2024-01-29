@if(is_default_lang())
    <div class="panel">
        <div class="panel-title ptitle"><strong>{{__("Tour Gallery")}}</strong></div>
        <div class="panel-body pbody">
            <div class="form-group">
                <div class="form-group-image">
                    {!! \Modules\Media\Helpers\FileHelper::fieldUpload('banner_image_id',$row->banner_image_id) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">{{__("Gallery")}}</label>
                {!! \Modules\Media\Helpers\FileHelper::fieldGalleryUpload('gallery',$row->gallery) !!}
            </div>
        </div>
    </div>
@endif
