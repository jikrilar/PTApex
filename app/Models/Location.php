<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'brand',
        'address',
        'city',
        'email',
        'telp',
        'area',
    ];

    /**
     * Get all of the comments for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employee(): HasMany
    {
        return $this->hasMany(Employee::class, 'location_id');
    }
}
