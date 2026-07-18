<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;
#[Fillable('grammar_rule_id', 'phrase', 'translation', 'romanization')]
class SystemExample extends Model {
    use HasFactory, HasUuids;
    public function grammarRule(): BelongsTo {
        return $this->belongsTo(GrammarRule::class);
    }
}
