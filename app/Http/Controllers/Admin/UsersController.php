<?php

namespace Tour\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Tour\Http\Requests;
use Tour\Http\Requests\UserRequest;

use Tour\Http\Controllers\Controller;
use Tour\Repositories\UsersRepository;
use Tour\Repositories\RolesRepository;

use Gate;
use Tour\User;

class UsersController extends AdminController
{
    //для хранения объекта класса UsersRepository (для работы с таблицей бд user )
    protected $us_rep;
    //для хранения объекта класса RolesRepository (для работы с таблицей бд role)
    protected $rol_rep;


    public function __construct(RolesRepository $rol_rep, UsersRepository $us_rep) {
        parent::__construct();
        
        if (Gate::denies('EDIT_USERS')) {
            //abort(403);
        }

        //переопределяем значение свойств, исходя из значений переданных аргументов в методе конструкторе
        $this->us_rep = $us_rep;
        $this->rol_rep = $rol_rep;
        //переопределяем глобальный макет страницы пользователя (users.blade.php)
        $this->template = env('THEME').'.admin.users';
        
    }

    //отображает на экран главную страницу раздела пользователи
    public function index()
    {
        //в переменную users сохраняем коллкецию пользователей из таблицы users (коллекция всех пользователей в бд)
        $users = $this->us_rep->get();
        //переопределяем свойство content
        $this->content = view(env('THEME').'.admin.users_content')->with(['users'=>$users ])->render();
        
        return $this->renderOutput();
    }

    public function create()
    {
        //
		
		$this->title =  'Новый пользователь';
		//информация о ролях пользователя
		$roles = $this->getRoles()->reduce(function ($returnRoles, $role) {
		    $returnRoles[$role->id] = $role->name;
		    return $returnRoles;
		}, []);;
		
		$this->content = view(env('THEME').'.admin.users_create_content')->with('roles',$roles)->render();
        
        return $this->renderOutput();
    }
    
    //промежуточный метод
    public function getRoles() {
		return \Tour\Role::all();
    }
    
    //добавление нового пользователя
    public function store(UserRequest $request)
    {
        //
		$result = $this->us_rep->addUser($request);
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		return redirect('/admin')->with($result);
    }


    public function edit(User $user)
    {
       $this->title =  'Редактирование пользователя - '. $user->name;
		
		$roles = $this->getRoles()->reduce(function ($returnRoles, $role) {
		    $returnRoles[$role->id] = $role->name;
		    return $returnRoles;
		}, []);
		
		$this->content = view(env('THEME').'.admin.users_create_content')->with(['roles'=>$roles,'user'=>$user])->render();
        
        return $this->renderOutput();
		
    }

    public function update(UserRequest $request, User $user)
    {
        //
		$result = $this->us_rep->updateUser($request,$user);
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		return redirect('/admin')->with($result);
    }

    public function destroy(User $user)
    {
        $result = $this->us_rep->deleteUser($user);
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		return redirect('/admin')->with($result);
    }
}
