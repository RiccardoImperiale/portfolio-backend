<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id',
            // 'title' => 'required|unique:projects,title|min:5|max:150',
            'title' => ['required', 'min:5', 'max:150', Rule::unique('projects')->ignore($this->project)],
            'description' => 'nullable',
            'image' => 'nullable|image|max:500',
            'live_link' => 'nullable',
            'code_link' => 'nullable'
        ];
    }
}
