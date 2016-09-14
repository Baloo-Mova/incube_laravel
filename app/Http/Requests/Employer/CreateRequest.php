<?php

namespace App\Http\Requests\Employer;

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
           'company_name' => 'required|max:100',
           'email' => Auth::check() ? '' : 'required|email|unique:users',
           'contacts' => 'required|min:20',
            
            /* 'phone'        => 'required',
            'email'        => 'required',
            'web_site'     => 'required',
            'company_info'     => 'required',
            'company_type'     => 'required',
            'description'  => 'required',
            'adress'       => 'required',*/
        ];
    }

    public function messages()
    {
        return [
            
            'company_name.max' => 'Максимальна довжина імені 100 символів',
            'company_name.required' => "Поле Назва інвестування  обов'язкове для заповнення",
            'contacts.required' => "Поле Контактні дані обов'язкове для заповнення",
            'contacts.min' => "Поле Контактні дані ну ДУУУУУУЖЕ маленьке",
            "email" => "Гості мають обовязково вказати свою пошту для рєстрації",
            'unique' => "Ви вже зареєстровані. Спершу ви маєте авторизуватися за допомогою свого логіна і пароля",
            
            
            /*'phone.required'            => "Поле Телефон обов'язкове для заповнення;",
            'email.required'            => "Поле Контактна пошта обов'язкове для заповнення;",
            'web_site.required'         => "Поле Веб-сайт обов'язкове для заповнення;",
            'company_info.required'         => "Поле Коротка характеристика діяльності організації обов'язкове для заповнення;",
            'company_type.required'         => "Поле Тип організації обов'язкове для заповнення;",
            'description.required'      => "Поле Загальна інформація (звернення компанії) обов'язкове для заповнення;",
            'adress.required'           => "Поле Адресса  обов'язкове для заповнення;",
             
             */
        ];
    }
}
