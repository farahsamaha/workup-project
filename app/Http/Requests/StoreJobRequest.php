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
            'email' => 'required|email',
            'description' => 'required',
            'category_id' => 'required|numeric|exists:categories,id',
            'location_id' => 'required|numeric|exists:locations,id',
            'type_id'        => 'required|numeric|exists:types,id',
            'place_id'       => 'required|numeric|exists:places,id'
        ];
    }
}
