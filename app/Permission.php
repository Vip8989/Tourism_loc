<?php

namespace Tour;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //предоставляет доступ к связанным моделям role модели permission
    public function roles() {
		return $this->belongsToMany('Tour\Role','permission_role');
	}
}
