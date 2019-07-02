<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/

Route::resource('/', 'IndexController', [
                                       'only'=>['index'],
                                       'names'=>[
                                             'index'=>'home'
                                       ]
                                       
                                       ]);
Route::resource('portfolios','PortfolioController',[
													
                                        'parameters' => [
                                        'portfolios' => 'alias'
                                        ]
                                        ]);  
 //маршрут для сайт-бара
Route::resource('articles','ArticlesController',[
												
                                            'parameters'=>[
                                            
                                                'articles' => 'alias'
                                            
                                            ]
                                            
                                            ]);	
   //для категорий                                                                              //валидация маршрута
 Route::get('articles/cat/{cat_alias?}',['uses'=>'ArticlesController@index','as'=>'articlesCat'])->where('cat_alias','[\w-]+');   
            
//маршрут для работы с комментариями
 Route::resource('comment','CommentController',['only'=>['store']]);

 //маршрут для контактной информации (метод match - для обработки двух видов запросов get / post)
Route::match(['get','post'],'/contacts',['uses'=>'ContactsController@index','as'=>'contacts']);

//Route::auth()-метод для регистрации пользователей и сброса пароля  //php artisan make:auth


//выход из учетной записи
//Route::get('logout','Auth\LoginController@logout');

	//отображение формы аутентификации
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
//POST запрос аутентификации на сайте
Route::post('login', 'Auth\LoginController@login');
//POST запрос на выход из системы (логаут)
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


//admin
Route::group(['as' => 'admin.','prefix' => 'admin','middleware'=> 'auth'],function() {
	
	//admin страница 
    //Route::get('/',['uses' => 'Admin\IndexController@index','as' => 'adminIndex'])->name('/');

    Route::get('/',['uses' => 'Admin\IndexController@index','as' => 'adminIndex']);
   
    //для редактирования материалов блога
    Route::resource('/articles','Admin\ArticlesController');
   
});


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
