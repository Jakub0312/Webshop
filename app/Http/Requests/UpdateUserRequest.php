<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $user=$this->route('user');
        return [
            'name' => 'required|string|min:3|max:75|unique:users,name,'.$user->id,
            'email' => 'string|min:5|max:100|unique:users,email,'.$user->id
        ];
    }
}
