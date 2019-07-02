<?php

namespace Tour\Http\Controllers;

use Illuminate\Http\Request;

use Tour\Repositories\SlidersRepository;
use Tour\Repositories\PortfoliosRepository;
use Tour\Repositories\ArticlesRepository;

use Config;

class IndexController extends SiteController
{

    //вызываем родительский конструктор/переопределяем
    public function __construct(SlidersRepository $s_rep, PortfoliosRepository $p_rep, ArticlesRepository $a_rep){

        parent::__construct(new\Tour\Repositories\MenusRepository (new \Tour\Menu));

        //для портфолио
        $this->p_rep = $p_rep;

        //для слайдера
        $this->s_rep = $s_rep;

        //для сайт бара
        $this->a_rep = $a_rep;

        $this->bar = 'right';
        $this->template= env('THEME').'.index';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //контент главной страницы сайта
    public function index()
    {


        $portfolios = $this->getPortfolio();//метод вернет список портфолио . Описан ниже

        //в этой переменной отработка конкретного шаблона/render - генерирует строку из указанного шаблона
        $content = view(env('THEME').'.content')->with('portfolios',$portfolios)->render();

        //передача в общий шаблон
        $this->vars = array_add($this->vars,'content',$content);

        //dd($portfolio);

        //инфа о изображениях в бд слайдера. getSliders-метод посредник
        $sliderItems = $this->getSliders();

        //dd($sliderItems);

        $sliders = view(env('THEME').'.slider')->with('sliders',$sliderItems)->render();
        $this->vars = array_add($this->vars, 'sliders',$sliders);

        //для мета тегов
        $this->keywords = 'tourism';
		$this->meta_desc = 'travelling';
		$this->title = 'Across Borders';
		
        

        $articles = $this->getArticles();
        
        //dd($articles);

         //site-bar
         $this->contentRightBar = view(env('THEME').'.indexBar')->with('articles',$articles)->render();
         
        return $this->renderOutput();
        //
    }


    //список записей блога из бд
    protected function getArticles() {
                                      //выбираем из бд эти поля.
        $articles = $this->a_rep->get(['title','created_at','img','alias'],
        Config::get('settings.home_articles_count'));
    	
    	return $articles;
    }	

    //метод будет работать с репозиторием
    protected function getPortfolio(){

        $portfolio = $this->p_rep->get('*', Config::get('settings.home_port_count'));//метод get описан в родительском классе репозитория, осуществляет выборку всех записей из бд

        return $portfolio;

    }

    public function getSliders(){

        // $sliders переменная хранит в себе коллекцию моделей
        $sliders= $this->s_rep->get();//для репозитория s_rep (для работы с бд)

        if($sliders->isEmpty()){
            return FALSE;
        }

        $sliders->transform(function($item,$key){

            //изменение свойства img
            $item->img = Config::get('settings.slider_path').'/'.$item->img;
            return $item;

        });
        //dd($sliders);

        return $sliders;
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
