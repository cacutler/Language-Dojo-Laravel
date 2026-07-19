<?php
namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class UserExampleResource extends JsonResource {
    /**
     * Transform the resource into an array.
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'grammar_rule_id' => $this->grammar_rule_id,
            'grammar_rule' => GrammarRuleResource::make($this->whenLoaded('grammarRule')),
            'custom_phrase' => $this->custom_phrase,
            'translation' => $this->translation,
            'romanization' => $this->romanization,
            'notes' => $this->notes,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
