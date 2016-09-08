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

        $form = $this->route('investor');
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
            'stage_id' => 'required',
            'money_count' => 'required|numeric',
            'contacts' => 'required|min:20',
            'plan_rent'=>'numeric',
        ];
    }

    public function messages()
    {
        return [
            'plan_rent.numeric'=>'Поле рентабельностi інвестицій повинно бути число',
            'name.max' => 'Максимальна довжина імені 100 символів',
            'name.required' => "Поле Назва інвестування  обов'язкове для заповнення",
            'stage_id.required' => "Поле етап проекту обов'язкове для заповнення",
            'country_id.required' => "Поле Країна інвестування обов'язкове для заповнення;",
            'contacts.required' => "Поле Контактні дані обов'язкове для заповнення",
            'contacts.min' => "Поле Контактні дані ну ДУУУУУУЖЕ маленьке",
            "money_count.numeric" => "Поле суми інвестицій повинно бути число",
            "money_count.required" => "Поле суми інвестицій обов'язкове для заповнення",
        ];
    }

    public function forbiddenResponse()
    {
        return response()->view('errors.403');
    }
}
