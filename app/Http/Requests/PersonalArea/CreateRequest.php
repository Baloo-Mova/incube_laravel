<?php

namespace App\Http\Requests\PersonalArea;

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
            'name' => 'required|max:200',
            'country_id' => 'required',
            //'password' => 'required|min:10',
            //'stage_id' => 'required',
            'email' => 'required|email|unique:users',
            
            
        ];
    }

    public function messages()
    {
        return [
            'plan_rent.numeric'=>'Поле рентабельностi інвестицій повинно бути число',
            'name.max' => 'Максимальна довжина імені 200 символів',
            'name.required' => "Поле Назва інвестування  обов'язкове для заповнення",
            'country_id.required' => "Поле Країна інвестування обов'язкове для заповнення;",
            "email" => "Гості мають обовязково вказати свою пошту для рєстрації",
            'unique' => "Користувач з такою поштою вже зареєстрований",
        ];
    }
}
