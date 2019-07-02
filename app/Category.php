<?php

namespace Tour;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function articles() {
		return $this->hasMany('Tour\Articles');
	}
}
