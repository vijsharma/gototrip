<div class="panel">
    <div class="panel-title ptitle"><strong>{{__("Brochure")}}</strong></div>
    <div class="panel-body pbody">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>{{__("Brochure")}}</label>
                    <input type="file" placeholder="{{__("Tour brochure")}}" name="brochure" class="form-control" accept="jpeg,jpg,png,svg,pdf"/>
                </div>
            </div>
            @if(!empty($meta->brochure))
                <div class="col-lg-6">
                    @if(preg_match('/\.pdf/', $meta->brochure))
                        <a href="{{asset('uploads/brochures/'.$meta->brochure)}}" target="_new"><i class="fa fa-file-pdf-o text-danger" style="height: 50px;width: 50px;margin-top: 32px;font-size:25px"></i></a>
                    @else
                        <img src="{{asset('uploads/brochures/'.$meta->brochure)}}" alt="{{$meta->brochure}}" class="image-responsive" style="height: 50px;width: 50px;margin-top: 22px;"/>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
