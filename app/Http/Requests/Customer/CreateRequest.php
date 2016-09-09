<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'country_id' => 'required',
            //'description' =>'reguired|min:100',
            'email' => Auth::check() ? '' : 'required|email|unique:users',
                      
            
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'Максимальна довжина назви 100 символів',
            'name.required' => "Поле Назва інвестування  обов'язкове для заповнення",
            'country_id.required' => "Поле Країна інвестування обов'язкове для заповнення",
          //  'description.min' => 'Ви маєте надати більше інформації',
            //'description.required' => "Поле Опис проблеми обов'язкове для заповнення",
            "email" => "Гості мають обовязково вказати свою пошту для рєстрації",
            'unique' => "Ви вже зареєстровані. Спершу ви маєте авторизуватися за допомогою свого логіна і пароля",
        ];
    }
}
