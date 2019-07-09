<?php

namespace Tour\Repositories;

use Tour\Article;
use Gate;
use Image;
use Config;

class ArticlesRepository extends Repository {
	
	//модель для построения sql-запроса
	public function __construct(Article $articles) {
		$this->model = $articles;
	}

	//переопределенный метод one
	public function one($alias,$attr = array()) {
		$article = parent::one($alias,$attr);
		
		if($article && !empty($attr)) {
			$article->load('comments');
			$article->comments->load('user');
		}
		
		return $article;
	}

	//для админки добавление материала
	public function addArticle($request) {

		//проверка есть ли у пользователя права доступа
		if(Gate::denies('save', $this->model)) {
			//abort(403);
		}
		
		$data = $request->except('_token','image');
		
		if(empty($data)) {
			return array('error' => 'Нет данных');
		}
		
		//автоматически генерируется значение и сохраняется в бд
		if(empty($data['alias'])) {
			$data['alias'] = $this->transliterate($data['title']);
		}
		
		//dd($data);

		if($this->one($data['alias'],FALSE)) {
			$request->merge(array('alias' => $data['alias']));
			$request->flash();
			
			return ['error' => 'Данный псевдоним уже используется'];
		}
		
		//проверяем отправил ли пользователь файл с изображением
		if($request->hasFile('image')) {
			$image = $request->file('image');
			
			//корректно ли загружено изображение на сервер
			if($image->isValid()) {
				
				//случайно сгенерированная строка для имени изображений
				$str = str_random(8);
				
				//объект данного класса
				$obj = new \stdClass;
				
				//имена изображений
				$obj->mini = $str.'_mini.jpg';
				$obj->max = $str.'_max.jpg';
				$obj->path = $str.'.jpg';
				
				//работа с библиотекой intervention image
				//img-объект для хранения изображения для расширения intervention image
				$img = Image::make($image);
				
				//изменение размера изображений intervention image см.settings.php-настройки.
				$img->fit(Config::get('settings.image')['width'],
						Config::get('settings.image')['height'])->save(public_path().'/'.env('THEME').'/images/articles/'.$obj->path); 
				
				$img->fit(Config::get('settings.articles_img')['max']['width'],
						Config::get('settings.articles_img')['max']['height'])->save(public_path().'/'.env('THEME').'/images/articles/'.$obj->max); 
				
				$img->fit(Config::get('settings.articles_img')['mini']['width'],
						Config::get('settings.articles_img')['mini']['height'])->save(public_path().'/'.env('THEME').'/images/articles/'.$obj->mini); 
						
				//будет записано в бд в поле img
				$data['img'] = json_encode($obj);  
				
				//заполнение модели данными в бд
				$this->model->fill($data); 
				
				//сохранение модели в бд
				if($request->user()->articles()->save($this->model)) {
					return ['status' => 'Материал добавлен'];
				}                          
				
			}
			
		}
	}
	

	public function updateArticle($request, $article) {

		if(Gate::denies('edit', $this->model)) {
			abort(403);
		}
		
		$data = $request->except('_token','image','_method');
		
		if(empty($data)) {
			return array('error' => 'Нет данных');
		}
		
		if(empty($data['alias'])) {
			$data['alias'] = $this->transliterate($data['title']);
		}
		
		$result = $this->one($data['alias'],FALSE);
		
		if(isset($result->id) && ($result->id != $article->id)) {
			$request->merge(array('alias' => $data['alias']));
			$request->flash();
			
			return ['error' => 'Данный псевдоним уже успользуется'];
		}
		
		if($request->hasFile('image')) {
			$image = $request->file('image');
			
			if($image->isValid()) {
				
				$str = str_random(8);
				
				$obj = new \stdClass;
				
				$obj->mini = $str.'_mini.jpg';
				$obj->max = $str.'_max.jpg';
				$obj->path = $str.'.jpg';
				
				$img = Image::make($image);
				
				$img->fit(Config::get('settings.image')['width'],
						Config::get('settings.image')['height'])->save(public_path().'/'.env('THEME').'/images/articles/'.$obj->path); 
				
				$img->fit(Config::get('settings.articles_img')['max']['width'],
						Config::get('settings.articles_img')['max']['height'])->save(public_path().'/'.env('THEME').'/images/articles/'.$obj->max); 
				
				$img->fit(Config::get('settings.articles_img')['mini']['width'],
						Config::get('settings.articles_img')['mini']['height'])->save(public_path().'/'.env('THEME').'/images/articles/'.$obj->mini); 
						
				
				$data['img'] = json_encode($obj);  
				
				                         
				
			}
			
			
			
		}
		
		$article->fill($data); 
				
		if($article->update()) {
			return ['status' => 'Материал обновлен'];
		} 

	}
	
	//удаление материала из админки
	public function deleteArticle($article) {
		
		if(Gate::denies('destroy', $article)) {
			abort(403);
		}
		
		$article->comments()->delete();
		
		if($article->delete()) {
			return ['status' => 'Материал удален'];
		}
		
	}
	
}

?>