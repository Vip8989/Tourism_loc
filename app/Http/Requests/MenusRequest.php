<?php

namespace Tour\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Tour\Http\Requests\Request;

class MenusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //есть ли у пользователя права на изменения меню в админке
        return \Auth::user()->canDo('EDIT_MENU');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //поле title обязательно к заполнению
            'title'=>'required|max:255'
        ];
    }
}
