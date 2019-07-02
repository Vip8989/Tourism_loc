<?php

namespace Tour;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	//разрешены поля для массового заполнения в форме добавления коммента
	protected $fillable = ['name','text','site','user_id','article_id','parent_id','email'];

    //от конкретного коммента мы можем получить к какой записи он привязан
    public function article() {
		return $this->belongsTo('Tour\Article');
	}
    
    //инфа о пользователе для конкретного коммента
	public function user() {
		return $this->belongsTo('Tour\User');
	}
}
