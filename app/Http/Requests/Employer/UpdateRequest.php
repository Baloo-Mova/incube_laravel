<?php

namespace App\Http\Requests\Investor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(!Auth::check())
        {
            return false;
        }

        $form = $this->route('employer');
        return Auth::user()->can('update', $form);
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

    public function forbiddenResponse()
    {
        return response()->view('errors.403');
    }
}
