<?php
namespace Tour\Repositories;

use Tour\Portfolio;

class PortfoliosRepository extends Repository{

       //конструктор для получения данных из бд
  public function __construct(Portfolio $portfolio){
    $this->model=$portfolio;
  }


  //переопределен метод one. Для работы галлереи, детальный просмотр
  public function one($alias,$attr = array()) {

    //конкретная модель выбранная из бд. 
		$portfolio = parent::one($alias,$attr);
    
    //преобразование из json формата в объекты
		if($portfolio && $portfolio->img) {
			$portfolio->img = json_decode($portfolio->img);
		}
		
		return $portfolio;
	}
	
}


?>