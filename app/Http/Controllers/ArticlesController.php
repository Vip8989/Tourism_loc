<?php

namespace Tour\Http\Controllers;
use Illuminate\Http\Request;

use Tour\Repositories\PortfoliosRepository;
use Tour\Repositories\ArticlesRepository;
use Tour\Repositories\CommentsRepository;
use Tour\Http\Requests;
use Tour\Category;

class ArticlesController extends SiteController
{
    public function __construct(PortfoliosRepository $p_rep, ArticlesRepository $a_rep, CommentsRepository $c_rep) {
    	
    	parent::__construct(new \Tour\Repositories\MenusRepository(new \Tour\Menu));
    	
    	$this->p_rep = $p_rep;
			$this->a_rep = $a_rep;
			//в этом свойстве распологается объект класса CommentsRepository
			$this->c_rep = $c_rep;
    	
    	$this->bar = 'right';
    	
    	$this->template = env('THEME').'.articles';
		
	}
	
	public function index($cat_alias = FALSE)
    {

			$this->title = 'Туры';
			$this->keywords = 'String';
			$this->meta_desc = 'String';

        //получение статей
        $articles = $this->getArticles($cat_alias);

        $content = view(env('THEME').'.articles_content')->with('articles',$articles)->render();
				$this->vars = array_add($this->vars,'content',$content);
				

				//количество выбираемых записей. см.в settings.php
				$comments = $this->getComments(config('settings.recent_comments'));
        $portfolios = $this->getPortfolios(config('settings.recent_portfolios'));

        
        $this->contentRightBar = view(env('THEME').'.articlesBar')->with(['comments' => $comments,'portfolios' => $portfolios]);
        
        return $this->renderOutput();
		}
		

		//количество выбираемых аргументов из бд
		public function getComments($take) {
		
			//формирование переменной comments/что она должна вернуть из таблицы бд comments/ переменная take-кол-во выбираемых элементов из бд
			$comments = $this->c_rep->get(['text','name','email','site','article_id','user_id'],$take);
			
			if($comments) {
				$comments->load('article','user');
			}
			
			//возращает содержимое переменной comments
			return $comments;
		}
		
		//вернет коллекцию выбранных моделей из таблицы бд portfolios
		public function getPortfolios($take) {
			$portfolios = $this->p_rep->get(['title','text','alias','customer','img','filter_alias'],$take);
			return $portfolios;
		}
			
    
    public function getArticles($alias = FALSE) {
		
			$where = FALSE;
    	
    	if($alias) {
    		// WHERE `alias` = $alias
			$id = Category::select('id')->where('alias',$alias)->first()->id;
			//WHERE `category_id` = $id
			$where = ['category_id',$id];
		}
		
		$articles = $this->a_rep->get(['id','title','alias','created_at','img','desc','user_id','category_id','keywords', 'meta_desc'],FALSE,TRUE,$where);
		
		if($articles) {
			$articles->load('user','category','comments');
		}
		
		return $articles;
	}

	public function show($alias = FALSE) {
		
		$article = $this->a_rep->one($alias,['comments' => TRUE]);

		//декодирует из json формата изображения
		if($article) {
			$article->img = json_decode($article->img);
		}
		
		//dd($article);

		//переопределение свойств
		if(isset($article->id)) {
			$this->title = $article->title;
			$this->keywords = $article->keywords;
			$this->meta_desc = $article->meta_desc;
		}
		
		$content = view(env('THEME').'.article_content')->with('article',$article)->render();
		$this->vars = array_add($this->vars,'content',$content);
		
		
		$comments = $this->getComments(config('settings.recent_comments'));
        $portfolios = $this->getPortfolios(config('settings.recent_portfolios'));

        
        $this->contentRightBar = view(env('THEME').'.articlesBar')->with(['comments' => $comments,'portfolios' => $portfolios]);
		
		
		return $this->renderOutput();
	}	
    
}