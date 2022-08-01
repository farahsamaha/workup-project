<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'about' => 'required',
            'featured_image' => 'file|image',
            'mobile' => 'required|numeric',
            'location_id' => 'required|numeric|exists:locations,id',
            'skill_id' => 'numeric|exists:skills,id',
            'new_skills' => 'required_without:skills|nullable|string',
            'certificate_id' => 'numeric|exists:certificates,id',
            'experience_id' => 'numeric|exists:experiences,id',
            'organization_id' => 'numeric|exists:organizations,id'
        ];
    }
}
