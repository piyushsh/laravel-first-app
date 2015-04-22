<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactForm extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('contacts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('contact_no')->nullable;
            $table->string('email');
            $table->text('query');
            $table->timestamp('contacted_at');
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
		//
        Schema::drop('contacts');
	}

}
