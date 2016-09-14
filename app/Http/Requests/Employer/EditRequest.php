<?php

namespace App\Http\Requests\Employer;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\UserForm;
use Illuminate\Support\Facades\Auth;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize( )
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
            //
        ];
    }

    public function forbiddenResponse()
    {
        return response()->view('errors.403');
    }
}
