<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'uuid',
        'full_name',
        'email',
        'department_id',
        'job_title',
        'payment_type_class',
        'salary',
        'hourly_rate',
    ];

    protected $casts = [
        'id' => 'integer',
        'department_id' => 'integer',
    ];

    public function paychecks(): HasMany
    {
        return $this->hasMany(Paycheck::class);
    }

    public function timelogs(): HasMany
    {
        return $this->hasMany(Timelog::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}