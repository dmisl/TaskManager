<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    public $fillable = [
        'name', 'desc', 'priority', 'completed', 'goal_id', 'day_id', 'position'
    ];

    public function goal(): BelongsTo
    {
        return $this->belongsTo(Goal::class);
    }

    public function day(): BelongsTo
    {
        return $this->belongsTo(Day::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

}
