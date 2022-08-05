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
            'name' => '',
            'email' => '',
            'birth_date' => '',
            'about' => 'nullable',
            'featured_image' => 'file|image',
            'mobile' => 'numeric',
            'location_id' => 'numeric|exists:locations,id',
            'skill_id' => 'array|nullable',
            'skill_id.*' => 'numeric|exists:skills,id',
            'new_skills' => 'nullable|string',
            'certificate_id' => 'array|nullable',
            'certificate_id.*' => 'numeric|exists:certificates,id',
            'new_certificates' => 'nullable|string',
            'experience_id' => 'array|nullable', // I added nullable just to test
            'experience_id.*' => 'numeric|exists:experiences,id',
            'new_experiences' => 'nullable|string',
            'organization_id' => 'array|nullable', // I added nullable just to test
            'organization_id.*' => 'numeric|exists:organizations,id',
            'new_organizations' => 'nullable|string'
        ];
    }
}
