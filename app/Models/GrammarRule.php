<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
#[Fillable('course_id', 'title', 'explanation', 'difficulty_level')]
class GrammarRule extends Model {
    use HasFactory, HasUuids;
    public function course(): BelongsTo {
        return $this->belongsTo(Course::class);
    }
    public function systemExamples(): HasMany {
        return $this->hasMany(SystemExample::class);
    }
    public function userExamples(): HasMany {
        return $this->hasMany(UserExample::class);
    }
    public function progressTracking(): HasMany {
        return $this->hasMany(ProgressTracking::class);
    }
}
