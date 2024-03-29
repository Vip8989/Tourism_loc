<?php

namespace Tour\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Tour\Http\Controllers\Controller;

use Auth;

use Menu;

use Gate;


class AdminController extends \Tour\Http\Controllers\Controller
{
    //свойства

    //для хранения портфолио репозитория
    protected $p_rep;
   
    //articles repository
    protected $a_rep;
    //объект аутентифицированного пользователя
    protected $user;
    
    protected $template;
    
    protected $content = FALSE;
    
    protected $title;
    
    //массив переменных, которые будут передаваться в шаблон
    protected $vars;
    
    public function __construct() {
		
		$this->user = Auth::user();
        
        //доступ к контенту запрещен если пользователь не аутентифицировался
		if(!$this->user) {
		//abort(403);
		}
    }
    

    //ответ на определенный запрос
    public function renderOutput() {
		$this->vars = array_add($this->vars,'title',$this->title);
		
		$menu = $this->getMenu();
		
		$navigation = view(env('THEME').'.admin.navigation')->with('menu',$menu)->render();
		$this->vars = array_add($this->vars,'navigation',$navigation);
		
		if($this->content) {
			$this->vars = array_add($this->vars,'content',$this->content);
		}
		
		$footer = view(env('THEME').'.admin.footer')->render();
		$this->vars = array_add($this->vars,'footer',$footer);
		
		return view($this->template)->with($this->vars);
			
    }
    
    //меню для админки
    public function getMenu() {
		return Menu::make('adminMenu', function($menu) {

			//есть ли у пользователя права на просмотр панели администратора
			if(Gate::allows('VIEW_ADMIN_ARTICLES')) {
				$menu->add('Статьи',array('route' => 'admin.articles.index'));
			
			}

			if(Gate::allows('VIEW_ADMIN_MENU')) {
				$menu->add('Меню',  array('route'  => 'admin.menus.index'));
			
			}
			//$menu->add('Статьи',array('route' => 'admin.articles.index'));
			//$menu->add('Меню',  array('route'  => 'admin.menus.index'));
			$menu->add('Привилегии',  array('route'  => 'admin.permissions.index'));
			$menu->add('Пользователи',  array('route'  => 'admin.users.index'));
			//$menu->add('Туры');
		
			
			
			
		});
	}
}
