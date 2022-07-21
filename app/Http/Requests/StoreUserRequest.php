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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'birth_date' => 'required',
            'about' => 'required',
            'city_id'=> 'required|exists:cities,id',
            'skill_id'=> 'required|exists:skills,id',
            'education_id'=> 'required|exists:education,id',
            'experince_id' => 'required|exists:experince,id',
            'volunteering_id' => 'required|exists:volunteering,id',
            'featured_image' =>'file|image',
            'mobile' => 'required|numeric'
        ];
    }
}
