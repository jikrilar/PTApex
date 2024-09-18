<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Title extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Get all of the comments for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employee(): HasMany
    {
        return $this->hasMany(Employee::class, 'title_id');
    }
}
