<?php

namespace App\Http\Requests\Designer;

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
            'stage_id' => 'required',
            'email' => Auth::check() ? '' : 'required|email|unique:users',
            'money' => 'required|numeric',
            'contacts' => 'required|min:20',
            
        ];
    }

    public function messages()
    {
        return [
            
            'name.max' => 'Максимальна довжина імені 100 символів',
            'name.required' => "Поле Назва  обов'язкове для заповнення",
            'stage_id.required' => "Поле етап проекту обов'язкове для заповнення",
            'country_id.required' => "Поле Країна інвестування обов'язкове для заповнення;",
            'contacts.required' => "Поле Контактні дані обов'язкове для заповнення",
            'contacts.min' => "Поле Контактні: потрібно більше надати даних",
            "money.numeric" => "Поле суми інвестицій повинно бути число",
            "money.required" => "Поле суми інвестицій обов'язкове для заповнення",
            "email" => "Гості мають обовязково вказати свою пошту для рєстрації",
            'unique' => "Ви вже зареєстровані. Спершу ви маєте авторизуватися за допомогою свого логіна і пароля",
        ];
    }
}
