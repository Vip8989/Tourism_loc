<?php

namespace Tour\Repositories;

use Tour\Menu;

class MenusRepository extends Repository{


  //конструктор для получения данных из бд
  public function __construct(Menu $menu){
    $this->model=$menu;
  }

}



?>