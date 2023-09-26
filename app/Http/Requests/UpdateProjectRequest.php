<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Auth;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|max:255',
            'description'=>'min:0',
            'type_id'=>'nullable|exists:types,id',
            'technologies' => 'nullable|array',
            'technologies.*'=>'exists:technologies,id',
            'img'=>'nullable|image'


        ];
    }

    public function messages(): array
    {
        return[

            'title.required'=>'Il titolo è obbligatorio',
            'title.max'=>'Il titolo è troppo lungo, deve essere al massimo 255 caratteri',
        ];
    }
}
