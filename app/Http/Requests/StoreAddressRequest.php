<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
        return [
            'streetname' => 'required|string|min:5|max:100',
            'zipcode' => 'required|string|min:5|max:15',
            'city' => 'required|string|min:5|max:100',
            'country' => 'required|string|min:5|max:45',
            'addresstype' => 'required|integer',
        ];
    }
}
