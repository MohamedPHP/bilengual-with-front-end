<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontEndsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_ends', function (Blueprint $table) {
            $table->increments('id');
            $table->string('HomePageHeading')->nullable();
            $table->string('Android_Link')->nullable();
            $table->string('IOS_Link')->nullable();
            $table->string('Featuries_Page_Heading')->nullable();
            $table->string('Featuries_Side_Heading')->nullable();
            $table->string('Featuries_Small_Heading')->nullable();
            $table->string('Featuries_1')->nullable();
            $table->string('Featuries_2')->nullable();
            $table->string('Featuries_3')->nullable();
            $table->string('Featuries_4')->nullable();
            $table->string('DETAILS_Page_heading')->nullable();
            $table->string('DETAILS_Side_Heading')->nullable();
            $table->string('DETAILS_Small_Heading')->nullable();
            $table->string('DETAILS_1')->nullable();
            $table->string('DETAILS_2')->nullable();
            $table->string('DETAILS_3')->nullable();
            // about page
            $table->string('AnoutPageHeading')->nullable();
            $table->string('About_Pragraph_Heading')->nullable();
            $table->string('SERVICE_ITEM_Page_Heading')->nullable();
            $table->string('SERVICE_ITEM_Heading')->nullable();
            $table->string('SERVICE_ITEM_1')->nullable();
            $table->string('SERVICE_ITEM_2')->nullable();
            $table->string('SERVICE_ITEM_3')->nullable();
            $table->string('SERVICE_ITEM_4')->nullable();
            $table->string('About_Slider_img1')->nullable();
            $table->string('About_Slider_img2')->nullable();
            $table->string('About_Slider_img3')->nullable();
            $table->string('Manager_scoap_heading')->nullable();
            $table->string('Manager_scoap')->nullable();
            $table->string('Manager_img')->nullable();
            $table->string('Manager_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('front_ends');
    }
}
