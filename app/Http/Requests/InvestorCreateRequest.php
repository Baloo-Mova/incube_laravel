<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InvestorCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required',
            'country_id' => 'required',
            'stage_id'     => 'numeric',
            'email'             => Auth::check() ? '' : 'required|email|unique:users',
            'money_count'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'     => "Поле Назва інвестування  обов'язкове для заповнення;",
            'contacts.required' => "Поле Контактні дані  обов'язкове для заповнення;",
            "investor_cost.numeric"      => "Поле суми інвестицій повинно бути числов та обов'язково вказано;",
            "email"                      => "Гості мають обовязково вказати свою пошту для рєстрації;",
            'unique'                     => "Ви вже зареєстровані. Спершу ви маєте авторизуватися за допомогою свого логіна і пароля;",
        ];
    }
}
