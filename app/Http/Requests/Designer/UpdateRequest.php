<?php

namespace App\Http\Requests\Designer;

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
        $form = $this->route('designer');
        return Auth::user()->can('update', $form);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required|max:255',
            'country_id' => 'required',
            'stage_id' => 'required',
            'money' => 'required|numeric',
            'contacts' => 'required|min:20',
        ];
    }

    public function messages() {
        return [
            'name.max' => 'Максимальна довжина імені 255 символів',
            'name.required' => "Поле Назва інвестування  обов'язкове для заповнення",
            'stage_id.required' => "Поле етап проекту обов'язкове для заповнення",
            'country_id.required' => "Поле Країна інвестування обов'язкове для заповнення;",
            'contacts.required' => "Поле Контактні дані обов'язкове для заповнення",
            'contacts.min' => "Поле Контактні: потрібно більше надати даних",
            "money.numeric" => "Поле суми повинно бути введено число",
            "money.required" => "Поле суми обов'язкове для заповнення",
        ];
    }

    public function forbiddenResponse() {
        return response()->view('errors.403');
    }

}
