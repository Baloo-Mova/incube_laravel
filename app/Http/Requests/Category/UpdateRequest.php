<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if (!Auth::check()) {
            return false;
        }
        if (Auth::user()->isAdmin()) {
            return true;
        }
        $form = $this->route('catefory');
        return Auth::user()->can('update', $form);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required|max:400',
            
        ];
    }

    public function messages() {
        return [
            'name.max' => 'Максимальна довжина імені 400 символів',
            'name.required' => "Поле Назва інвестування  обов'язкове для заповнення",
            
        ];
    }

    public function forbiddenResponse() {
        return response()->view('errors.403');
    }

}
