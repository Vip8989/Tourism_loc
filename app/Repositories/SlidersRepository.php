<?php

namespace Tour\Repositories;

use Tour\Slider;

class SlidersRepository extends Repository{


  //конструктор для получения данных из бд
  public function __construct(Slider $slider){
    $this->model=$slider;
  }

}



?>