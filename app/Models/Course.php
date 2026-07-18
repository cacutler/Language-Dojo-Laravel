<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
#[Fillable('language_id', 'title', 'description')]
class Course extends Model {
    use HasFactory, HasUuids;
    public function language(): BelongsTo {
        return $this->belongsTo(Language::class);
    }
    public function grammarRules(): HasMany {
        return $this->hasMany(GrammarRule::class);
    }
    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class, 'course_user')->using(CourseUser::class)->withPivot('id', 'current_status')->withTimestamps();
    }
}
