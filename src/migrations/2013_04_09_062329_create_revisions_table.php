<?php

use Illuminate\Database\Migrations\Migration;

class CreateRevisionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('revisions', function($table) {
			$table->increments('id');
			$table->string('revisionable_type');
			$table->integer('revisionable_id');
			$table->unsignedInteger('user_id');
                        $table->foreign('user_id')
                                ->references('id')
                                ->on('users');
			$table->string('key');
			$table->text('old_value')->nullable();
			$table->text('new_value')->nullable();
                        $table->string('ip','15');
                        $table->string('country','55')->nullable()->default(null);
                        $table->string('state','55')->nullable()->default(null);
                        $table->string('city','55')->nullable()->default(null);
                        $table->string('action','60')->nullable()->default(null);
                        $table->string('event','60')->nullable()->default(null);
                        $table->string('summary')->nullable()->default(null);
			$table->timestamps();

			$table->index(array('revisionable_id', 'revisionable_type'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('revisions');
	}

}
