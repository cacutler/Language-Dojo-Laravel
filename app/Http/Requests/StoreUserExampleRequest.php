<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\UserExample;
class StoreUserExampleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', UserExample::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'grammar_rule_id' => ['required', 'uuid', 'exists:grammar_rules,id'],
            'custom_phrase' => ['required', 'string', 'max:255'],
            'translation' => ['required', 'string', 'max:255'],
            'romanization' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string']
        ];
    }
}
