<?php

class PostComment extends \Eloquent {
	protected $fillable = [];

	public function post()
	{
		return $this->belongsTo("Post");
	}
}