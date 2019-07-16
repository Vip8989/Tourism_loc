<?php

namespace Tour\Http\Controllers\Auth;

use Tour\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


   
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('guest')->except('logout');
       
    }


     //Делаем авторизацию по полю login вместо стандартного email
     public function username()
     {
         return 'login';
     }
     
     //Перенаправление на страницу логина после выхода пользователя из системы
     public function logout()
     {        
        Auth::logout();
        return redirect('/');
       //return redirect (view (env('THEME').'.login'));

     }

    public function showLoginForm()
    {
        return view (env('THEME').'.login');
    }


}
