<?php

namespace Tour\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Tour\Http\Requests;
use Tour\Http\Controllers\Controller;

use Tour\Repositories\MenusRepository;
use Tour\Repositories\ArticlesRepository;
use Tour\Repositories\PortfoliosRepository;

use Gate;
use Menu;

class MenusController extends AdminController
{

    //свойство для хранения объекта репозитория
    protected $m_rep;

    public function __construct(MenusRepository $m_rep, ArticlesRepository $a_rep, PortfoliosRepository $p_rep)
    {
        parent::__construct();
        
        if(Gate::denies('VIEW_ADMIN_MENU')) {
			//abort(403);	
		} 
        
        $this->m_rep = $m_rep;
        $this->a_rep = $a_rep;
        $this->p_rep = $p_rep;
        
        $this->template = env('THEME').'.admin.menus';
        
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //данные о ранее добавленных пунктах меню
        $menu = $this->getMenus();
        
        $this->content = view(env('THEME').'.admin.menus_content')->with('menus',$menu)->render();
        
        return $this->renderOutput();
    }


    public function getMenus()
    {
        //выбираем всю инфу из таблицы меню
        $menu = $this->m_rep->get();
        
        if($menu->isEmpty()) {
			return FALSE;
		}
		
		return Menu::make('forMenuPart', function($m) use($menu) {
			
			foreach($menu as $item) {
				if($item->parent == 0) {
					$m->add($item->title,$item->path)->id($item->id);
				}
				//если дочерний пункт меню
				else {
					if($m->find($item->parent)) {
						$m->find($item->parent)->add($item->title,$item->path)->id($item->id);
					}
				}
			}
			
		});
		

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->title = 'Новый пункт меню';
    	//доступные пункты меню
    	$tmp = $this->getMenus()->roots();
    	
    	//null метод reduce  функция будет выполнене для каждого элемента коллекции
    	$menus = $tmp->reduce(function($returnMenus, $menu) {
    		
    		$returnMenus[$menu->id] = $menu->title;
    		return $returnMenus;	
    		
    	},['0' => 'Родительский пункт меню']);
    	
    	$categories = \Tour\Category::select(['title','alias','parent_id','id'])->get();
    	
    	$list = array();
    	$list = array_add($list,'0','Не используется');
    	$list = array_add($list,'parent','Раздел блог');
    	
    	foreach($categories as $category) {
			if($category->parent_id == 0) {
				$list[$category->title] = array();
			}
			else {
				$list[$categories->where('id',$category->parent_id)->first()->title][$category->alias] = $category->title;
			}
		}
    	
    	$articles = $this->a_rep->get(['id','title','alias']);
    	
    	$articles = $articles->reduce(function ($returnArticles, $article) {
		    $returnArticles[$article->alias] = $article->title;
		    return $returnArticles;
		}, []);
		
		
		$filters = \Tour\Filter::select('id','title','alias')->get()->reduce(function ($returnFilters, $filter) {
		    $returnFilters[$filter->alias] = $filter->title;
		    return $returnFilters;
		}, ['parent' => 'Раздел портфолио']);
		
		$portfolios = $this->p_rep->get(['id','alias','title'])->reduce(function ($returnPortfolios, $portfolio) {
		    $returnPortfolios[$portfolio->alias] = $portfolio->title;
		    return $returnPortfolios;
		}, []);
		
		$this->content = view(env('THEME').'.admin.menus_create_content')->with(['menus'=>$menus,'categories'=>$list,'articles'=>$articles,'filters' => $filters,'portfolios' => $portfolios])->render();
		
		
		
		return $this->renderOutput();
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
