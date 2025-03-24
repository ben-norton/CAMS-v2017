<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetApiRequest extends FormRequest
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
            'id' => 'required_without:guid',
            'guid' => 'required_without:id',
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'The id or guid parameter is required for this request.',
            'guid.required' => 'The id or guid parameter is required for this request.'
        ];
    }
}
