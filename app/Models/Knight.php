<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Knight extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'age', 'title', 'weapon', 'experience_years'
    ];

    // A knight can have many squires
    public function squires(): HasMany
    {
        return $this->hasMany(Squire::class);
    }
}