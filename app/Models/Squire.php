<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Squire extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'age', 'training_level', 'knight_id'
    ];

    // A squire belongs to one knight
    public function knight(): BelongsTo
    {
        return $this->belongsTo(Knight::class);
    }
}