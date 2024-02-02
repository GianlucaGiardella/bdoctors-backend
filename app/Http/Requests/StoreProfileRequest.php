<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'address' => 'max:200|string',
            'services' => 'max:200|string',
            'curriculum' => 'nullable|string',
            'photo' => 'image|nullable|mimes:jpg,png,jpeg',            
            'visible' => 'boolean',
            'specializations'=>'required|exists:specializations,id',
        ];
    }
}
