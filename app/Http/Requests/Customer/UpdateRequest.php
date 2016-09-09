<?php

namespace App\Http\Requests\Customer;

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

        $form = $this->route('customer');
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
            'name' => 'required|max:100',
            'country_id' => 'required',
            //'description' =>'reguired|min:100',
            
                      
            
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'Максимальна довжина назви 100 символів',
            'name.required' => "Поле Назва інвестування  обов'язкове для заповнення",
            'country_id.required' => "Поле Країна інвестування обов'язкове для заповнення;",
            //'description.required' => "Поле Опис проблеми обов'язкове для заповнення",
            //'description.min' => 'Ви маєте надати більше інформації',
            
        ];
    }

    public function forbiddenResponse()
    {
        return response()->view('errors.403');
    }
}
