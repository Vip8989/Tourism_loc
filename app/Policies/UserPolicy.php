<?php

namespace Tour\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Tour\User;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
  
    //может ли пользователь создавать пользователя
	public function create(User $user)
    {
		return $user->can('EDIT_USERS');
    }
    
    //может ли пользователь редактировать
    public function edit(User $user)
    {
		return $user->can('EDIT_USERS');
    }
}
