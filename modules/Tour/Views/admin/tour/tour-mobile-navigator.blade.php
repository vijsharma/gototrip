<div class="panel">
    <div class="panel-title ptitle"><strong>{{__('Tour mobile navigator')}}</strong></div>
    <div class="panel-body pbody">
         <div class="form-group-item">
             <div class="g-items-header">
                 <div class="row">
                     <div class="col-md-3 text-left">{{__("Active")}}</div>
                     <div class="col-md-3 text-left">{{__("Title")}}</div>
                     <div class="col-md-3">{{__('Icon')}}</div>
                     <div class="col-md-3">{{__('Order')}}</div>
                 </div>
             </div>
             <div class="g-items">
                 @if(!empty($meta->tour_mobile_menus))

                     @foreach($meta->tour_mobile_menus as $key=>$menu)
                         <div class="item" data-number="{{$key}}">
                             <div class="row">
                                 <div class="col-md-2">
                                     <input type="checkbox" name="tour_mobile_menus[{{$key}}][active]" class="form-control" value="1" {{isset($menu['active']) && $menu['active']==1 ? "checked" : ""}} >
                                 </div>
                                 <div class="col-md-4">
                                     <input type="text" name="tour_mobile_menus[{{$key}}][title]" class="form-control" value="{{$menu['title'] ?? ""}}" placeholder="{{__('Title')}}">
                                 </div>
                                 <div class="col-md-3">
                                     <input type="text" name="tour_mobile_menus[{{$key}}][icon]" class="form-control" value="{{$menu['icon'] ?? ""}}" placeholder="{{__('Icon')}}">
                                 </div>
                                 <div class="col-md-3">
                                     <input type="text" name="tour_mobile_menus[{{$key}}][order]" class="form-control tour_mobile_menus" value="{{$menu['order'] ?? ""}}" placeholder="{{__('Order')}}">
                                     <input type="hidden" name="tour_mobile_menus[{{$key}}][id]" class="form-control" value="{{$menu['id'] ?? ""}}" placeholder="{{__('Id')}}">
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 @else
                     @foreach($tour_menus as $key=>$menu)
                     <div class="item" data-number="{{$key}}">
                         <div class="row">
                             <div class="col-md-2">
                                 <input type="checkbox" name="tour_mobile_menus[{{$key}}][active]" {{$menu['active']==1 ? "checked" : ""}} class="form-control" value="{{$menu['active'] ?? ""}}">
                             </div>
                             <div class="col-md-4">
                                 <input type="text" name="tour_mobile_menus[{{$key}}][title]" class="form-control" value="{{$menu['title'] ?? ""}}" placeholder="{{__('Title')}}">
                             </div>
                             <div class="col-md-3">
                                 <input type="text" name="tour_mobile_menus[{{$key}}][icon]" class="form-control" value="{{$menu['icon'] ?? ""}}" placeholder="{{__('Icon')}}">
                             </div>
                             <div class="col-md-3">
                                     <input type="text" name="tour_mobile_menus[{{$key}}][order]" class="form-control" value="{{$menu['order'] ?? ""}}" placeholder="{{__('Order')}}">
                                     <input type="hidden" name="tour_mobile_menus[{{$key}}][id]" class="form-control" value="{{$menu['Id'] ?? ""}}" placeholder="{{__('Order')}}">
                             </div>
                         </div>
                     </div>
                     @endforeach
                 @endif
             </div>
         </div>
     </div>
 </div>
 @push('js')
 <style>
     .g-items .ui-sortable-handle{ cursor:move}
     .ui-state-highlight {height: 50px; line-height: 1.2em;background:#ddd; }
 </style>
 <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
 <script>
 jQuery(function($){
     var gItems=$( ".g-items").sortable({
         placeholder: "ui-state-highlight",
         cursor: "move",
         opacity: 0.5
     });
     var sorted = gItems.on( "sortupdate", function(event, ui) {
         $(".tour_mobile_menus").map(function(index){
             $(this).val(index+1)
         });
     });
 });
 </script>
 @endpush
