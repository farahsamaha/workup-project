<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
            'title' => 'required',
            'category_id'=> 'required|exists:categories,id',
            'place'=> 'required',
            'type'=> 'required',
            'location-id' => 'required|exists:locations,id',
            'email' => ['required', 'email'],
            'description' => 'required'
        ];
    }
}
