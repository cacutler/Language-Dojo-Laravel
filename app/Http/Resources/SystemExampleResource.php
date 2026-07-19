<?php
namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class SystemExampleResource extends JsonResource {
    /**
     * Transform the resource into an array.
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'grammar_rule_id' => $this->grammar_rule_id,
            'phrase' => $this->phrase,
            'translation' => $this->translation,
            'romanization' => $this->romanization,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
