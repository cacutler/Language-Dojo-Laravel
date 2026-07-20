<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGrammarRuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('grammarRule'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'course_id' => ['sometimes', 'uuid', 'exists:courses,id'],
            'title' => ['sometimes', 'string', 'max:255'],
            'explanation' => ['nullable', 'string'],
            'difficulty_level' => ['sometimes', Rule::in(['beinner', 'intermediate', 'advanced'])]
        ];
    }
}
