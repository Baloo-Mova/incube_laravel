<?php

namespace App\Http\Requests\Executor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required',
            //'date_birth'        => 'required',
            //'experience'        => 'reguired', 
            //'education'         => 'reguired',
            //'description'       => 'reguired',
            //'adress'            => 'reguired',
            //'phone'             => 'reguired',
            'email' => Auth::check() ? '' : 'required|email|unique:users',
        ];
    }

    public function messages() {
        return[
            'name.required' => "Поле Прізвище Ім'я По-батькові обов'язкове для заповнення",
            'date_birth.required' => "Поле Дата Народження обов'язкове для заповнення",
            'experience.required' => "Поле Досвід роботи обов'язкове для заповнення",
            'education.required' => "Поле Освіта обов'язкове для заповнення",
            'description.required' => "Поле Особисті дані обов'язкове для заповнення",
            'adress.required' => "Поле Адреса обов'язкове для заповнення",
            'phone.required' => "Поле Телефон обов'язкове для заповнення",
            'email' => "Гості мають обовязково вказати свою пошту",
            'unique' => "Ви вже зареєстровані. Спершу ви маєте авторизуватися за допомогою свого логіна і пароля",
        ];
    }

}
