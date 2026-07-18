<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
#[Fillable('user_id', 'grammar_rule_id', 'custom_phrase', 'translation', 'romanization', 'notes')]
class UserExample extends Model {
    use HasFactory, HasUuids;
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function grammarRule(): BelongsTo {
        return $this->belongsTo(GrammarRule::class);
    }
}
