@php $review_score = $row->review_data @endphp
<div class="bravo_single_book_wrap d-flex justify-end js-pin-content" data-offset="120">
    <div class="lg:w-full d-flex flex-column items-center">
        <div class="bravo_single_book tr_single_book px-20 py-20">
            <div id="bravo_event_book_app" v-cloak>
                <div class="row y-gap-15 items-center justify-between">
                    <div class="col-auto">
                        <div class="text-14 text-light-1">
                            {{__("From")}}
                            <span class="text-14 text-red-1 line-through">{{ $row->display_sale_price }}</span>
                            <span class="text-20 fw-500 text-dark-1">{{ $row->display_price }}</span>
                        </div>
                    </div>
                    @if($row->discount_percent)
                        <div class="col-auto py-5 px-15 rounded-4 text-12 lh-16 fw-500 uppercase bg-blue-1 text-white mt-5">
                            {{__("Sale off :number",['number'=>$row->discount_percent])}}
                        </div>
                    @endif
                </div>
				<ul class="single-contact text-15 d-flex justify-between items-center mt-10">
                                    <li class="fc x-gap-10"><span>Call: </span>
                                       <a class="call" href="tel:+917447700052">052</a> 
                                       <a class="call" href="tel:+917447700052">052</a>
                                       <a class="call" href="tel:+917447700052">053</a>
                                    </li> 
                                 </ul>
                <div class="nav-enquiry d-none" v-if="is_form_enquiry_and_book">
                    <div class="enquiry-item active" >
                        <span>{{ __("Book") }}</span>
                    </div>
                    <div class="enquiry-item" data-toggle="modal" data-target="#enquiry_form_modal">
                        <span>{{ __("Enquiry") }}</span>
                    </div>
                </div>
                <div class="form-book">
                    <div class="form-content">
                        <div class="row y-gap-20 pt-20">
                            <div class="col-12">
                                <div class="form-group form-date-field form-date-search clearfix px-20 py-10 bg-white border-light rounded-4 -right position-relative" data-format="{{get_moment_date_format()}}">
                                    <div class="date-wrapper clearfix" @click="openStartDate">
                                        <div class="check-in-wrapper d-flex items-center">  
										<i class="icon-calendar-2 text-18 mr-10"></i>
                                            <div class="render check-in-render" v-html="start_date_html"></div>
                                            @if(!empty($row->min_day_before_booking))
                                                <div class="render check-in-render">
                                                    <small>
                                                        @if($row->min_day_before_booking > 1)
                                                            - {{ __("Book :number days in advance",["number"=>$row->min_day_before_booking]) }}
                                                        @else
                                                            - {{ __("Book :number day in advance",["number"=>$row->min_day_before_booking]) }}
                                                        @endif
                                                    </small>
                                                </div>
                                            @endif
                                            @if(!empty($row->min_day_stays))
                                                <div class="render check-in-render">
                                                    <small>
                                                        @if($row->min_day_stays > 1)
                                                            - {{ __("Stay at least :number days",["number"=>$row->min_day_stays]) }}
                                                        @else
                                                            - {{ __("Stay at least :number day",["number"=>$row->min_day_stays]) }}
                                                        @endif
                                                    </small>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="text" class="start_date" ref="start_date" style="height: 1px;visibility: hidden;position: absolute;left: 0;">
                                </div>
                            </div>
                            <div class="col-12" v-for="(type,index) in ticket_types" v-if="ticket_types">
                                <div class="searchMenu-guests px-20 py-10 border-light bg-white rounded-4 js-form-dd" :class="{'d-none':type.max==0}">
                                    <div data-x-dd-click="searchMenu-guests">
                                        <h4 class="text-15 fw-500 ls-2 lh-16">@{{type.name}}</h4>
                                        <h4 class="text-12 fw-400 ls-2 text-light-1">@{{type.display_price}} {{__("per ticket")}}</h4>
                                        <div class="text-15 text-light-1 ls-2 lh-16">
                                            <span class="js-count-adult">@{{ type.number }}</span>
                                        </div>
                                    </div>
                                    <div class="searchMenu-guests__field shadow-2 mt-10" data-x-dd="searchMenu-guests" data-x-dd-toggle="-is-active">
                                        <div class="bg-white px-30 py-30 rounded-4">
                                            <div class="row y-gap-10 justify-between items-center form-guest-search">
                                                <div class="col-auto">
                                                    <div class="text-15 fw-500">{{ __('Number') }}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="d-flex items-center js-counter" data-value-change=".js-count-adult">
                                                        <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-down" @click="minusPersonType(type)">
                                                            <i class="icon-minus text-12"></i>
                                                        </button>
                                                        <span class="input"><input type="number" v-model="type.number" min="1" @change="changePersonType(type)"/></span>
                                                        <button class="button -outline-blue-1 text-blue-1 size-38 rounded-4 js-up" @click="addPersonType(type)">
                                                            <i class="icon-plus text-12"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 form-section-group" v-if="booking_time_slots">
                                <div class="px-20 py-10 bg-white rounded-4 form-group border-light">  <h4 class="form-section-title text-15 fw-500 ls-2 lh-16 mb-5">{{__('Time Slot:')}}</h4>
                                <div class="slots-wrapper d-flex items-center gap-10">
                                    <span @click="selectStartTime(time)" :class="{'-success-1':isInArray(time) == true}" v-for="(time,index) in booking_time_slots" class="slot button rounded-4 border-light">@{{time}}</span>
                                </div>
                                </div>
                            </div>
                            <div class="col-12" v-if="extra_price.length">
                                <div class="form-section-group px-20 py-10 border-light rounded-4">
                                    <h4 class="form-section-title text-15 fw-500 ls-2 lh-16">{{__('Extra prices:')}}</h4>
                                    <div class="form-group " v-for="(type,index) in extra_price">
                                        <div class="extra-price-wrap d-flex justify-content-between">
                                            <div class="flex-grow-1">
                                                <label class="d-flex items-center">
                                                    <span class="form-checkbox ">
                                                        <input type="checkbox" true-value="1" false-value="0" v-model="type.enable" style="display: none">
                                                        <span class="form-checkbox__mark">
                                                            <span class="form-checkbox__icon icon-check"></span>
                                                        </span>
                                                    </span>
                                                    <span class="text-15 ml-10">@{{type.name}}</span>
                                                </label>
                                            </div>
                                            <div class="flex-shrink-0">@{{type.price_html}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" v-if="buyer_fees.length">
                                <div class="form-section-group form-group-padding px-20 py-10 border-light rounded-4">
                                    <div class="extra-price-wrap d-flex justify-content-between" v-for="(type,index) in buyer_fees">
                                        <div class="flex-grow-1">
                                            <label class="text-15">@{{type.type_name}}
                                                <i class="fa fa-info-circle" v-if="type.desc" data-bs-toggle="tooltip" data-placement="top" :title="type.type_desc"></i>
                                            </label>
                                            <div class="render" v-if="type.price_type">(@{{type.price_type}})</div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="unit" v-if='type.unit == "percent"'>
                                                @{{ type.price }}%
                                            </div>
                                            <div class="unit" v-else >
                                                @{{ formatMoney(type.price) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" v-if="total_price > 0">
                                <ul class="form-section-total list-unstyled px-20 py-10 border-light rounded-4">
                                    <li class="d-flex justify-content-between">
                                        <label class="text-15 fw-500">{{__("Total")}}</label>
                                        <span class="price">@{{total_price_html}}</span>
                                    </li>
                                    <li class="d-flex justify-content-between" v-if="is_deposit_ready">
                                        <label for="">{{__("Pay now")}}</label>
                                        <span class="price">@{{pay_now_price_html}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12" v-if="html">
                                <div v-html="html"></div>
                            </div>
                            <div class="col-12">
                                <div class="submit-group">
                                    <a class="button -dark-1 py-15 px-35 h-50 col-12 rounded-4 bg-blue-1 text-white cursor-pointer" @click="doSubmit($event)" :class="{'disabled':onSubmit,'btn-success':(step == 2),'btn-primary':step == 1}" name="submit">
                                        <span v-if="step == 1">{{__("BOOK NOW")}}</span>
                                        <span v-if="step == 2">{{__("Book Now")}}</span>
                                        <i v-show="onSubmit" class="fa fa-spinner fa-spin"></i>
                                    </a>
									<h4 class="text-line text-16">
									<span>Or</span>
									</h4>
									<button class="btnEnquiry button py-20 px-35 h-34 col-12 ro-4 whtsp text-white mt-15">
                                       <i class="fa fa-whatsapp t14 mr-10 t14 mr-10"></i>  Send Enquiry </button>
                                    <div class="alert-text text-danger mt-10" v-show="message.content" v-html="message.content" :class="{'danger':!message.type,'success':message.type}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex items-center pt-20">
                    <div class="size-40 flex-center bg-light-2 rounded-full">
                        <i class="icon-heart text-16 text-green-2"></i>
                    </div>
                    <div class="text-14 lh-16 ml-10">{{__(":number% of travelers recommend this experience",['number'=>$row->recommend_percent])}}</div>
                </div>
            </div>
        </div>
		<div class="mt-10"> 
		<div class="sm:ma-10 ic jb bg-blue-2 text-14 px-15 py-10 ro-8 mt-10">
            <div class="text-14 text-light-1">{{__('Not sure? You can cancel this reservation up to 24 hours in advance for a full refund.')}}</div>
        </div>
		 </div>
    </div>
</div>
@include("Booking::frontend.global.enquiry-form",['service_type'=>'event'])
