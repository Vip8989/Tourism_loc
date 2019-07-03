<?php

namespace Tour\Repositories;

use Tour\Role;

class RolesRepository extends Repository {
	
	
	public function __construct(Role $role) {
		$this->model = $role;
	}
	
}

?>