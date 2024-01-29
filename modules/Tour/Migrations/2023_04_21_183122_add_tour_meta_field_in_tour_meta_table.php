<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_tour_meta', function (Blueprint $table) {
            $table->tinyInteger('booking_inquiry_type')->default(0)->comment("0-Both,1-Enquiry,2-Booking")->nullable()->after("open_hours");
            $table->time('accept_booking_max_time')->nullable()->after("booking_inquiry_type");
            $table->text('robots_meta')->nullable()->after("accept_booking_max_time");
            $table->string('booking_form_label')->nullable()->after("robots_meta");
            $table->string('booking_form_url')->nullable()->after("booking_form_label");
            $table->string('booking_form_timing')->nullable()->after("booking_form_url");
            $table->text('tour_links')->nullable()->after("booking_form_timing");
            $table->text('tour_mobile_menus')->nullable()->after("tour_links");
            $table->tinyInteger('deposit_enable')->default(0)->comment("0-off,1-on")->nullable()->after("tour_links");
            $table->float('deposit_amount',5,2)->default(0)->nullable()->after("deposit_enable");
            $table->string('deposit_type')->nullable()->after("deposit_amount");
            $table->string('deposit_fomular')->nullable()->after("deposit_type");
            $table->text('notes')->nullable()->after("booking_form_timing");
            $table->text('tour_feature')->nullable()->after("notes");
            // $table->text('good_to_know')->nullable()->after("tour_feature");
            $table->string('brochure')->nullable()->after("tour_feature");
            $table->integer('adv_banner_url')->nullable()->after("brochure");
            $table->string('adv_banner_image_id')->nullable()->after("adv_banner_url");
            $table->float('review_rating_value',5,2)->default(0)->after("brochure");
            $table->float('review_best_rating',5,2)->default(0)->after("review_rating_value");
            $table->float('review_worst_rating',5,2)->default(0)->after("review_best_rating");
            $table->float('aggregate_rating_value',5,2)->default(0)->after("review_worst_rating");
            $table->integer('aggregate_total_review_count')->default(0)->after("aggregate_rating_value");
            $table->string('review_author')->nullable()->after("aggregate_total_review_count");
            $table->string('product_condition')->nullable()->after("review_author");
            $table->string('product_url')->nullable()->after("product_condition");
            $table->float('schema_price',10,2)->default(0)->after("product_url");
            $table->string('availability')->nullable()->after("schema_price");
            $table->date('price_valid_date')->nullable()->after("availability");
            $table->string('price_currency')->nullable()->after("price_valid_date");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_tour_meta', function (Blueprint $table) {
            //
        });
    }
};
