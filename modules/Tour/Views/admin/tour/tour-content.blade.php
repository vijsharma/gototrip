<div class="panel">
    <div class="panel-title"><strong>{{__("Tour Content")}}</strong></div>
    <div class="panel-body">
        <div class="form-group">
            <label>{{__("Title")}}</label>
            <input type="text" value="{!! clean($translation->title) !!}" placeholder="{{__("Tour title")}}" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label class="control-label">{{__("Content")}}</label>
            <div class="">
                <textarea name="content" class="d-none has-ckeditor" cols="30" rows="10">{{$translation->content}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">{{__("Description")}}</label>
            <div class="">
                <textarea name="short_desc" class="form-control" cols="30" rows="5">{{$translation->short_desc}}</textarea>
            </div>
        </div>
        <div class="form-group d-none">
            <label class="control-label">{{__("Description")}}</label>
            <div class="">
                <textarea name="short_desc" class="form-control" cols="30" rows="4">{{$translation->short_desc}}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-title ptitle"><strong>{{__("Tour Details")}}</strong></div>
    <div class="panel-body pbody">
        @if(is_default_lang())
            <div class="form-group">
                <label class="control-label">{{__("Category")}}</label>
                <div class="">
                    <select name="category_id" class="form-control">
                        <option value="">{{__("-- Please Select --")}}</option>
                        <?php
                        $traverse = function ($categories, $prefix = '') use (&$traverse, $row) {
                            foreach ($categories as $category) {
                                $selected = '';
                                if ($row->category_id == $category->id)
                                    $selected = 'selected';
                                printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $category->name);
                                $traverse($category->children, $prefix . '-');
                            }
                        };
                        $traverse($tour_category);
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">{{__("Youtube Video")}}</label>
                <input type="text" name="video" class="form-control" value="{{$row->video}}" placeholder="{{__("Youtube link video")}}">
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Enable/Disable Booking OR Enquiry")}}</label>
                        <select class="form-control" name="booking_inquiry_type" required="">
                            <option value="0" @php echo !empty($meta->booking_inquiry_type) && $meta->booking_inquiry_type=="0" ? "selected" : "" @endphp>{{__("Both")}}</option>
                            <option value="2" @php echo !empty($meta->booking_inquiry_type) && $meta->booking_inquiry_type=="2" ? "selected" : '' @endphp>{{__("Booking")}}</option>
                            <option value="1" @php echo !empty($meta->booking_inquiry_type) && $meta->booking_inquiry_type=="1" ? "selected" : ''@endphp>{{__("Enquiry")}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Accept Booking Max Time")}}</label>
                        <input type="time" name="accept_booking_max_time" class="form-control" value="{{@$row->meta->accept_booking_max_time}}" placeholder="{{__("Accept Booking Max Time")}}"/>
                    </div>
                </div>
            </div>
            @if(is_default_lang())
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">{{__("Minimum advance reservations")}}</label>
                            <input type="number" name="min_day_before_booking" class="form-control" value="{{$row->min_day_before_booking}}" placeholder="{{__("Ex: 3")}}">
                            <i>{{ __("Leave blank if you dont need to use the min day option") }}</i>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">{{__("Duration")}}</label>
                            <div class="input-group mb-3">
                                <input type="text" name="duration" class="form-control" value="{{$row->duration}}" placeholder="{{__("Duration")}}"  aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">{{__('hours')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Tour Min People")}}</label>
                        <input type="text" name="min_people" class="form-control" value="{{$row->min_people}}" placeholder="{{__("Tour Min People")}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="control-label">{{__("Tour Max People")}}</label>
                        <input type="text" name="max_people" class="form-control" value="{{$row->max_people}}" placeholder="{{__("Tour Max People")}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">{{__("Post Robots Meta")}}</label>
                <div>
                    <input type="checkbox" name="robots_meta[0][no_index]" id="no_index" class="form-control" value="1" {{!empty($row->meta->robots_meta[0]['no_index']) ? "checked":""}} />
                    <label for="no_index">{{__("No Index")}}</label>
                    <input type="checkbox" name="robots_meta[1][no_follow]" class="form-control" value="1" id="no_follow" {{!empty($row->meta->robots_meta[1]['no_follow']) ? "checked":""}} />
                    <label for="no_follow">{{__("No Follow")}}</label>
                    <input type="checkbox" name="robots_meta[2][no_archive]" class="form-control" value="1" id="no_archive" {{!empty($row->meta->robots_meta[2]['no_archive']) ? "checked":""}}/>
                    <label for="no_archive">{{__("No Archive")}}</label>
                    <input type="checkbox" name="robots_meta[3][no_image_index]" class="form-control" id="no_image_index" value="1" {{!empty($row->meta->robots_meta[3]['no_image_index']) ? "checked":""}}/>
                    <label for="no_image_index">{{__("No Image Index")}}</label>
                    <input type="checkbox" name="robots_meta[4][no_snippet]" class="form-control" id="no_snippet" value="1" {{!empty($row->meta->robots_meta[4]['no_snippet']) ? "checked":""}} />
                    <label for="no_snippet">{{__("No Snippet")}}</label>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">{{__("Tour Message")}}</label><br/>
                <input type="text" name="booking_form_label" class="form-control" placeholder="{{__("Enter tour message")}}" value="{{@$row->meta->booking_form_label}}"/><br>
                <label class="control-label">{{__("Tour Url")}}</label><br/>
                <input type="text" name="booking_form_url" class="form-control" placeholder="{{__("booking form url")}}" value="{{@$row->meta->booking_form_url}}"/>
            </div>

            <div class="form-group">
                <label class="control-label">{{__("Tour timing description")}}</label>
                <input type="text" name="booking_form_timing" class="form-control" placeholder="{{__("Tour timing description")}}" value="{{@$row->meta->booking_form_timing}}">
            </div>
        @endif
        <?php do_action(\Modules\Tour\Hook::FORM_AFTER_MAX_PEOPLE,$row) ?>
    </div>
</div>
@include('Tour::admin/tour/tour-faq')
@include('Tour::admin/tour/tour-note')
@include('Tour::admin/tour/tour-feature')
@include('Tour::admin/tour/include-exclude')
@include('Tour::admin/tour/itinerary')
@include('Tour::admin/tour/tour-gallery')
@include('Tour::admin/tour/tour-banner')
@include('Tour::admin/tour/tour-brochure')
