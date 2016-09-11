<?php

namespace App\Http\Requests\PersoanalArea;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
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
            //
        ];
    }

    public function forbiddenResponse()
    {
        return response()->view('errors.403');
    }
}
