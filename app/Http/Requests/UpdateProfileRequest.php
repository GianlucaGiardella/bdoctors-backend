<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'user_id' => 'nullable|exists:users,id',
            'address' => 'max:200|string',
            'services' => 'max:200|string',
            'curriculum' => 'nullable|string',
            'photo' => 'image|nullable|mimes:jpg,png,jpeg',
            'visible' => 'boolean',
            'specializations'=>'exists:specializations,id',
        ];
    }
}
