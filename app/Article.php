<?php

namespace Tour;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //получаем инфу о том пользователе, который добавил инфу
    public function user() {
		return $this->belongsTo('Tour\User');
	}
	//доступ к категории, к которой привязана конкретная запись
	public function category() {
		return $this->belongsTo('Tour\Category');
    }
    
	//предоставляет доступ к комментариям
	public function comments()
    {
        return $this->hasMany('Tour\Comment');
		}	
		
		//поля которые разрешены к массовому заполнению в бд для изображений, добавляемых из админки
		protected $fillable = ['title','img','alias','text','desc','keywords','meta_desc','category_id'];
	
}
