<?php

namespace Tour\Http\Controllers\Admin;

use Illuminate\Http\Request;
//?
use Tour\Http\Requests;

use Tour\Http\Controllers\Controller;
use Tour\Repositories\PermissionsRepository;
use Tour\Repositories\RolesRepository;

use Gate;

class PermissionsController extends AdminController
{

    protected $per_rep;
    protected $rol_rep;
    
    public function __construct(PermissionsRepository $per_rep, RolesRepository $rol_rep)
    {
        parent::__construct();
        
        if(Gate::denies('EDIT_USERS')) {
			//abort(403);
		}
        
        $this->per_rep = $per_rep;
        $this->rol_rep = $rol_rep;
        
        $this->template = env('THEME').'.admin.permissions';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->title = "Менеджер прав пользователей";
        
        //коллекция доступных ролей
        $roles = $this->getRoles();
        //коллекция привиллегий
        $permissions = $this->getPermissions();
        
        $this->content = view(env('THEME').'.admin.permissions_content')->with(['roles'=>$roles,'priv' => $permissions])->render();      
        
        return $this->renderOutput();
    }

    //возвращает коллекцию доступных ролей
    public function getRoles()
    {
        $roles = $this->rol_rep->get();
        
        return $roles;
    }
    //возвращает коллекцию доступных прав
    public function getPermissions()
    {
        $permissions = $this->per_rep->get();
        
        return $permissions;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //смена прав метод changePermissions описан в PermissionsRepository
        $result = $this->per_rep->changePermissions($request);
		
		if(is_array($result) && !empty($result['error'])) {
			return back()->with($result);
		}
		
		return back()->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
