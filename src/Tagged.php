<?php namespace Conner\Tagging;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Copyright (C) 2014 Robert Conner
 */
class Tagged extends Eloquent {

	protected $table = 'tagging_tagged';
	protected $fillable = ['tag_name', 'tag_slug'];

	public function taggable() {
		return $this->morphTo();
	}

}