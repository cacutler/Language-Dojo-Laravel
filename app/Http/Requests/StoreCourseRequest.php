<?php
namespace App\Http\Requests;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Course;
class StoreCourseRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return $this->user()->can('create', Course::class);
    }
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'language_id' => ['required', 'uuid', 'exists:languages,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string']
        ];
    }
}
