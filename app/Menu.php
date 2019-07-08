<?php

namespace Tour;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //поля которые разрешены для заполнения
    protected $fillable = [
        'title', 'path','parent'
    ];


    //переопределение метода delete пунктов меню в админке
    public function delete(array $options = []) {
    	
        // $this
        //поиск всех дочерних элементов удаляемого пункта
    	self::where('parent',$this->id)->delete();
		return parent::delete($options);
	}
}
