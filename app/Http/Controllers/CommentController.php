<?php

namespace Tour\Http\Controllers;

use Illuminate\Http\Request;

use Tour\Http\Requests;

use Validator;

use Auth;

use Tour\Comment;

use Tour\Article;

class CommentController extends SiteController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //информация, которую пользователь добавил в поля формы
        $data = $request->except('_token','comment_post_ID','comment_parent');
        
        $data['article_id'] = $request->input('comment_post_ID');
        $data['parent_id'] = $request->input('comment_parent');
        
        $validator = Validator::make($data,[
        
        	'article_id' => 'integer|required',
        	'parent_id' => 'integer|required',
        	'text' => 'string|required'
        
        ]);
        
        $validator->sometimes(['name','email'],'required|max:255',function($input) {
        	
        	return !Auth::check();
        	
        });
        
        if($validator->fails()) {
			return \Response::json(['error'=>$validator->errors()->all()]);
		}
		
		$user = Auth::user();
		
		$comment = new Comment($data);
		
		if($user) {
			$comment->user_id = $user->id;
		}
		
		$post = Article::find($data['article_id']);
        
        //сохранение инфы в бд (коммента)
		$post->comments()->save($comment);
        
        //инфа о связанных моделях (если есть пользователь, то инфа добавится в противном случае - нет)
        $comment->load('user');
        
        //индетификатор коммента
		$data['id'] = $comment->id;
        
        //если не аутетифицированный пользователь, то записываем поля. Если наоборот берем значения
		$data['email'] = (!empty($data['email'])) ? $data['email'] : $comment->user->email;        
		$data['name'] = (!empty($data['name'])) ? $data['name'] : $comment->user->name;        
		
		//для аватарки
        $data['hash'] = md5($data['email']);
        
		//сохраняем готовый коммент, который отправим на сервер. Вернет готовый шаблон html(макет единственного коммента)
		$view_comment = view(env('THEME').'.content_one_comment')->with('data',$data)->render();
        
        //возвращаем ответ в формате json из файла myscripts
		return \Response::json(['success' => TRUE,'comment'=>$view_comment,'data' => $data]);
        
        exit();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
