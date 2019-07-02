<?php

namespace Tour;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //предоставит доступ к связанным моделям user
    public function users() {
		return $this->belongsToMany('Tour\User','role_user');
	}
	
	public function perms() {
		return $this->belongsToMany('Tour\Permission','permission_role');
	}
}
