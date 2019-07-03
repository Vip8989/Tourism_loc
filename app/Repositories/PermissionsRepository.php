<?php

namespace Tour\Repositories;

use Tour\Permission;
use Gate;

class PermissionsRepository extends Repository {
	
	//хранит объект репозитория rolesRepository
	protected $rol_rep;
	
	
	public function __construct(Permission $permission, RolesRepository $rol_rep) {
		$this->model = $permission;
		
		$this->rol_rep = $rol_rep;
	}
	
  
  //смена прав и привилегий для админки
	public function changePermissions ($request) {
		
		if(Gate::denies('change', $this->model)) {
			abort(403);
		}
		//что не будет попадать в переменную data
		$data = $request->except('_token');
		
		$roles = $this->rol_rep->get();
		
	
		
		foreach($roles as $value) {
			if(isset($data[$value->id])) {
				$value->savePermissions($data[$value->id]);
			}
			
			else {
				$value->savePermissions([]);
			}
		}
		
		return ['status' => 'Права обновлены'];
	}
	
	
}

?>