<div class="panel">
    <div class="panel-title ptitle"><strong>{{__("Tour Schema")}}</strong></div>
    <div class="panel-body pbody">
        <div class="row">
            <div class="form-group col-lg-6">
                <label class="control-label">{{__("Review rating value")}}</label>
                <input type="text"  min="0" name="review_rating_value" class="form-control" placeholder="{{__("i.e. 5")}}" value="{{@$row->meta->review_rating_value}}">
            </div>

            <div class="form-group col-lg-6">
                <label class="control-label">{{__("Review best rating")}}</label>
                <input type="text"  min="0" name="review_best_rating" class="form-control" placeholder="{{__("i.e. 5")}}" value="{{@$row->meta->review_best_rating}}">
            </div>
        </div>


        <div class="row">
            <div class="form-group col-lg-6">
                <label class="control-label">{{__("Review worst rating")}}</label>
                <input type="text" name="review_worst_rating" class="form-control" placeholder="{{__("1")}}" value="{{@$row->meta->review_worst_rating}}">
            </div>

            <div class="form-group col-lg-6">
                <label class="control-label">{{__("Review Author")}}</label>
                <input type="text" name="review_author" class="form-control" placeholder="{{__("Review Author")}}" value="{{@$row->meta->review_author}}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-6">
                <label class="control-label">{{__("Aggregate rating value")}}</label>
                <input type="text" name="aggregate_rating_value" class="form-control" placeholder="{{__("i.e. 4.6")}}" value="{{@$row->meta->aggregate_rating_value}}">
            </div>

            <div class="form-group col-lg-6">
                <label class="control-label">{{__("Aggregate total review count")}}</label>
                <input type="text" name="aggregate_total_review_count" class="form-control" placeholder="{{__("i.e. 345")}}" value="{{@$row->meta->aggregate_total_review_count}}">
            </div>
        </div>


        <div class="row">
            <div class="form-group col-lg-6">
                <label class="control-label">{{__("Price currency")}}</label>
                <input type="text" name="price_currency" class="form-control" placeholder="{{__("i.e. INR)")}}" value="{{@$row->meta->price_currency}}">
            </div>

            <div class="form-group col-lg-6">
                <label class="control-label">{{__("Price valid until date")}}</label>
                <input type="date" name="price_valid_date" class="form-control" placeholder="{{__("Price valid until date")}}" value="{{@$row->meta->price_valid_date}}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-6">
                    <label class="control-label">{{__("Availability")}}</label>
                    <div class="">
                        <select name="availability" class="form-control">
                            <option value="">{{__("-- Please Select --")}}</option>
                            <option value="InStock" @if(@$row->meta->availability=="InStock") selected @endif>{{__("InStock")}}</option>
                            <option value="OutOfStock" @if(@$row->meta->availability=="OutOfStock") selected @endif>{{__("OutOfStock")}}</option>
                        </select>
                    </div>
                </div>

            <div class="form-group col-lg-6">
                    <label class="control-label">{{__("Product condition")}}</label>
                    <div class="">
                        <select name="product_condition" class="form-control">
                            <option value="">{{__("-- Please Select --")}}</option>
                            <option value="Condition1" @if(@$row->meta->product_condition=="Condition1") selected @endif>{{__("Condition1")}}</option>
                            <option value="Condition2" @if(@$row->meta->product_condition=="Condition2") selected @endif>{{__("Condition2")}}</option>
                        </select>
                    </div>
                </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-6">
                <label class="control-label">{{__("Schema Price")}}</label>
                <input type="text" name="schema_price" class="form-control" placeholder="{{__("i.e. 499")}}" value="{{@$row->meta->schema_price}}">
            </div>

            <div class="form-group col-lg-6">
                <label class="control-label">{{__("Product url")}}</label>
                <input type="text" name="product_url" class="form-control" placeholder="{{__("Product url")}}" value="{{@$row->meta->product_url}}">
            </div>
        </div>
    </div>
</div>
