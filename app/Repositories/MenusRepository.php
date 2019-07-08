<?php

namespace Tour\Repositories;
use Tour\Menu;
use Gate;

class MenusRepository extends Repository{


  //конструктор для получения данных из бд
  public function __construct(Menu $menu){
    $this->model=$menu;
  }

  //для меню в админке (запрос который был отправлен пользователем)
  public function addMenu($request) {
		if(Gate::denies('save', $this->model)) {
			abort(403);
		}
		//какую информацию необходимо вернуть
		$data = $request->only('type','title','parent');
		
		if(empty($data)) {
			return ['error'=>'Нет данных'];
		}
		
		//dd($request->all());
		
		switch($data['type']) {
			
			case 'customLink':
				$data['path'] = $request->input('custom_link');
			break;
			
			case 'blogLink' :
			
				if($request->input('category_alias')) {
          //на раздел блог, отображение всех материалов
					if($request->input('category_alias') == 'parent') {
            //путь на определенный маршрут
						$data['path'] = route('articles.index');
					}
					else {
						$data['path'] = route('articlesCat',['cat_alias'=>$request->input('category_alias')]);
					}
				}
				
				else if($request->input('article_alias')) {
					$data['path'] = route('articles.show',['alias' => $request->input('article_alias')]);
				}
			
			break;
			
			case 'portfolioLink' :
				if($request->input('filter_alias')) {
					if($request->input('filter_alias') == 'parent') {
            //список работ портфолио всех
						$data['path'] = route('portfolios.index');
					}
				}
				
				else if($request->input('portfolio_alias')) {
					$data['path'] = route('portfolios.show',['alias' => $request->input('portfolio_alias')]);
				}
      break;
      //можно добавить default по умолчанию если ни один пункт не выбран, куда перенаправлять пользователя.
			
		}
		

		unset($data['type']);
    
    //заполняем текущую модель данными в бд
		if($this->model->fill($data)->save()) {
			return ['status'=>'Ссылка добавлена'];
		}
			
	}

//обновление меню в базе данных
	public function updateMenu($request, $menu) {
		if(Gate::denies('save', $this->model)) {
			//abort(403);
		}
		
		$data = $request->only('type','title','parent');
		
		if(empty($data)) {
			return ['error'=>'Нет данных'];
		}
		
		//dd($request->all());
		
		switch($data['type']) {
			
			case 'customLink':
				$data['path'] = $request->input('custom_link');
			break;
			
			case 'blogLink' :
			
				if($request->input('category_alias')) {
					if($request->input('category_alias') == 'parent') {
						$data['path'] = route('articles.index');
					}
					else {
						$data['path'] = route('articlesCat',['cat_alias'=>$request->input('category_alias')]);
					}
				}
				
				else if($request->input('article_alias')) {
					$data['path'] = route('articles.show',['alias' => $request->input('article_alias')]);
				}
			
			break;
			
			case 'portfolioLink' :
				if($request->input('filter_alias')) {
					if($request->input('filter_alias') == 'parent') {
						$data['path'] = route('portfolios.index');
					}
				}
				
				else if($request->input('portfolio_alias')) {
					$data['path'] = route('portfolios.show',['alias' => $request->input('portfolio_alias')]);
				}
			break;
			
		}
		

		unset($data['type']);
		
		if($menu->fill($data)->update()) {
			return ['status'=>'Ссылка обновлена'];
		}
		
		
		
	}

	public function deleteMenu($menu) {
		if(Gate::denies('save', $this->model)) {
			abort(403);
		}
		
		if($menu->delete()) {
			return ['status'=>'Ссылка удалена'];
		}
	}

}
?>