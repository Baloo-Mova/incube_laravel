<?php

namespace App\Http\Requests\PersonalArea;

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

        $form = $this->route('personal-area');
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
            'name' => 'required|max:255',
            'country_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'Максимальна довжина назви 255 символів',
            'name.required' => "Поле Прізвище, Ім'я, По-батькові  обов'язкове для заповнення",
            'country_id.required' => "Поле Країна інвестування обов'язкове для заповнення;",
        ];
    }

    public function forbiddenResponse()
    {
        return response()->view('errors.403');
    }
}
