<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSystemExampleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('systemExample'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'grammar_rule_id' => ['sometimes', 'uuid', 'exists:grammar_rules,id'],
            'phrase' => ['sometimes', 'string', 'max:255'],
            'translation' => ['sometimes', 'string', 'max:255'],
            'romanization' => ['sometimes', 'string', 'max:255']
        ];
    }
}
