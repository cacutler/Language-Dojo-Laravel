<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Attributes\Fillable;
#[Fillable('user_id', 'course_id', 'current_status')]
class CourseUser extends Pivot {
    use HasUuids, HasFactory;
    protected $table = 'course_users';
    public $incrementing = false;
    protected $keyType = 'string';
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function course(): BelongsTo {
        return $this->belongsTo(Course::class);
    }
}
