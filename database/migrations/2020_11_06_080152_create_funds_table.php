<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funds', function (Blueprint $table) {
            $table->id();
			$table->string('fund_name');
			$table->longText('fund_description');
			$table->string('fund_type')->nullable();
			$table->text('venmo')->nullable();
			$table->text('paypal')->nullable();
			$table->string('full_name');
			$table->string('phone_no')->nullable();
			$table->text('fb_url');
			$table->text('insta_url');
			$table->text('image')->nullable();
			$table->string('fund_status')->nullable();
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
        Schema::dropIfExists('funds');
    }
}
