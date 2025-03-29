<?php

namespace App\Http\Requests\Tours;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateTourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request)
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'tour_time'=> 'required',
            'hotel_id'=> 'required',
            'tour_guide_id' => 'required',
            'price' => 'required'
            
        ];
    }

    public function messages()
    {
        return [
             'name.required' => "The tag may not be greater than 15 characters.",
            // 'description.required' => "The tag may not be greater than 15 characters.",
        ];
    }
}
