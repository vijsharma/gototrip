<!-- tour link--->
<div class="panel">
   <div class="panel-title ptitle"><strong>{{__("Tour Links")}}</strong></div>
   <div class="panel-body pbody">
      <div class="form-group-item">
         <div class="g-items-header">
            <div class="row">
               <div class="col-md-5">{{__("Title")}}</div>
               <div class="col-md-5">{{__('Link')}}</div>
               <div class="col-md-1"></div>
            </div>
         </div>
         <div class="g-items">
            @if(!empty($row->meta->tour_links))
               @php if(!is_array($row->meta->tour_links)) $row->meta->tour_links = json_decode($row->meta->tour_links); @endphp
               @foreach($row->meta->tour_links as $key=>$tour_link)
                  <div class="item" data-number="{{$key}}">
                     <div class="row">
                        <div class="col-md-5">
                            <input type="text" name="tour_links[{{$key}}][title]" class="form-control" value="{{$tour_link['title']}}" placeholder="{{__('Title')}}">
                        </div>
                        <div class="col-md-6">
                           <input type="text" name="tour_links[{{$key}}][link]" class="form-control" placeholder="Tour link" value="{{$tour_link['link']}}" />
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
            <span class="btn btn-info btn-sm btn-add-item" onclick="update_editor()">
                <i class="icon ion-ios-add-circle-outline"></i> {{__('Add item')}}</span>
          </div>
         <div class="g-more hide">
            <div class="item" data-number="__number__">
               <div class="row">
                  <div class="col-md-5">
                     <input type="text" __name__="tour_links[__number__][title]" class="form-control" placeholder="{{__('Link title')}}"/>
                  </div>
                  <div class="col-md-6">
                     <input type="text" __name__="tour_links[__number__][link]" class="form-control" placeholder="{{__('Tour link')}}"/>
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
