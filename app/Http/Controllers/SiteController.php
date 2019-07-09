<?php

namespace Tour\Http\Controllers;

use Illuminate\Http\Request;

use Tour\Repositories\MenusRepository;
use Menu;

//родительский контроллер
class SiteController extends Controller
{
    //хранение логики для работы с портфолио
    protected $p_rep;

    //логика для работы со слайдером
    protected $s_rep;

    //логика для работы со статьями
    protected $a_rep;

    //для работы с пунктами меню
    protected $m_rep;

    //для отображения в браузере
    protected $keywords;
	protected $meta_desc;
	protected $title;

    //имя шаблона для отображения инфы для конкретной страницы
    protected $template;

    //массив передаваемых переменных в шаблон
    protected $vars = array();

    //значение, показывающее есть ли сайт-бар
    protected $contentRightBar = FALSE;//справа
    protected $contentLeftBar = FALSE;//слева
    protected $bar='no';//нету сайт-бара

    //значение общих свойств
    public function __construct(MenusRepository $m_rep){

        $this->m_rep=$m_rep;
    }

    //возвращает конкректный отработанный вид
    protected function renderOutput(){

        //метод для формирования меню
        $menu=$this->getMenu();
        //dd($menu);

        $navigation = view(env('THEME').'.navigation')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);


        //для сайт бара
        if($this->contentRightBar) {
			$rightBar = view(env('THEME').'.rightBar')->with('content_rightBar',$this->contentRightBar)->render();
			$this->vars = array_add($this->vars,'rightBar',$rightBar);
        }


        if($this->contentLeftBar) {
			$leftBar = view(env('THEME').'.leftBar')->with('content_leftBar',$this->contentLeftBar)->render();
			$this->vars = array_add($this->vars,'leftBar',$leftBar);
		}
		

        $this->vars = array_add($this->vars,'bar',$this->bar);

        //для браузера
        $this->vars = array_add($this->vars,'keywords',$this->keywords);
		$this->vars = array_add($this->vars,'meta_desc',$this->meta_desc);
        $this->vars = array_add($this->vars,'title',$this->title);
        
        //футер
        $footer = view(env('THEME').'.footer')->render();
		$this->vars = array_add($this->vars,'footer',$footer);
		
        

        return view($this->template)->with($this->vars);

    }

    //метод для работы меню
    public function getMenu(){
      
        //получаем коллекцию моделей из бд
        $menu=$this->m_rep->get();

        //из данной коллекции получаем конкретное меню
       $mBuilder = Menu::make('MyNav', function($m) use ($menu){
          
        foreach($menu as $item){
            //если 0, то это родительский пункт меню
            if($item->parent == 0){
                //добавляем новый пункт в меню
                $m->add($item->title,$item->path)->id($item->id);
            }
            //дочерние пункты меню
            else{
                if ($m->find($item->parent)){
                    $m->find($item->parent)->add($item->title,$item->path)->id($item->id);
                }
            }
        }
       });

       //dd($mBuilder);
        return $mBuilder;
    }




}
