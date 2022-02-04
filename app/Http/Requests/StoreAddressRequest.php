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
            'streetname' => 'string|min:5|max:100',
            'zipcode' => 'string|min:5|max:15',
            'city' => 'string|min:5|max:100',
            'country' => 'string|min:5|max:45',
            'addresstype' => 'integer',
        ];
    }
}
