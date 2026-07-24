<?php
namespace App\Http\Requests;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\GrammarRule;
use Illuminate\Validation\Rule;
class StoreGrammarRuleRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return $this->user()->can('create', GrammarRule::class);
    }
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'course_id' => ['required', 'uuid', 'exists:courses,id'],
            'title' => ['required', 'string', 'max:255'],
            'explanation' => ['nullable', 'string'],
            'difficulty_level' => ['required', Rule::in(['beginner', 'intermediate', 'advanced'])]
        ];
    }
}
