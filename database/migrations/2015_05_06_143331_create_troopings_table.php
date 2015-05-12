<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTroopingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('troopings', function(Blueprint $table)
		{
		    $table->engine = 'InnoDB';

			$table->increments('id');
			$table->string('title');
			$table->date('started_at');
			$table->date('ended_at')->nullable();
			$table->string('place');
			$table->string('website_link')->nullable();
			$table->longText('teaser')->nullable();
			$table->longText('report')->nullable();
			$table->timestamp('published_as_upcoming_at')->nullable();
			$table->timestamp('published_as_visited_at')->nullable();
			$table->softDeletes();
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
		Schema::drop('troopings');
	}

}
