<?php

namespace App\Http\Requests\Article;

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
        
        if (!Auth::check()) {
            return false;
        }
        if (Auth::user()->isAdmin()) {
            return true;
        }
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
           'name' => 'required|max:500',
           'description' => 'required',
           'category_id' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            
            'name.max' => 'Максимальна довжина імені 400 символів',
            'name.required' => "Поле Назва  обов'язкове для заповнення",
            'description.required' => "Поле Зміст обов'язкове для заповнення",
            'category_id.required' => "Поле категорія обов'язкове для заповнення;",
            
        ];
    }
}
