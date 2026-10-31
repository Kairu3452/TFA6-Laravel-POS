<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Customer account stored in the customers table.
 *
 * Retrieved by CustomerController through Eloquent (Customer::orderBy('id')->get()).
 */
class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'code',
        'full_name',
        'email',
        'phone',
        'city',
        'tier',
        'points',
        'status',
        'joined',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'points' => 'integer',
            'joined' => 'date',
        ];
    }
}
