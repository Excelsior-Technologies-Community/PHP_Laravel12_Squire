<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Knight extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'title',
        'age',
    ];

    public function squires()
    {
        return $this->hasMany(Squire::class);
    }
}
