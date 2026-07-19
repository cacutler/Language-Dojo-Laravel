<?php
namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class GrammarRuleResource extends JsonResource {
    /**
     * Transform the resource into an array.
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'course_id' => $this->course_id,
            'course' => CourseResource::make($this->whenLoaded('course')),
            'title' => $this->title,
            'explanation' => $this->explanation,
            'difficulty_level' => $this->difficulty_level,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
