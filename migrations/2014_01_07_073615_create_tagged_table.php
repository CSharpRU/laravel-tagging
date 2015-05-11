<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaggedTable extends Migration {

	public function up() {
		Schema::create('tagging_tagged', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('tag_id')->unsigned();
			$table->string('taggable_id', 36)->index();
			$table->string('taggable_type', 255)->index();
			//$table->morphs('taggable');
			$table->string('tag_name', 255);
			$table->string('tag_slug', 255)->index();

            $table->foreign('tag_id')->references('id')->on('tagging_tags')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
		});
	}

	public function down() {
        Schema::table('tagging_tagged', function ($table) {
            $table->dropForeign('tagging_tagged_tag_id_foreign');
        });

		Schema::drop('tagging_tagged');
	}
}
