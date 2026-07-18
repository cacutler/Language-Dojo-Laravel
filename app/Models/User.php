<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
#[Fillable(['first_name', 'last_name', 'username', 'email', 'phone_number', 'password', 'native_language', 'is_admin'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable {
    use HasFactory, Notifiable, HasUuids;
    /**
     * Get the attributes that should be cast.
     * @return array<string, string>
     */
    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'is_admin' => 'boolean',
            'password' => 'hashed'
        ];
    }
    public function courses(): BelongsToMany {
        return $this->belongToMany(Course::class, 'course_user')->using(CourseUser::class)->withPivot('id', 'current_status')->withTimestamps();
    }
    public function progressTracking(): HasMany {
        return $this->hasMany(ProgressTracking::class);
    }
    public function userExamples(): HasMany {
        return $this->hasMany(UserExample::class);
    }
}
